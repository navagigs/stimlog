<?php
class M_admin extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }
	

    // ================================================== MODUL HOME ================================================== //
	//CONFIGURATION TABEL admin
	public function insert_admin($data){
        $this->db->insert("admin2",$data);
    }
    
    public function update_admin($where,$data){
        $this->db->update("admin2",$data,$where);
    }

    public function delete_admin($where){
        $this->db->delete("admin2", $where);
    }

	public function get_admin($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("admin2");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_admin($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin2");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_admin($where="", $like=""){
        $this->db->select("*");
        $this->db->from("admin2");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //CONFIGURATION TABEL angkatan
    public function insert_angkatan($data){
        $this->db->insert("angkatan",$data);
    }
    
    public function update_angkatan($where,$data){
        $this->db->update("angkatan",$data,$where);
    }

    public function delete_angkatan($where){
        $this->db->delete("angkatan", $where);
    }

    public function get_angkatan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("angkatan");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_angkatan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("angkatan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_angkatan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("angkatan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

     //CONFIGURATION TABEL pembayaran
    public function insert_pembayaran($data){
        $this->db->insert("pembayaran",$data);
    }
    
    public function update_pembayaran($where,$data){
        $this->db->update("pembayaran",$data,$where);
    }

    public function delete_pembayaran($where){
        $this->db->delete("pembayaran", $where);
    }

    public function get_pembayaran($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pembayaran");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

       public function grid_all_pembayaran($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pembayaran p");
        $this->db->join('mahasiswa m', 'p.mahasiswa_npm= m.mahasiswa_npm', 'left');
        $this->db->join('semester s', 'p.semester_id= s.semester_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }


    public function count_all_pembayaran($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pembayaran p");
        $this->db->join('mahasiswa m', 'p.mahasiswa_npm= m.mahasiswa_npm', 'left');
        $this->db->join('semester s', 'p.semester_id= s.semester_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //CONFIGURATION TABEL mahasiswa

    public function get_all_mahasiswa(){
        $query = $this->db->query("SELECT
            mahasiswa.mahasiswa_npm AS mahasiswa_npm,
            mahasiswa.mahasiswa_nama AS mahasiswa_nama,
            mahasiswa.mahasiswa_jk AS mahasiswa_jk,
            mahasiswa.mahasiswa_notelp AS mahasiswa_notelp,
            jurusan.jurusan_id AS jurusan_id,
            jurusan.jurusan_nama AS jurusan_nama,
            prodi.prodi_id AS prodi_id,
            prodi.prodi_nama AS prodi_nama,
            angkatan.angkatan_id AS angkatan_id,
            angkatan.angkatan_nama AS angkatan_nama
        FROM mahasiswa
        LEFT JOIN jurusan ON jurusan.jurusan_id=mahasiswa.jurusan_id
        LEFT JOIN prodi ON prodi.prodi_id=mahasiswa.prodi_id
        LEFT JOIN angkatan ON angkatan.angkatan_id=mahasiswa.angkatan_id");
        $query = $query->result_array();
        return $query;
    }


    public function insert_mahasiswa($data){
        $this->db->insert("mahasiswa",$data);
    }
    
    public function update_mahasiswa($where,$data){
        $this->db->update("mahasiswa",$data,$where);
    }

    public function delete_mahasiswa($where){
        $this->db->delete("mahasiswa", $where);
    }

    public function get_mahasiswa($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("mahasiswa mhs");
        $this->db->join('jurusan k', 'mhs.jurusan_id= k.jurusan_id', 'left');
        $this->db->join('prodi p', 'mhs.prodi_id= p.prodi_id', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_mahasiswa($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("mahasiswa");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_mahasiswa($where="", $like=""){
        $this->db->select("*");
        $this->db->from("mahasiswa");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //CONFIGURATION TABEL prodi
    public function insert_prodi($data){
        $this->db->insert("prodi",$data);
    }
    
    public function update_prodi($where,$data){
        $this->db->update("prodi",$data,$where);
    }

    public function delete_prodi($where){
        $this->db->delete("prodi", $where);
    }

    public function get_prodi($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("prodi");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_prodi($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("prodi mk");
        $this->db->join('angkatan d', 'mk.angkatan_nip= d.angkatan_nip', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_prodi($where="", $like=""){
        $this->db->select("*");
        $this->db->from("prodi");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    
   
    //CONFIGURATION TABEL jurusan
    public function insert_jurusan($data){
        $this->db->insert("jurusan",$data);
    }
    
    public function update_jurusan($where,$data){
        $this->db->update("jurusan",$data,$where);
    }

    public function delete_jurusan($where){
        $this->db->delete("jurusan", $where);
    }

    public function get_jurusan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("jurusan");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_jurusan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("jurusan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_jurusan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("jurusan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

  
    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
    public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
       // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box3($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name'  style='display:none;' id='$name' onchange='$js' class='form-control input-sm' style='width:$width'>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
            echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
        }
    }
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_jurusan($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->jurusan_id, $array_tag) === false)? '' : 'checked';
            echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
        }
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
            echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function listarray($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo $row->$name_value.", ";
            }
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function tagsberita($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo "<a href='".site_url()."news/tags/".$row->tag_id."' class='tag'>".$row->$name_value."</a> ";
            }
        }
    }
}