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

			$user_id = $this->session->userdata('user_id');
			$logged_user = $this->userdata->grab_user_details(array("user_id" => $user_id));
			$sponsor = $this->userdata->grab_user_details(array("user_id" => $logged_user[0]->parent_id));

			$downloaded_date = time();

			$sql = "SELECT T2.first_name, T2.last_name, T2.address, T2.sponsor_id, T2.city, T2.district, T2.post_code, T2.state_id FROM (SELECT @r AS _id, (SELECT @r := parent_id FROM ".TABLE_USER." WHERE user_id = _id) AS parent_id, @l := @l + 1 AS lvl FROM (SELECT @r := $user_id, @l := 0) vars, ".TABLE_USER." m WHERE @r <> 0) T1 JOIN ".TABLE_USER." T2 ON T1._id = T2.user_id WHERE T2.parent_id <> 0 AND T2.parent_id < ".$logged_user[0]->parent_id." ORDER BY T1.lvl ASC LIMIT 0,10";	

			$query = $this->db->query($sql);		
			$res = $query->result();

			$this->data['downloaded_date'] = $downloaded_date;
			$this->data['invoice_name'] = $formname;
			$this->data['donor_code'] = $sponsor[0]->sponsor_id;
			$this->data['parents'] = array_reverse($res);

			$this->load->view('pdfreport', $this->data);
		}

		public function get_children($user_id){
			$sql = "SELECT * FROM abc_users WHERE FIND_IN_SET(user_id,(SELECT GROUP_CONCAT(lv SEPARATOR ',') FROM (SELECT @pv:=(SELECT GROUP_CONCAT(user_id SEPARATOR ',') FROM abc_users WHERE parent_id IN (@pv)) AS lv FROM abc_users JOIN (SELECT @pv:=$user_id)tmp WHERE parent_id IN (@pv)) a)) AND status='Y'";
			$query = $this->db->query($sql);

			return $query->result();
		}

		public function member_tree(){
			$user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));
			$active_user = $this->userdata->grab_user_details(array("status" => "Y", "user_id" => $this->session->userdata('user_id')));

			if(!empty($active_user)){
				$children = array_merge($active_user, $this->get_children($this->session->userdata('user_id')));
			}

			if(isset($children[0]->parent_id)){
				$tree = $this->generateTreeMenu($children, $children[0]->parent_id, 0, true);
			}else{
				$tree = '';
			}			
						
			$this->data['user_details'] = $user[0];
			$this->data['tree'] = $tree;
			$this->data['inner'] = $this->load->view('partials/member_tree_inner', $this->data, true);
			$this->data['page_name'] = 'Member Tree';
			$this->data['container'] = $this->load->view('partials/container', $this->data, true);

			$this->load->view('member_tree', $this->data);
		}

		public function generateTreeMenu($datas, $parent = 0, $limit=0, $flag=false){
            $tree = '';
            if($flag){
            	$tree .= '<ul class="tree">';
            }else{
            	$tree .= '<ul>';
            } 
            for($i=0, $ni=count($datas); $i < $ni; $i++){
                if($datas[$i]->parent_id == $parent){
                	$state = $this->defaultdata->grabStateData(array("state_id" => $datas[$i]->state_id));
					$address = $datas[$i]->address.', '.$datas[$i]->city.', '.$datas[$i]->district.', '.$datas[$i]->post_code.', '.$state[0]->name;
					$title = $datas[$i]->first_name.' '.$datas[$i]->last_name.'<br>('.$datas[$i]->sponsor_id.')<br>'.$address;
                    $tree .= '<li><div data-placement="right" data-html="true" data-toggle="tooltip" title="'.$title.'">';
                    $tree .= '<i class="ni ni-single-02"></i></div>';
                    $tree .= $this->generateTreeMenu($datas, $datas[$i]->user_id, $limit++);
                    $tree .= '</li>';
                }
            }
            $tree .= '</ul>';

            return $tree;
		} 

		public function direct_list(){
			$user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));
			$children = $this->userdata->grab_user_details(array("parent_id" => $this->session->userdata('user_id'), "status" => "Y"));

			$this->data['user_details'] = $user[0];
			$this->data['children'] = $children;
			$this->data['inner'] = $this->load->view('partials/direct_list_inner', $this->data, true);
			$this->data['page_name'] = 'Direct List';
			$this->data['container'] = $this->load->view('partials/container', $this->data, true);

			$this->load->view('direct_list', $this->data);
		}

		public function team_level(){
			$user = $this->userdata->grab_user_details(array("user_id" => $this->session->userdata('user_id')));
			$current_parent_id = $this->session->userdata('parent_id');

			$sql = "SELECT DISTINCT(parent_id) FROM `abc_users` WHERE parent_id >= ".$current_parent_id." AND status='Y' ORDER BY parent_id ASC";
			$query = $this->db->query($sql);
			$level = $query->result();

			$this->data['user_details'] = $user[0];
			$this->data['level'] = $level;
			$this->data['inner'] = $this->load->view('partials/team_level_inner', $this->data, true);
			$this->data['page_name'] = 'Team Level';
			$this->data['container'] = $this->load->view('partials/container', $this->data, true);

			$this->load->view('team_level', $this->data);
		}

		public function getTeamLevel(){
			$parent_id = $this->input->post('parent_id');
			$children = $this->userdata->grab_user_details(array("parent_id >" => $parent_id));

			if(!empty($children)){
				foreach ($children as $key => $value) {
					$parent = $this->userdata->grab_user_details(array("user_id" => $value->parent_id));

					$children[$key]->parent_first_name = $parent[0]->first_name;
					$children[$key]->parent_last_name = $parent[0]->last_name;
					$children[$key]->parent_sponsor_id = $parent[0]->sponsor_id;
				}
			}

			if(!empty($children)){
				$this->data['children'] = $children;
				
				echo $this->load->view('partials/team_level_inner_inner', $this->data, true);
			}else{
				echo '';
			}
		}
	}
?>