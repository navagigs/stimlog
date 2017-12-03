<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
	function __construct() {
		$this->tableName = 'admin2';
		$this->primaryKey = 'admin_id';
	}
	public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$query = $this->db->get();
		$check = $query->num_rows();
		
		if($check > 0){
			$result = $query->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$data['admin_level'] = "3";
			$update = $this->db->update($this->tableName,$data,array('admin_id'=>$result['admin_id']));
			$userID = $result['admin_id'];
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$data['admin_level'] = "3";
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:false;
    }
}
