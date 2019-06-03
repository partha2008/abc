<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Member extends CI_Controller {
		
		public $data = array();
		private $perPage = 6;
		public $loggedin_method_arr = array();

		public $loggedout_method_arr = array();
		
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
		
		public function create_form($formname)
		{
			$this->load->helper('pdf_helper');

			$logged_user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));
			$sponsor = $this->userdata->grab_user_details(array("user_id" => $logged_user[0]->parent_id));

			$downloaded_date = time();

			$this->data['downloaded_date'] = $downloaded_date;
			$this->data['invoice_name'] = $formname;
			$this->data['donor_code'] = $sponsor[0]->sponsor_id;

			$this->load->view('admin/pdfreport', $this->data);
		}
	}
?>