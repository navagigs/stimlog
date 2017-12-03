<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']	= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin); 
			$data['content']				= 'default/admin/content/home';
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}


	
	public function mahasiswa($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/mahasiswa';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'mahasiswa_npm';
				$data['mahasiswa_npm']		= ($this->input->post('mahasiswa_npm'))?$this->input->post('mahasiswa_npm'):'';
				$data['mahasiswa_password']	= ($this->input->post('mahasiswa_password'))?$this->input->post('mahasiswa_password'):'';
				$data['mahasiswa_nama']		= ($this->input->post('mahasiswa_nama'))?$this->input->post('mahasiswa_nama'):'';
				$data['mahasiswa_jk']		= ($this->input->post('mahasiswa_jk'))?$this->input->post('mahasiswa_jk'):'';
				$data['mahasiswa_notelp']	= ($this->input->post('mahasiswa_notelp'))?$this->input->post('mahasiswa_notelp'):'';
				$data['jurusan_id']			= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):'';
				$data['prodi_id']			= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):'';
				$data['tahun_id']			= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['mahasiswa_npm']	= $data['mahasiswa_npm'];
					$insert['mahasiswa_password']	= md5($data['mahasiswa_password']);
					$insert['mahasiswa_nama']	= $data['mahasiswa_nama'];
					$insert['mahasiswa_notelp']	= $data['mahasiswa_notelp'];
					$insert['jurusan_id']		= $data['jurusan_id'];
					$insert['prodi_id']			= $data['prodi_id'];
					$insert['tahun_id']		= $data['tahun_id'];
					$this->ADM->insert_mahasiswa($insert);
					$this->session->set_flashdata('success','Data mahasiswa telah berhasil ditambahkan!,');
					redirect("home/mahasiswa");
				}
			} elseif ($data['action'] == 'edit'){
				$where['mahasiswa_npm'] 	=  $filter2;		
				$data['onload']				= 'mahasiswa_npm';
				$where_mahasiswa['mahasiswa_npm']	= $filter2;
				$mahasiswa					= $this->ADM->get_mahasiswa('',$where_mahasiswa);
				$data['mahasiswa_npm']		= ($this->input->post('mahasiswa_npm'))?$this->input->post('mahasiswa_npm'):$mahasiswa->mahasiswa_npm;
				$data['mahasiswa_password']		= ($this->input->post('mahasiswa_password'))?$this->input->post('mahasiswa_password'):$mahasiswa->mahasiswa_password;
				$data['mahasiswa_nama']		= ($this->input->post('mahasiswa_nama'))?$this->input->post('mahasiswa_nama'):$mahasiswa->mahasiswa_nama;
				$data['mahasiswa_jk']	= ($this->input->post('mahasiswa_jk'))?$this->input->post('mahasiswa_jk'):$mahasiswa->mahasiswa_jk;
				$data['mahasiswa_notelp']	= ($this->input->post('mahasiswa_notelp'))?$this->input->post('mahasiswa_notelp'):$mahasiswa->mahasiswa_notelp;
				$data['jurusan_id']			= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$mahasiswa->jurusan_id;
				$data['prodi_id']			= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):$mahasiswa->prodi_id;
				$data['tahun_id']			= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):$mahasiswa->tahun_id;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['mahasiswa_npm']	= $data['mahasiswa_npm'];
					if($data['mahasiswa_password'] == $data['mahasiswa_password']) {
					$where_edit['mahasiswa_npm']	= $data['mahasiswa_npm'];
						if($data['mahasiswa_password'] <> '') {
							$edit['mahasiswa_password']		= do_hash(($data['mahasiswa_password']), 'md5'); 
						}
					}
					$edit['mahasiswa_nama']			= $data['mahasiswa_nama'];
					$edit['mahasiswa_jk']			= $data['mahasiswa_jk'];
					$edit['mahasiswa_notelp']		= $data['mahasiswa_notelp'];
					$edit['jurusan_id']				= $data['jurusan_id'];
					$edit['prodi_id']				= $data['prodi_id'];
					$edit['tahun_id']			= $data['tahun_id'];
					$this->ADM->update_mahasiswa($where_edit, $edit);
					$this->session->set_flashdata('success','Data mahasiswa telah berhasil diedit!,');
					redirect("home/mahasiswa");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['mahasiswa_npm'] 	= $filter2;
				$row = $this->ADM->get_mahasiswa('*', $where_delete);
				$this->ADM->delete_mahasiswa($where_delete);
				$this->session->set_flashdata('warning','Data mahasiswa berhasil dihapus!,');
				redirect("home/mahasiswa");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}

	public function admin($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/admin';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'admin_username';
				$data['admin_username']			= ($this->input->post('admin_username'))?$this->input->post('admin_username'):'';
				$data['password']			= ($this->input->post('password'))?$this->input->post('password'):'';
				$data['hak_akses']			= ($this->input->post('hak_akses'))?$this->input->post('hak_akses'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['admin_username']	= $data['admin_username'];
					$insert['password']	= md5($data['password']);
					$insert['hak_akses']= $data['hak_akses'];
					$this->ADM->insert_admin($insert);
					$this->session->set_flashdata('success','Data admin telah berhasil ditambahkan!,');
					redirect("home/admin");
				}
			} elseif ($data['action'] == 'edit'){
				$where['admin_username'] 	=  $filter2;		
				$data['onload']				= 'admin_username';
				$where_admin['admin_username']	= $filter2;
				$admin						= $this->ADM->get_admin('',$where_admin);
				//$data['id_admin']			= ($this->input->post('id_admin'))?$this->input->post('id_admin'):$admin->id_admin;
				$data['admin_username']		= ($this->input->post('admin_username'))?$this->input->post('admin_username'):$admin->admin_username;
				$data['password']			= ($this->input->post('password'))?$this->input->post('password'):$admin->password;
				$data['hak_akses']			= ($this->input->post('hak_akses'))?$this->input->post('hak_akses'):$admin->hak_akses;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['admin_username']	= $data['admin_username'];
					if($data['password'] == $data['password']) {
					$where_edit['admin_username']	= $data['admin_username'];
						if($data['password'] <> '') {
							$edit['password']		= do_hash(($data['password']), 'md5'); 
						}
					}
					//$edit['admin_username']			= $data['admin_username'];
					$edit['hak_akses']			= $data['hak_akses'];
					$this->ADM->update_admin($where_edit, $edit);
					$this->session->set_flashdata('success','Data admin telah berhasil diedit!,');
					redirect("home/admin");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_admin'] 	= $filter2;
				$row = $this->ADM->get_admin('*', $where_delete);
				$this->ADM->delete_admin($where_delete);
				$this->session->set_flashdata('warning','Data admin berhasil dihapus!,');
				redirect("home/admin");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}


	public function angkatan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/angkatan';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'angkatan_id';
				$data['angkatan_id']		= ($this->input->post('angkatan_id'))?$this->input->post('angkatan_id'):'';
				$data['tahun_id']		= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):'';
				$data['jurusan_id']	= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):'';
				$data['angkatan_biaya']	= ($this->input->post('angkatan_biaya'))?$this->input->post('angkatan_biaya'):'';
				$data['angkatan_biaya']	= ($this->input->post('angkatan_biaya'))?$this->input->post('angkatan_biaya'):'';
				$data['semester_id']	= ($this->input->post('semester_id'))?$this->input->post('semester_id'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['angkatan_id']	= $data['angkatan_id'];
					$insert['tahun_id']	= $data['tahun_id'];
					$insert['jurusan_id']	= $data['jurusan_id'];
					$insert['angkatan_biaya']	= $data['angkatan_biaya'];
					$insert['semester_id']		= $data['semester_id'];
					$this->ADM->insert_angkatan($insert);
					$this->session->set_flashdata('success','Data angkatan telah berhasil ditambahkan!,');
					redirect("home/angkatan");
				}
			} elseif ($data['action'] == 'edit'){
				$where['angkatan_id'] 	=  $filter2;		
				$data['onload']				= 'angkatan_id';
				$where_angkatan['angkatan_id']	= $filter2;
				$angkatan					= $this->ADM->get_angkatan('',$where_angkatan);
				$data['angkatan_id']		= ($this->input->post('angkatan_id'))?$this->input->post('angkatan_id'):$angkatan->angkatan_id;
				$data['tahun_id']		= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):$angkatan->tahun_id;
				$data['jurusan_id']	= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$angkatan->jurusan_id;
				$data['semester_id']	= ($this->input->post('semester_id'))?$this->input->post('semester_id'):$angkatan->semester_id;
				$data['angkatan_biaya']	= ($this->input->post('angkatan_biaya'))?$this->input->post('angkatan_biaya'):$angkatan->angkatan_biaya;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['angkatan_id']	= $data['angkatan_id'];
					$edit['tahun_id']		= $data['tahun_id'];
					$edit['jurusan_id']			= $data['jurusan_id'];
					$edit['semester_id']		= $data['semester_id'];
					$edit['angkatan_biaya']		= $data['angkatan_biaya'];
					$this->ADM->update_angkatan($where_edit, $edit);
					$this->session->set_flashdata('success','Data angkatan telah berhasil diedit!,');
					redirect("home/angkatan");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['angkatan_id'] 	= $filter2;
				$row = $this->ADM->get_angkatan('*', $where_delete);
				$this->ADM->delete_angkatan($where_delete);
				$this->session->set_flashdata('warning','Data angkatan berhasil dihapus!,');
				redirect("home/angkatan");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}

	public function prodi($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/prodi';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'prodi_id';
				$data['prodi_nama']		= ($this->input->post('prodi_nama'))?$this->input->post('prodi_nama'):'';
				$data['jurusan_id']			= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['prodi_id']	= $data['prodi_id'];
					$insert['prodi_nama']	= $data['prodi_nama'];
					$insert['jurusan_id']		= $data['jurusan_id'];
					$this->ADM->insert_prodi($insert);
					$this->session->set_flashdata('success','Data prodi telah berhasil ditambahkan!,');
					redirect("home/prodi");
				}
			} elseif ($data['action'] == 'edit'){
				$where['prodi_id'] 	=  $filter2;		
				$data['onload']				= 'prodi_id';
				$where_prodi['prodi_id']	= $filter2;
				$prodi					= $this->ADM->get_prodi('',$where_prodi);
				$data['prodi_id']		= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):$prodi->prodi_id;
				$data['prodi_nama']		= ($this->input->post('prodi_nama'))?$this->input->post('prodi_nama'):$prodi->prodi_nama;
				$data['jurusan_id']			= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$prodi->jurusan_id;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['prodi_id']	= $data['prodi_id'];
					$edit['prodi_nama']			= $data['prodi_nama'];
					$edit['jurusan_id']				= $data['jurusan_id'];
					$this->ADM->update_prodi($where_edit, $edit);
					$this->session->set_flashdata('success','Data prodi telah berhasil diedit!,');
					redirect("home/prodi");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['prodi_id'] 	= $filter2;
				$row = $this->ADM->get_prodi('*', $where_delete);
				$this->ADM->delete_prodi($where_delete);
				$this->session->set_flashdata('warning','Data prodi berhasil dihapus!,');
				redirect("home/prodi");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}

	public function jurusan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/jurusan';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'jurusan_nama';
				$data['jurusan_nama']		= ($this->input->post('jurusan_nama'))?$this->input->post('jurusan_nama'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['jurusan_id']	= $data['jurusan_id'];
					$insert['jurusan_nama']	= $data['jurusan_nama'];
					$this->ADM->insert_jurusan($insert);
					$this->session->set_flashdata('success','Data jurusan telah berhasil ditambahkan!,');
					redirect("home/jurusan");
				}
			} elseif ($data['action'] == 'edit'){
				$where['jurusan_id'] 	=  $filter2;		
				$data['onload']				= 'jurusan_id';
				$where_jurusan['jurusan_id']	= $filter2;
				$jurusan					= $this->ADM->get_jurusan('',$where_jurusan);
				$data['jurusan_id']		= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$jurusan->jurusan_id;
				$data['jurusan_nama']		= ($this->input->post('jurusan_nama'))?$this->input->post('jurusan_nama'):$jurusan->jurusan_nama;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['jurusan_id']	= $data['jurusan_id'];
					$edit['jurusan_nama']			= $data['jurusan_nama'];
					$this->ADM->update_jurusan($where_edit, $edit);
					$this->session->set_flashdata('success','Data jurusan telah berhasil diedit!,');
					redirect("home/jurusan");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['jurusan_id'] 	= $filter2;
				$row = $this->ADM->get_jurusan('*', $where_delete);
				$this->ADM->delete_jurusan($where_delete);
				$this->session->set_flashdata('warning','Data jurusan berhasil dihapus!,');
				redirect("home/jurusan");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}

	public function pembayaran($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/pembayaran';			
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
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'pembayaran_id';
				$data['pembayaran_id']		= ($this->input->post('pembayaran_id'))?$this->input->post('pembayaran_id'):'';
				$data['pembayaran_tanggal']	= ($this->input->post('pembayaran_tanggal'))?$this->input->post('pembayaran_tanggal'):'';
				$data['mahasiswa_npm']		= ($this->input->post('mahasiswa_npm'))?$this->input->post('mahasiswa_npm'):'';
				$data['mahasiswa_nama']		= ($this->input->post('mahasiswa_nama'))?$this->input->post('mahasiswa_nama'):'';
				$data['pembayaran_jumlah']	= ($this->input->post('pembayaran_jumlah'))?$this->input->post('pembayaran_jumlah'):'';
				$data['pembayaran_sisa']	= ($this->input->post('pembayaran_sisa'))?$this->input->post('pembayaran_sisa'):'';
				$data['semester_id']		= ($this->input->post('semester_id'))?$this->input->post('semester_id'):'';
				$data['jurusan_id']			= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):'';
				$data['prodi_id']			= ($this->input->post('jurusan_id'))?$this->input->post('prodi_id'):'';
				$data['tahun_id']		= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):'';
				$data['pembayaran_keterangan']		= ($this->input->post('pembayaran_keterangan'))?$this->input->post('pembayaran_keterangan'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['pembayaran_id']	= $data['pembayaran_id'];
					$insert['pembayaran_tanggal']	= $data['pembayaran_tanggal'];
					$insert['mahasiswa_npm']	= $data['mahasiswa_npm'];
					$insert['pembayaran_jumlah']= $data['pembayaran_jumlah'];
					$insert['pembayaran_sisa']	= $data['pembayaran_sisa'];
					$insert['semester_id']		= $data['semester_id'];
					$insert['jurusan_id']		= $data['jurusan_id'];
					$insert['tahun_id']			= $data['tahun_id'];
					$insert['pembayaran_keterangan']= $data['pembayaran_keterangan'];
					$this->ADM->insert_pembayaran($insert);
					$this->session->set_flashdata('success','Data pembayaran telah berhasil ditambahkan!,');
					redirect("home/pembayaran");
				}
			} elseif ($data['action'] == 'edit'){
				$where['pembayaran_id'] 	=  $filter2;		
				$data['onload']				= 'pembayaran_id';
				$where_pembayaran['pembayaran_id']	= $filter2;
				$pembayaran					= $this->ADM->get_pembayaran('',$where_pembayaran);
				$data['pembayaran_id']		= ($this->input->post('pembayaran_id'))?$this->input->post('pembayaran_id'):$pembayaran->pembayaran_id;
				$data['pembayaran_tanggal']		= ($this->input->post('pembayaran_tanggal'))?$this->input->post('pembayaran_tanggal'):$pembayaran->pembayaran_tanggal;
				$data['mahasiswa_npm']	= ($this->input->post('mahasiswa_npm'))?$this->input->post('mahasiswa_npm'):$pembayaran->mahasiswa_npm;
				$data['pembayaran_jumlah']	= ($this->input->post('pembayaran_jumlah'))?$this->input->post('pembayaran_jumlah'):$pembayaran->pembayaran_jumlah;
				$data['pembayaran_sisa']	= ($this->input->post('pembayaran_sisa'))?$this->input->post('pembayaran_sisa'):'';
				$data['pembayaran_jumlah']	= ($this->input->post('pembayaran_jumlah'))?$this->input->post('pembayaran_jumlah'):$pembayaran->pembayaran_jumlah;
				$data['semester_id']	= ($this->input->post('semester_id'))?$this->input->post('semester_id'):$pembayaran->semester_id;
				$data['jurusan_id']	= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$pembayaran->jurusan_id;
				$data['tahun_id']	= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):$pembayaran->tahun_id;
				$data['pembayaran_keterangan']	= ($this->input->post('pembayaran_keterangan'))?$this->input->post('pembayaran_keterangan'):$pembayaran->pembayaran_keterangan;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['pembayaran_id']	= $data['pembayaran_id'];
					$edit['pembayaran_tanggal']		= $data['pembayaran_tanggal'];
					$edit['mahasiswa_npm']			= $data['mahasiswa_npm'];
					$edit['pembayaran_jumlah']		= $data['pembayaran_jumlah'];
					$edit['pembayaran_sisa']		= $data['pembayaran_sisa'];
					$edit['semester_id']			= $data['semester_id'];
					$edit['jurusan_id']				= $data['jurusan_id'];
					$edit['tahun_id']				= $data['tahun_id'];
					$edit['pembayaran_keterangan']	= $data['pembayaran_keterangan'];
					$this->ADM->update_pembayaran($where_edit, $edit);
					$this->session->set_flashdata('success','Data pembayaran telah berhasil diedit!,');
					redirect("home/pembayaran");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['pembayaran_id'] 	= $filter2;
				$row = $this->ADM->get_pembayaran('*', $where_delete);
				$this->ADM->delete_pembayaran($where_delete);
				$this->session->set_flashdata('warning','Data pembayaran berhasil dihapus!,');
				redirect("home/pembayaran");
			 }elseif ($data['action'] == 'status'){
				$where_edit['pembayaran_id'] 	= $filter2;
				if ($filter3 == 'Y') {
					$edit['pembayaran_status'] = 'N';
				} else {
 					$edit['pembayaran_status']= 'Y';
				}
				$this->ADM->update_pembayaran($where_edit, $edit);
					$this->session->set_flashdata('success','Data status pembayaran telah berhasil diedit!,');
				redirect("home/pembayaran");
			}           			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}
	
	public function laporan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/laporan';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'prodi'){
				$where['jurusan_id'] 	=  $filter2;		
				$data['onload']				= 'jurusan_id';
				$where_prodi['jurusan_id']	= $filter2;
				$prodi					= $this->ADM->get_prodi('',$where_prodi);
				$data['prodi_id']		= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):$prodi->prodi_id;
				$data['jurusan_id']		= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$prodi->jurusan_id;
			} elseif ($data['action'] == 'pembayaran'){
				$where['jurusan_id'] 	=  $filter2;		
				$data['onload']				= 'jurusan_id';
				$where_pembayaran['jurusan_id']	= $filter2;
				$pembayaran					= $this->ADM->get_pembayaran('',$where_pembayaran);
				$data['pembayaran_id']		= ($this->input->post('pembayaran_id'))?$this->input->post('pembayaran_id'):$pembayaran->pembayaran_id;
				$data['jurusan_id']		= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$pembayaran->jurusan_id;
			} elseif ($data['action'] == 'edit'){
				$where['laporan_id'] 	=  $filter2;		
				$data['onload']				= 'laporan_id';
				$where_laporan['laporan_id']	= $filter2;
				$laporan					= $this->ADM->get_laporan('',$where_laporan);
				$data['laporan_id']		= ($this->input->post('laporan_id'))?$this->input->post('laporan_id'):$laporan->laporan_id;
				$data['laporan_nama']		= ($this->input->post('laporan_nama'))?$this->input->post('laporan_nama'):$laporan->laporan_nama;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['laporan_id']	= $data['laporan_id'];
					$edit['laporan_nama']			= $data['laporan_nama'];
					$this->ADM->update_laporan($where_edit, $edit);
					$this->session->set_flashdata('success','Data laporan telah berhasil diedit!,');
					redirect("home/laporan");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['laporan_id'] 	= $filter2;
				$row = $this->ADM->get_laporan('*', $where_delete);
				$this->ADM->delete_laporan($where_delete);
				$this->session->set_flashdata('warning','Data laporan berhasil dihapus!,');
				redirect("home/laporan");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}


	public function rekapitulasi($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'default/admin/content/rekapitulasi';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'prodi'){
				$where['jurusan_id'] 	=  $filter2;		
				$data['onload']				= 'jurusan_id';
				$where_prodi['jurusan_id']	= $filter2;
				$prodi					= $this->ADM->get_prodi('',$where_prodi);
				$data['prodi_id']		= ($this->input->post('prodi_id'))?$this->input->post('prodi_id'):$prodi->prodi_id;
				$data['jurusan_id']		= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$prodi->jurusan_id;
			} elseif ($data['action'] == 'pembayaran'){
				$where['jurusan_id'] 	=  $filter2;		
				$data['onload']				= 'semester_id';
				$where_pembayaran['semester_id']	= $filter2;
				$pembayaran					= $this->ADM->get_pembayaran('',$where_pembayaran);
				$data['pembayaran_id']		= ($this->input->post('pembayaran_id'))?$this->input->post('pembayaran_id'):$pembayaran->pembayaran_id;
				$data['semester_id']		= ($this->input->post('semester_id'))?$this->input->post('semester_id'):$pembayaran->semester_id;
			} elseif ($data['action'] == 'hapus'){
				$where_delete['rekapitulasi_id'] 	= $filter2;
				$row = $this->ADM->get_rekapitulasi('*', $where_delete);
				$this->ADM->delete_rekapitulasi($where_delete);
				$this->session->set_flashdata('warning','Data rekapitulasi berhasil dihapus!,');
				redirect("home/rekapitulasi");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 

	}

	public function laporan_print($jurusan_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);	
			// $where['jurusan_id'] 		=  $filter2;		
			// $where_pembayaran['jurusan_id']	= $filter2;
			// $pembayaran					= $this->ADM->get_pembayaran('',$where_pembayaran);
			// $data['jurusan_id']		= ($this->input->post('jurusan_id'))?$this->input->post('jurusan_id'):$pembayaran->jurusan_id;
            $where_pembayaran['jurusan_id'] 	= $jurusan_id;
            $data['pembayaran']        	= $this->ADM->get_pembayaran('',$where_pembayaran);
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporan_print');
		} else {
			redirect("login");
		} 
	}

	public function rekapitulasi_print($semester_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);	
            $where_pembayaran['semester_id'] 	= $semester_id;
            $data['pembayaran']        	= $this->ADM->get_pembayaran('',$where_pembayaran);
			    		header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanRekapitulasi.xls");
				        header("Content-Transfer-Encoding: binary ");		
			$this->load->vars($data);
			$this->load->view('default/admin/content/rekapitulasi_print');
		} else {
			redirect("login");
		} 
	}

	
}	

