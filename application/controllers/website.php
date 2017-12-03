<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Website extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mahasiswa', 'MHS', TRUE);
		$this->load->model('M_admin', 'ADM', TRUE);
	}


	public function index()
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_mahasiswa['mahasiswa_npm']	= $this->session->userdata('mahasiswa_npm');
			$data['mahasiswa']					= $this->ADM->get_mahasiswa('',$where_mahasiswa); 
			$data['content']				= 'default/mahasiswa/content/home';
			$this->load->vars($data);
			$this->load->view('default/mahasiswa/home');
		} else {
			redirect("mahasiswa");
		} 
	}

	public function pembayaran($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			$where_mahasiswa['mahasiswa_npm']			= $this->session->userdata('mahasiswa_npm');
			$data['mahasiswa']					= $this->ADM->get_mahasiswa('',$where_mahasiswa);
			$data['content']				= 'default/mahasiswa/content/pembayaran';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){				
				$data['berdasarkan']		= array('mahasiswa_nama'=>'NAMA MAHASISWA');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'mahasiswa_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_pembayaran[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_pembayaran('', $like_pembayaran);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			}         			
			$this->load->vars($data);
			$this->load->view('default/mahasiswa/home');
		} else {
			redirect("mahasiswa");
		} 

	}

	public function pembayaran_print($pembayaran_id='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_mahasiswa['mahasiswa_npm']			= $this->session->userdata('mahasiswa_npm');
			$data['mahasiswa']					= $this->ADM->get_mahasiswa('',$where_mahasiswa);
			// $where['jurusan_id'] 		=  $filter2;		
			// $where_pembayaran['jurusan_id']	= $filter2;
			// $pembayaran					= $this->ADM->get_pembayaran('',$where_pembayaran);
			// $data['jurusan_id']		= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$pembayaran->jurusan_id;
            //$where_pembayaran['mahasiswa_npm'] 	= $mahasiswa_npm;
            $where_pembayaran['pembayaran_id'] 	= $pembayaran_id;
            $data['pembayaran']        	= $this->ADM->get_pembayaran('',$where_pembayaran);
			$this->load->vars($data);
			$this->load->view('default/mahasiswa/content/pembayaran_print');
		} else {
			redirect("mahasiswa");
		} 
	}

	public function data(){
		// Query from m_restfull.php
		$mhs = $this->ADM->get_all_mahasiswa();
		if(!empty($mhs)){
			foreach ($mhs as $row) {
				// data array from database
				$json[] = array(
					'mahasiswa_npm' 		=> $row['mahasiswa_npm'],
					'mahasiswa_nama'		=> $row['mahasiswa_nama'],
					'mahasiswa_jk'			=> $row['mahasiswa_jk'],
					'mahasiswa_notelp'		=> $row['mahasiswa_notelp'],
					'jurusan_nama'			=> $row['jurusan_nama'],
					'prodi_nama'			=> $row['prodi_nama'],
					'angkatan_nama'			=> $row['angkatan_nama']
				);
			}
		}else{
			$json = array();
		}
		
		// Print with json_encode()
		echo json_encode($json);
	}
	
}