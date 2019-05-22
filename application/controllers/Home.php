<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {
		
		public $data = array();
		private $perPage = 6;
		public $loggedin_method_arr = array('myaccount', 'dashboard', 'changepassword');

		public $loggedout_method_arr = array('login', 'register', 'forget_password');
		
		public function __construct(){
			parent::__construct();

			$this->load->model('userdata');

			$this->data = $this->defaultdata->getFrontendDefaultData();

			if(in_array($this->data['tot_segments'][2], $this->loggedin_method_arr))
			{
				if($this->defaultdata->is_user_session_active() == 0)
				{
					redirect(base_url());
				}
			}
			
			if(in_array($this->data['tot_segments'][2], $this->loggedout_method_arr))
			{
				if($this->defaultdata->is_user_session_active() == 1)
				{
					redirect(base_url('dashboard'));
				}
			}
		}
		
		public function index()
		{
			//$this->output->cache(60); // Will expire in 60 minutes
			$this->load->view('home', $this->data); 
		}

		public function register(){	
			if($this->session->userdata('has_error')){
				$user_details = (object)$this->session->userdata;
				$this->data['user_details'] = $user_details;
			}
			$this->data['state'] = $this->defaultdata->grabStateData();	

			$this->load->view('register', $this->data);			
		}

		public function process_register(){
			$post_data = $this->input->post();
			$general_settings = $this->data['general_settings'];
			$admin_profile = $this->data['admin_profile'];
				
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('sponsor_id', 'Sponsor ID', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|exact_length[10]');
			//$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique['.TABLE_USER.'.email]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('district', 'District', 'trim|required');
			$this->form_validation->set_rules('post_code', 'Postal Code', 'trim|required');
			$this->form_validation->set_rules('state_id', 'State', 'trim|required');
			$this->form_validation->set_rules('nominee_info', 'Nominee Information', 'trim|required');
			$this->form_validation->set_rules('nominee_relation', 'Nominee Relation', 'trim|required');

			if($this->form_validation->run() == FALSE)
			{					
				$this->session->set_userdata($post_data);				
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('register_notification', validation_errors());
			}else{
				$user = $this->userdata->grab_user_details(array("parent_id" => $post_data['parent_id']));

				if(count($user) > $this->config->item('site_info')['max_register_user']){
					$this->session->set_userdata('has_error', true);
					$this->session->set_userdata('register_notification', "Registration failed. Maximum user exceeds the limit with the sponsor id.");
				}else{
					unset($post_data['confirm_password']);
					unset($post_data['sponsor_id']);

					$given_password = $post_data['password'];

					$post_data['sponsor_id'] = $this->defaultdata->getUserId();
					$post_data['password'] = base64_encode(hash("sha256", $post_data['password'], True));
					$post_data['date_added'] = time();

					$this->userdata->insert_user($post_data);

					$this->session->set_userdata('has_error', false);
					$this->session->set_userdata('register_notification', "Thank you for registering with us. An Email has been sent to your email address to get the login credential. <br><br>Your User Id - ".$post_data['sponsor_id'].'<br>'. 'Password - '.$given_password);
					
					// an email should be sent to user			
					$this->data['site_logo'] = UPLOAD_LOGO_PATH.$general_settings->logoname;
					$this->data['site_url'] = $general_settings->siteaddress;
					$this->data['site_title'] = $general_settings->sitename;
					$this->data['user_id'] = $post_data['sponsor_id'];
					$this->data['password'] = $given_password;
					$this->data['user'] = $post_data['first_name'];
					
					$message = $this->load->view('email_template/register', $this->data, true);
					$mail_config = array(
						"from" => $admin_profile->email,
						"to" => array($post_data['email']),
						"subject" => $general_settings->sitename.": New Registration",
						"message" => $message
					);
					
					$this->defaultdata->_send_mail($mail_config);
				}
			}

			redirect($this->agent->referrer());
		}

		public function getSponsor(){
			$post_data = $this->input->post();			

			$user = $this->userdata->grab_user_details(array("sponsor_id" => $post_data['sponsor_id']));

			if(!empty($user)){
				$response['name'] = $user[0]->first_name." ".$user[0]->last_name;
				$response['parent_id'] = $user[0]->user_id;
				$response['status'] = true;
			}else{
				$response['status'] = false;
			}

			echo json_encode($response);
		}

		public function login(){
			$this->load->view('login', $this->data); 
		}

		public function process_login(){
			$post_data = $this->input->post();
				
			$this->load->library('form_validation');

			$this->form_validation->set_rules('user_id', 'User Id', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('g-recaptcha-response', 'Captcha Code', 'trim|required');

			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('login_notification', validation_errors());

				redirect($this->agent->referrer());
			}else{
				$given_password = $post_data['password'];
				$encrypted_password = base64_encode(hash("sha256", $post_data['password'], True));

				$user = $this->userdata->grab_user_details(array("sponsor_id" => $post_data['user_id'], "password" => $encrypted_password));

				if(!empty($user)){
					if($this->userdata->update_user_details(array("sponsor_id" => $user[0]->sponsor_id), array("last_login" => time()))){
							
						$this->defaultdata->setFrontendLoginSession($user[0]);

						redirect(base_url('dashboard'));
					}
				}else{
					$this->session->set_userdata('has_error', true);
					$this->session->set_userdata('login_notification', "Invalid Login. Please try again later.");

					redirect($this->agent->referrer());
				}				
			}
		}

		public function forget_password(){
			if($this->session->userdata('has_error')){
				$user_details = (object)$this->session->userdata;
				$this->data['user_details'] = $user_details;
			}
			$this->load->view('forget', $this->data); 
		}

		public function hasSameEmailAddress($email){
			$user_data = $this->userdata->grab_user_details(array("email" => $email));
			if(count($user_data) > 0){
				return true;				
			}else{
				$this->form_validation->set_message('hasSameEmailAddress', 'The given email id does not exists');
				return false;
			}
		}

		public function process_forget_password(){
			$post_data = $this->input->post();
			$general_settings = $this->data['general_settings'];
			$admin_profile = $this->data['admin_profile'];
				
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email ID', 'trim|required|callback_hasSameEmailAddress');

			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('forget_notification', validation_errors());
			}else{
				$given_password = $this->defaultdata->getGeneratedPassword();
				$encrypted_password = base64_encode(hash("sha256", $given_password, True));

				$user = $this->userdata->grab_user_details(array("email" => $post_data['email']));

				if($this->userdata->update_user_details(array("user_id" => $user[0]->user_id), array("password" => $encrypted_password, "date_modified" => time()))){

					$this->session->set_userdata('has_error', false);
					$this->session->set_userdata('forget_notification', "You have successfully reset your password. A new password generated & sent to your given email address. Please check your inbox to get your login credential.");

					
					// an email should be sent to user	
					$this->data['site_logo'] = UPLOAD_LOGO_PATH.$general_settings->logoname;
					$this->data['site_url'] = $general_settings->siteaddress;
					$this->data['site_title'] = $general_settings->sitename;
					$this->data['user_id'] = $user[0]->sponsor_id;
					$this->data['password'] = $given_password;
					$this->data['user'] = $user[0]->first_name;
					
					$message = $this->load->view('email_template/forget', $this->data, true);
					$mail_config = array(
						"from" => $admin_profile->email,
						"to" => array($post_data['email']),
						"subject" => $general_settings->sitename.": Password Recovery",
						"message" => $message
					);
					
					$this->defaultdata->_send_mail($mail_config);
				}
			}

			redirect($this->agent->referrer());
		}

		public function logout(){
			$this->defaultdata->unsetFrontendLoginSession();
			
			redirect(base_url());
		}

		public function dashboard(){
			$user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));

			$this->data['user_details'] = $user[0];
			
			$this->data['inner'] = $this->load->view('partials/dashboard_inner', $this->data, true);
			$this->data['page_name'] = 'Dashboard';
			$this->data['container'] = $this->load->view('partials/container', $this->data, true);

			$this->load->view('dashboard', $this->data); 
		}

		public function cms(){
			$cms = $this->data['tot_segments'][1];
			$cond['mode'] = $cms;			
			$cms_data = $this->userdata->get_cms_content($cond);

			$this->data['cms_data'] = $cms_data;

			$this->load->view('cms', $this->data);
		}

		public function myaccount(){
			if($this->session->userdata('has_error')){
				$user = (object)$this->session->userdata;
				$this->data['user_details'] = $user;
			}else{
				$user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));				
				$this->data['user_details'] = $user[0];
			}
			$this->data['state'] = $this->defaultdata->grabStateData();	
			$this->data['inner'] = $this->load->view('partials/myaccount_inner', $this->data, true);
			$this->data['page_name'] = 'My Profile';
			$this->data['container'] = $this->load->view('partials/container', $this->data, true);

			$this->load->view('myaccount', $this->data);
		}

		public function update_account(){
			$post_data = $this->input->post();

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
				
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email ID', 'trim|required'.$is_unique);
			$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required'.$is_unique1);
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('district', 'District', 'trim|required');
			$this->form_validation->set_rules('post_code', 'Postal Code', 'trim|required');
			$this->form_validation->set_rules('state_id', 'State', 'trim|required');
			$this->form_validation->set_rules('nominee_info', 'Nominee Information', 'trim|required');
			$this->form_validation->set_rules('nominee_relation', 'Nominee Relation', 'trim|required');
			$this->form_validation->set_rules('about_me', 'About Me', 'trim|required');
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('myaccount_notification', validation_errors());
			}else{
				unset($post_data['old_email']);
				unset($post_data['old_mobile_no']);

				$post_data['date_modified'] = time();
				
				$this->userdata->update_user_details(array("user_id" => $this->session->userdata('user_id')), $post_data);

				$this->session->set_userdata('has_error', false);
				$this->session->set_userdata('myaccount_notification', "Your account updated successfully");
			}
			redirect($this->agent->referrer());
		}

		public function changepassword(){	
			$user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));	
						
			$this->data['user_details'] = $user[0];
			$this->data['inner'] = $this->load->view('partials/password_inner', $this->data, true);
			$this->data['page_name'] = 'Change Password';
			$this->data['container'] = $this->load->view('partials/container', $this->data, true);

			$this->load->view('changepassword', $this->data);
		}

		public function update_password(){
			$post_data = $this->input->post();
				
			$this->load->library('form_validation');

			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
			
			$this->session->unset_userdata($post_data);
			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_userdata($post_data);
				$this->session->set_userdata('has_error', true);
				$this->session->set_userdata('password_notification', validation_errors());
			}else{
				unset($post_data['confirm_password']);
				$post_data['password'] = base64_encode(hash("sha256", $post_data['password'], True));
				$post_data['date_modified'] = time();
				
				$this->userdata->update_user_details(array("user_id" => $this->session->userdata('user_id')), $post_data);

				$this->session->set_userdata('has_error', false);
				$this->session->set_userdata('password_notification', "Your password updated successfully");
			}
			redirect($this->agent->referrer());
		}
	}
?>