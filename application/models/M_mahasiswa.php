<?php
class M_mahasiswa extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("mahasiswa");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'mahasiswa_id' 			=> $data->mahasiswa_id,
					'mahasiswa_npm' 		=> $data->mahasiswa_npm,
					'mahasiswa_password' 	=> $data->mahasiswa_password,
					'mahasiswa_nama' 		=> $data->mahasiswa_nama,
					'logged_in2'			=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['mahasiswa_id'] = $data->mahasiswa_id;
		$this->db->update('mahasiswa',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'mahasiswa_id'  =>'',
					'mahasiswa_npm'  =>'',
					'mahasiswa_password'  =>'',
					'logged_in2'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}