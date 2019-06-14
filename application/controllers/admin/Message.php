<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Message extends CI_Controller {
		
		public $data = array();
		public $loggedin_method_arr = array('message-list');

		public $loggedout_method_arr = array();
		
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
		
		public function message_list()
		{
			$like = array();
			parse_str($_SERVER['QUERY_STRING'], $like);
			unset($like['page']);
			
			$search_key = $this->input->get('search_key');
			if(isset($search_key) && $search_key){
				$this->data['search_key'] = $search_key;
			}else{
				$this->data['search_key'] = '';
			}

			$msg_data = $this->userdata->grab_message_list($like);	 
			
			//pagination settings
			$config['base_url'] = base_url('admin/message-list');
			$config['total_rows'] = count($msg_data);
			
			$pagination = $this->config->item('pagination');
			
			$pagination = array_merge($config, $pagination);

			$this->pagination->initialize($pagination);
			$this->data['page'] = ($this->input->get('page')) ? $this->input->get('page') : 1;		

			$this->data['pagination'] = $this->pagination->create_links();

			$msg_paginated_data = $this->userdata->grab_message_list($like, $this->data['page']);
			
			$this->data['message_details'] = $msg_paginated_data;
			
			$this->load->view('admin/message_list', $this->data);
		}
	}
?>