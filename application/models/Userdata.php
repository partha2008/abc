<?php
class Userdata extends CI_Model {

	public function grab_backend_user_details($cond = array(), $limit = array(), $like = array(), $where = null){
		if(!empty($cond)){
			$this->db->where($cond);			
		}
		if($where){
			$this->db->where($where);	
		}		
		if(!empty($like)){
			$this->db->like($like);
		}
		if(!empty($limit)){
			$per_page = $limit[0];
			$offset = $limit[1];
			$start = max(0, ( $offset -1 ) * $per_page);
			$this->db->limit($per_page, $start);
		}
		$query = $this->db->get(TABLE_ADMIN);
		
		return $query->result();
	}

	public function update_backend_user_details($cond = array(), $data = array()){

		$this->db->where($cond);
		$this->db->update(TABLE_ADMIN, $data); 
		
		return true;
	}
	
	public function grab_user_details($cond = array(), $limit = array(), $like = array(), $where = null, $order_by = array()){
		if(!empty($cond)){
			$this->db->where($cond);			
		}
		if($where){
			$this->db->where($where);	
		}		
		if(!empty($like)){
			$this->db->like($like);
		}
		if(!empty($limit)){
			$per_page = $limit[0];
			$offset = $limit[1];
			$start = max(0, ( $offset -1 ) * $per_page);
			$this->db->limit($per_page, $start);
		}
		if(empty($order_by)){
			$this->db->order_by('date_added','desc');
		}else{
			$this->db->order_by(key($order_by), current($order_by));
		}
		
		$query = $this->db->get(TABLE_USER);
		
		return $query->result();
	}

	public function grab_user_list($page=null, $like){	
		$likes = '';
		if(!empty($like)){
			$likes = "AND (A.first_name LIKE '%".$like['search_key']."%' OR A.last_name LIKE '%".$like['search_key']."%' OR A.sponsor_id LIKE '%".$like['search_key']."%' OR A.mobile_no LIKE '%".$like['search_key']."%' OR B.sponsor_id LIKE '%".$like['search_key']."%' OR B.first_name LIKE '%".$like['search_key']."%' OR B.last_name LIKE '%".$like['search_key']."%')";
		}
		if(is_numeric($page)){
			$sql = "SELECT A.user_id AS id, A.first_name AS first_name, A.last_name AS last_name, A.mobile_no, A.sponsor_id AS user_id, A.status, B.first_name AS parent_first_name, B.last_name AS parent_last_name, B.sponsor_id FROM ".TABLE_USER." A, ".TABLE_USER." B WHERE A.parent_id = B.user_id ".$likes." ORDER BY A.user_id DESC LIMIT ".$page.", ".PAGINATION_PER_PAGE;
		}else{
			$sql = "SELECT A.user_id AS id, A.first_name AS first_name, A.last_name AS last_name, A.mobile_no, A.sponsor_id AS user_id, A.status, B.first_name AS parent_first_name, B.last_name AS parent_last_name, B.sponsor_id FROM ".TABLE_USER." A, ".TABLE_USER." B WHERE A.parent_id = B.user_id ".$likes." ORDER BY A.user_id DESC";
		}	
		
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	public function insert_user($data = array()){

		$this->db->insert(TABLE_USER, $data); 
		
		return $this->db->insert_id();;
	}
	
	public function update_user_details($cond = array(), $data = array()){

		$this->db->where($cond);
		$this->db->update(TABLE_USER, $data); 
		
		return true;
	}
	
	public function update_settings_details($cond = array(), $data = array()){

		$this->db->where($cond);
		$this->db->update(TABLE_SETTINGS, $data); 
		
		return true;
	}
	
	public function delete_user($cond = array()){
		$this->db->where($cond);
		
		$this->db->delete(TABLE_USER);
		
		return true;
	}
	
	public function get_cms_content($cond = array()){
		if(!empty($cond)){
			$this->db->where($cond);
		}
		
		$query = $this->db->get(TABLE_CMS);
        $result = $query->result();
		
		return $result[0];
	}
	
	public function update_cms_content($cond = array(), $data = array()){

		$this->db->where($cond);
		$this->db->update(TABLE_CMS, $data); 
		
		return true;
	}

	public function insert_user_pnr($data = array()){

		$this->db->insert(TABLE_USER_PNR, $data); 
		
		return $this->db->insert_id();;
	}
}