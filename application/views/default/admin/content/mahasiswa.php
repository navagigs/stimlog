 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mahasiswa</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <br>
                        <a href="<?php echo site_url();?>home/mahasiswa/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Mahasiswa</button></a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NPM</th> 
                                            <th>NAMA</th> 
                                            <th>JURUSAN</th>
                                            <th>PRODI</th>  
                                            <th>NO.TELEPON</th>       
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
       								$query = $this->db->query("SELECT 
                                        mahasiswa.mahasiswa_npm AS mahasiswa_npm,
                                        mahasiswa.mahasiswa_nama AS mahasiswa_nama,
                                        mahasiswa.mahasiswa_notelp AS mahasiswa_notelp,
                                        jurusan.jurusan_id AS jurusan_id,
                                        jurusan.jurusan_nama AS jurusan_nama,
                                        prodi.prodi_id AS prodi_id,
                                        prodi.prodi_nama AS prodi_nama
                                     FROM mahasiswa
                                     LEFT JOIN jurusan ON jurusan.jurusan_id = mahasiswa.jurusan_id
                                     LEFT JOIN prodi ON prodi.prodi_id = mahasiswa.prodi_id");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->mahasiswa_npm; ?></td>
                                            <td><?php echo $row->mahasiswa_nama; ?></td>
                                            <td><?php echo $row->jurusan_nama; ?></td>
                                            <td><?php echo $row->prodi_nama; ?></td>
                                            <td><?php echo $row->mahasiswa_notelp; ?></td>
                                            <td><a href="<?php echo site_url();?>home/mahasiswa/edit/<?php echo $row->mahasiswa_npm; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/mahasiswa/hapus/<?php echo $row->mahasiswa_npm; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                        </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
               
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
          
        </div>

 <?php } elseif ($action == 'tambah') { ?>
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mahasiswa</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">                       
                            <h3 class="box-title">Tambah Mahasiswa</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/mahasiswa/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									<div class="form-group form-material">
										<label class="control-label" for="inputText">NPM</label>
										<input type="text" class="form-control input-sm" id="mahasiswa_npm" name="mahasiswa_npm" placeholder="Masukan NPM" required/>
									</div>	
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Password</label>
                                        <input type="password" class="form-control input-sm" id="mahasiswa_password" name="mahasiswa_password" placeholder="Masukan password" required/>
                                    </div>  
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Nama</label>
										<input type="text" class="form-control input-sm" id="mahasiswa_nama" name="mahasiswa_nama" placeholder="Masukan Nama" required/> 
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jenis Kelamin</label>
                                        <div>
                                          <input type="radio" name="mahasiswa_jk" value="L"> Laki-laki
                                          <input type="radio" name="mahasiswa_jk" value="P" checked=""> Perempuan
                                        </div>
                                    </div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">No.Telepon</label>
										<input type="number" class="form-control input-sm" id="mahasiswa_notelp" name="mahasiswa_notelp" placeholder="Masukan No.Telepon" required/> 
									</div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Jurusan</label>
										<?php $this->ADM->combo_box("SELECT * FROM jurusan", 'jurusan_id', 'jurusan_id', 'jurusan_nama', $jurusan_id);?>	
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Prodi</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM prodi", 'prodi_id', 'prodi_id', 'prodi_nama', $prodi_id);?>    
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Angkatan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>        
                                    </div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/mahasiswa'"/>
			                        </div>
								</form>
                            	</div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
               
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
          
        </div>

 <?php } elseif ($action == 'edit') { ?>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mahasiswa</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">                       
                            <h3 class="box-title">Edit Mahasiswa</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/mahasiswa/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="mahasiswa_npm" value="<?php echo $mahasiswa_npm;?>" />
                            	   <div class="form-group form-material">
										<label class="control-label" for="inputText">NPM</label>
										<input type="text" class="form-control input-sm" disabled id="mahasiswa_npm" name="mahasiswa_npm" value="<?php echo $mahasiswa_npm;?>" required/>
									</div>	
									<div class="form-group form-material">
                                        <label class="control-label" for="inputText">Password</label>
                                        <input type="password" class="form-control input-sm" id="mahasiswa_password" name="mahasiswa_password" placeholder="Masukan password" /> <span>*kosongkan jika password tidak diubah</span>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama</label>
                                        <input type="text" class="form-control input-sm" id="mahasiswa_nama" name="mahasiswa_nama" placeholder="Masukan Nama" value="<?php echo $mahasiswa_nama;?>" required/> 
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jenis Kelamin</label>
                                        <div>
                                          <input type="radio" name="mahasiswa_jk" value="L" <?php echo $l = ($mahasiswa_jk=='L')?'checked':'';?> > Laki-laki
                                          <input type="radio" name="mahasiswa_jk" value="P" <?php echo $p = ($mahasiswa_jk=='P')?'checked':'';?>> Perempuan
                                        </div>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Telepon</label>
                                        <input type="number" class="form-control input-sm" id="mahasiswa_notelp" name="mahasiswa_notelp" value="<?php echo $mahasiswa_notelp;?>" required/> 
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jurusan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM jurusan", 'jurusan_id', 'jurusan_id', 'jurusan_nama', $jurusan_id);?>    
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Prodi</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM prodi", 'prodi_id', 'prodi_id', 'prodi_nama', $prodi_id);?>    
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Angkatan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>        
                                    </div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/mahasiswa'"/>
			                        </div>
								</form>
                            	</div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
               
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
          
        </div>
 <?php } ?>