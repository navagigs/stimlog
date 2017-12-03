<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mahasiswa', 'MHS', TRUE);
	}
	
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE){       
            redirect('mahasiswa/','refresh');
        } else {     
		$this->load->view('default/mahasiswa/login');               
        } 
	}

	public function ceklogin()
	{
		$mahasiswa_npm		= $this->input->post('mahasiswa_npm');
		$mahasiswa_password		= $this->input->post('mahasiswa_password');
		$do					= $this->input->post('masuk');
		
		$where_mahasiswa['mahasiswa_npm']	= $mahasiswa_npm;
		$where_mahasiswa['mahasiswa_password']	= do_hash($mahasiswa_password, 'md5');
		
		if ($do && $this->MHS->cek_login($where_mahasiswa) === TRUE){
			redirect("website");
		} else {
			$this->session->set_flashdata('warning','npm dan password tidak cocok!');
            redirect("mahasiswa");
		}
	}

	public function keluar()
	{
		$this->MHS->remov_session();
        session_destroy();
		redirect("mahasiswa");
	}


	
}

