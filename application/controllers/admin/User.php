<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller {
		
		public $data = array();
		public $loggedin_method_arr = array('dashboard', 'profile', 'settings', 'user-list', 'user-add', 'user-edit', 'about');

		public $loggedout_method_arr = array('index');
		
		public function __construct(){
			parent::__construct();
			
			$this->load->model('userdata');
			
			$this->data = $this->defaultdata->getBackendDefaultData();
			
			if(in_array($this->data['tot_segments'][2], $this->loggedin_method_arr))
			{
				if($this->defaultdata->is_session_active() == 0)
				{
					redirect(base_url('admin'));
				}
			}
			
			if(in_array($this->data['tot_segments'][2], $this->loggedout_method_arr))
			{
				if($this->defaultdata->is_session_active() == 1)
				{
					redirect(base_url('admin/dashboard'));
				}
			}
		}
		
		public function index()
		{			
			$this->load->view('admin/login', $this->data); 
		}
		
		public function process_login(){
			$post_data = $this->input->post();
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata('login_error', 'true');
				redirect(base_url('admin'));
			}
			else
			{
				$username = $post_data['username'];
				$password = $post_data['password'];
				
				$encrypted_password = base64_encode(hash("sha256", $password, True));
				
				$data = array(
					"username" => $username,
					"password" => $encrypted_password
				);
				
				$user_data = $this->userdata->grab_backend_user_details($data);
				if(count($user_data) > 0){
					if($user_data[0]->is_active){
						$this->defaultdata->setLoginSession($user_data[0]);
						redirect(base_url('admin/dashboard'));	
					}else{
						$this->session->set_userdata('login_error', 'true');
						$this->session->set_userdata('login_error_msg', 'You have been deactivated!');
						redirect(base_url('admin'));
					}									
				}else{
					$this->session->set_userdata('login_error', 'true');
					$this->session->set_userdata('login_error_msg', 'Incorrect Username/Password. Please try again!');
					redirect(base_url('admin'));					
				}
			}
		}
		
		public function dashboard(){
			$this->load->view('admin/dashboard', $this->data);
		}
		
		public function forget_password(){
			if($this->session->userdata('has_error')){
				$this->data['forget_details'] = (object)$this->session->userdata;
			}
			$this->load->view('admin/forget', $this->data);
		}
		
		public function process_forget(){
			$post_data = $this->input->post();
			$general_settings = $this->data['general_settings'];
			$admin_profile = $this->data['admin_profile'];
			
			$email = $post_data['email'];
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('forget_notification', validation_errors());
			}else{			
				// check for email existense
				$user_data = $this->userdata->grab_backend_user_details(array("email" => $email));
				if(!empty($user_data)){
					$password = $this->defaultdata->getGeneratedPassword(8);
					$this->userdata->update_backend_user_details(array("email" => $email), array("password" => $this->defaultdata->getSha256Base64Hash($password), "original_password" => $password));
					
					// Send mail to admin for password recovery
					$this->data['site_logo'] = UPLOAD_LOGO_PATH.$general_settings->logoname;
					$this->data['site_url'] = $general_settings->siteaddress;
					$this->data['site_title'] = $general_settings->sitename;
					$this->data['user_id'] = $user_data[0]->username;
					$this->data['password'] = $password;
					$this->data['user'] = 'Admin';
					
					$message = $this->load->view('email_template/forget', $this->data, true);
					$mail_config = array(
						"from" => $email,
						"to" => array($email),
						"subject" => $general_settings->sitename.": Password Recovery",
						"message" => $message
					);
					
					$this->defaultdata->_send_mail($mail_config);
					// Ends	
					
					$this->session->set_userdata('has_error', false);
					$this->session->set_userdata('forget_notification', 'Password has been reset. New Password has been generated. An email has been sent to the given email address to get the login details');
				}else{
					$this->session->set_userdata($post_data);
					
					$this->session->set_userdata('has_error', true);
					$this->session->set_userdata('forget_notification', 'The given email address does not exist');
				}
			}
			redirect($this->agent->referrer());
		}
		
		public function profile(){
			$data = array();
			$data['admin_id'] = $this->session->usrid;
			$user_data = $this->userdata->grab_backend_user_details($data);
			
			if($this->session->userdata('has_error')){
				$this->data['profile_data'] = (object)$this->session->userdata;
			}else{
				$this->data['profile_data'] = $user_data[0];
			}
			
			$this->load->view('admin/profile', $this->data);
		}
		
		public function process_profile(){
			$post_data = $this->input->post();
			
			$username = $post_data['username'];
			$old_username = $post_data['old_username'];
			$password = $post_data['password'];
			$original_password = $post_data['original_password'];
			$email = $post_data['email'];
			$contact_no = $post_data['contact_no'];
			$address = $post_data['address'];
			$old_email = $post_data['old_email'];
			$is_active = $post_data['is_active'];
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			if($username != $old_username){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique['.TABLE_ADMIN.'.username]');
			}
			if($password){
				$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|max_length[20]');
			}else{
				$password = $original_password;
			}
			if($email != $old_email){
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique['.TABLE_ADMIN.'.email]');
			}
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('profile_notification', validation_errors());
			}else{				
				$encrypted_password = base64_encode(hash("sha256", $password, True));
				
				$cond = array("admin_id" => $this->session->usrid);
				$data = array(
					"username" => $username,
					"password" => $encrypted_password,
					"original_password" => $password,
					"email" => $email,
					"contact_no" => $contact_no,
					"address" => $address,
					"is_active" => $is_active
				);
				
				$this->userdata->update_backend_user_details($cond, $data);
				
				$this->session->set_userdata('has_error', false);
				$this->session->set_userdata('profile_notification', 'Profile changes have been saved successfully.');
			}
			
			redirect($this->agent->referrer());
		}
		
		public function settings(){		
			if($this->session->userdata('has_error')){
				$this->data['settings_data'] = (object)$this->session->userdata;
			}else{
				$this->data['settings_data'] = $this->defaultdata->grabSettingData();
			}
			
			$this->load->view('admin/settings', $this->data);
		}
		
		public function process_settings(){
			
			$post_data = $this->input->post();
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('sitename', 'Sitename', 'trim|required');
			$this->form_validation->set_rules('siteaddress', 'Siteaddress', 'trim|required');

			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('settings_notification', validation_errors());
			}else{
				$data = array(
					"sitename" => $post_data['sitename'],
					"siteaddress" => $post_data['siteaddress'],
					"notification" => $post_data['notification'],
					"title" => $post_data['title'],
					"date_added" => time()
				);
				
				if(isset($_FILES) && $_FILES['logo']['error'] == 0){
					$filename = $_FILES['logo']['name'];
					$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
					$file_name = 'logo'.'.'.$file_ext;
					
					array_map('unlink', glob(UPLOAD_RELATIVE_LOGO_PATH."*"));
					if(move_uploaded_file($_FILES['logo']['tmp_name'], UPLOAD_RELATIVE_LOGO_PATH.$file_name)){
						$data['logoname'] = $file_name;
						$data['logopathname'] = UPLOAD_RELATIVE_LOGO_PATH.$file_name;
					}
				}
				
				$cond = array("settings_id" => $post_data['settings_id']);
				
				$this->userdata->update_settings_details($cond, $data);
				
				$this->session->set_userdata('has_error', false);
				$this->session->set_userdata('settings_notification', 'Settings changes have been saved successfully.');
			}
			
			redirect($this->agent->referrer());			
		}
		
		public function cms(){
			$cms = $this->data['tot_segments'][2];
			if($this->session->userdata('has_error')){
				$this->data['cms_data'] = (object)$this->session->userdata;
			}else{
				$cond['mode'] = $cms;
				$this->data['cms_data'] = $this->userdata->get_cms_content($cond);
			}
			if($cms == 'about'){
				$title = "About Us";
			}
			$this->data['title'] = $title;
			$this->load->view('admin/cms', $this->data);
		}
		
		public function update_cms(){
			$post_data = $this->input->post();
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('title', 'Title', 'trim|required');			
			$this->form_validation->set_rules('description', 'Description', 'trim|required');			
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('cms_notification', validation_errors());
				
				redirect($this->agent->referrer());
			}else{
				$cond['mode'] = $post_data['mode'];
				$data = array(
					"title" => $post_data['title'],
					"description" => $post_data['description'],
					"date_added" => time()
				);
				$this->userdata->update_cms_content($cond, $data);
				
				$this->session->set_userdata('has_error', false);
				
				redirect(base_url('admin/'.$post_data['mode']));
			}
		}
		
		public function user_list()
		{
			/*$like = array();
			parse_str($_SERVER['QUERY_STRING'], $like);
			unset($like['page']);
			
			$search_key = $this->input->get('username');
			if(isset($search_key) && $search_key){
				$this->data['search_key'] = $search_key;
			}else{
				$this->data['search_key'] = '';
			}

			$user_data = $this->userdata->grab_user_details(array("parent_id !=" => 0), array(), $like); 
			
			//pagination settings
			$config['base_url'] = base_url('admin/user-list');
			$config['total_rows'] = count($user_data);
			
			$pagination = $this->config->item('pagination');
			
			$pagination = array_merge($config, $pagination);

			$this->pagination->initialize($pagination);
			$this->data['page'] = ($this->input->get('page')) ? $this->input->get('page') : 0;		

			$this->data['pagination'] = $this->pagination->create_links();
			
			$user_paginated_data = $this->userdata->grab_user_details(array("parent_id !=" => 0), array(PAGINATION_PER_PAGE, $this->data['page']), $like);*/

			$user_paginated_data = $this->userdata->grab_user_list();			
			
			$this->data['user_details'] = $user_paginated_data;
			
			$this->load->view('admin/user_list', $this->data);
		}
		
		public function user_add(){				
			if($this->session->userdata('has_error')){
				$user_details = (object)$this->session->userdata;
				$this->data['user_details'] = $user_details;
			}
			$this->data['states'] = $this->defaultdata->grabStateData();
			$this->data['sponsors'] = $this->userdata->grab_user_details(array("status" => "Y"));
			
			$this->load->view('admin/user_add', $this->data);
		}
		
		public function add_user(){
			$post_data = $this->input->post();
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
			if($post_data['email']){
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique['.TABLE_USER.'.email]');
			}
			$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required'.$is_unique1);
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('district', 'District', 'trim|required');
			$this->form_validation->set_rules('post_code', 'Post Code', 'trim|required');
			$this->form_validation->set_rules('state_id', 'State', 'trim|required');
			$this->form_validation->set_rules('nominee_info', 'Nominee Information', 'trim|required');
			$this->form_validation->set_rules('nominee_relation', 'Nominee Relation', 'trim|required');
			$this->form_validation->set_rules('about_me', 'About Me', 'trim|required');	
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('useradd_notification', validation_errors());
				
				redirect($this->agent->referrer());
			}else{
				$active_users = $this->userdata->grab_user_details(array("parent_id" => $post_data['user_id'], "status" => "Y"));
				$max_count = $this->config->item('site_info')['max_active_user'];
				if((count($active_users) > $max_count) && ($post_data['status'] == 'Y')){
					$this->session->set_userdata($post_data);
				
					$this->session->set_userdata('has_error', true);
					$this->session->set_userdata('useredit_notification', "Active users with same level can not be more than ".$max_count);

					redirect($this->agent->referrer());
				}else{
					$post_data['sponsor_id'] = $this->defaultdata->getUserId();
					$post_data['date_added'] = time();
					$post_data['original_password'] = $post_data['password'];
					$post_data['password'] = base64_encode(hash("sha256", $post_data['password'], True));					

					$this->userdata->insert_user($post_data);
					
					$this->session->set_userdata('has_error', false);
					
					redirect(base_url('admin/user-list'));
				}
			}
		}
		
		public function user_edit($user_id){
			if(!$this->session->userdata('has_error')){
				$cond['user_id'] = $user_id;
				$user_data = $this->userdata->grab_user_details($cond);
				
				$user_details = $user_data[0];				
			}else{
				$user_details = (object)$this->session->userdata;
			}
			$this->data['user_details'] = $user_details;
			$this->data['states'] = $this->defaultdata->grabStateData();
			
			$this->load->view('admin/user_edit', $this->data);
		}
		
		public function edit_user(){
			$post_data = $this->input->post();
			
			$this->load->library('form_validation');			
			
			if($post_data['email'] != $post_data['old_email']){	
				$is_unique =  '|is_unique['.TABLE_USER.'.email]';	
			}else{
				$is_unique =  '';
			}

			if($post_data['mobile_no'] != $post_data['old_mobile_no']){	
				$is_unique1 =  '|is_unique['.TABLE_USER.'.mobile_no]';	
			}else{
				$is_unique1 =  '';
			}

			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			if($post_data['password']){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
			}
			if($post_data['email']){
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email'.$is_unique);
			}
			$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required'.$is_unique1);
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('district', 'District', 'trim|required');
			$this->form_validation->set_rules('post_code', 'Post Code', 'trim|required');
			$this->form_validation->set_rules('state_id', 'State', 'trim|required');
			$this->form_validation->set_rules('nominee_info', 'Nominee Information', 'trim|required');
			$this->form_validation->set_rules('nominee_relation', 'Nominee Relation', 'trim|required');
			$this->form_validation->set_rules('about_me', 'About Me', 'trim|required');	
			if($post_data['status'] == "Y"){
				$this->form_validation->set_rules('pnr1', 'PNR1', 'trim|required|is_unique['.TABLE_USER.'.pnr1]');	
				$this->form_validation->set_rules('pnr2', 'PNR2', 'trim|required|is_unique['.TABLE_USER.'.pnr2]');
				$this->form_validation->set_rules('pnr3', 'PNR3', 'trim|required|is_unique['.TABLE_USER.'.pnr3]');
			}
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('useredit_notification', validation_errors());
				
				redirect($this->agent->referrer());
			}else{		
				if (($post_data['pnr1'] == $post_data['pnr2']) && ($post_data['pnr2'] == $post_data['pnr3'])) {	
					$this->session->set_userdata($post_data);
				
					$this->session->set_userdata('has_error', true);
					$this->session->set_userdata('useredit_notification', "PNR can not be same");

					redirect($this->agent->referrer());
				}else{
					$active_users = $this->userdata->grab_user_details(array("parent_id" => $post_data['parent_id'], "status" => "Y"));
					$max_count = $this->config->item('site_info')['max_active_user'];
					if((count($active_users) > $max_count) && ($post_data['status'] == 'Y')){
						$this->session->set_userdata($post_data);
					
						$this->session->set_userdata('has_error', true);
						$this->session->set_userdata('useredit_notification', "Active users with same level can not be more than ".$max_count);

						redirect($this->agent->referrer());
					}else{
						$cond['user_id'] = $post_data['user_id'];

						if($post_data['password']){
							$post_data['original_password'] = $post_data['password'];
							$post_data['password'] = base64_encode(hash("sha256", $post_data['password'], True));
						}else{
							unset($post_data['password']);
							unset($post_data['original_password']);
						}
						unset($post_data['user_id']);
						unset($post_data['old_email']);
						unset($post_data['old_mobile_no']);

						$post_data['date_modified'] = time();

						$this->userdata->update_user_details($cond, $post_data);
						
						redirect(base_url('admin/user-list'));
					}
				}			
			}
		}
		
		public function user_delete($userid){			
			$cond['user_id'] = $userid;
			
			if($this->userdata->update_user_details($cond, array("status" => "N"))){
				redirect($this->agent->referrer());		
			}
		}
		
		public function logout()
		{
			$this->defaultdata->unsetLoginSession();
			redirect(base_url('admin'));
		}
	}
?>