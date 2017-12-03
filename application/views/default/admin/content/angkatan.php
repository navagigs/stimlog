 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">angkatan</h4> </div>
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
                        <a href="<?php echo site_url();?>home/angkatan/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah angkatan</button></a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ANGKATAN</th> 
                                            <th>BIAYA</th>    
                                            <th>SEMESTER</th>   
                                            <th>JURUSAN</th>               
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
       								$query = $this->db->query("SELECT 
                                        angkatan.angkatan_id AS angkatan_id,
                                        angkatan.angkatan_biaya AS angkatan_biaya,
                                        semester.semester_id AS semester_id,
                                        semester.semester_nama AS semester_nama,
                                        jurusan.jurusan_id AS jurusan_id,
                                        jurusan.jurusan_nama AS jurusan_nama,
                                        tahun.tahun_id AS tahun_id,
                                        tahun.tahun_nama AS tahun_nama
                                     FROM angkatan
                                     LEFT JOIN semester ON semester.semester_id = angkatan.semester_id
                                     LEFT JOIN jurusan ON jurusan.jurusan_id = angkatan.jurusan_id
                                     LEFT JOIN tahun ON tahun.tahun_id = angkatan.tahun_id
                                     ");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->tahun_nama; ?></td>
                                            <td><?php echo $row->angkatan_biaya; ?></td>
                                            <td><?php echo $row->semester_nama; ?></td>
                                            <td><?php echo $row->jurusan_nama; ?></td>
                                            <td><a href="<?php echo site_url();?>home/angkatan/edit/<?php echo $row->angkatan_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/angkatan/hapus/<?php echo $row->angkatan_id; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                        <h4 class="page-title">Angkatan</h4> </div>
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
                            <h3 class="box-title">Tambah angkatan</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/angkatan/tambah" method="post" id="exampleStandardForm" autocomplete="off">
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Tahun</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>  
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Biaya</label>
                                        <input type="number" class="form-control input-sm" id="angkatan_biaya" name="angkatan_biaya" placeholder="Masukan Biaya" required/> 
                                    </div>
									<div class="form-group form-material">
										<label class="control-label" for="inputText">Semester</label>
										<?php $this->ADM->combo_box("SELECT * FROM semester", 'semester_id', 'semester_id', 'semester_nama', $semester_id);?>	
									</div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jurusan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM jurusan", 'jurusan_id', 'jurusan_id', 'jurusan_nama', $jurusan_id);?>   
                                    </div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/angkatan'"/>
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
                        <h4 class="page-title">angkatan</h4> </div>
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
                            <h3 class="box-title">Edit angkatan</h3>
                            	<div class="table-responsive">
                            	<form action="<?php echo site_url();?>home/angkatan/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="angkatan_id" value="<?php echo $angkatan_id;?>" />
                            	<div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tahun</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>  
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Biaya</label>
                                        <input type="number" class="form-control input-sm" id="angkatan_biaya" name="angkatan_biaya" placeholder="Masukan Biaya" value="<?php echo $angkatan_biaya; ?>" required/> 
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Semester</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM semester", 'semester_id', 'semester_id', 'semester_nama', $semester_id);?>   
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jurusan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM jurusan", 'jurusan_id', 'jurusan_id', 'jurusan_nama', $jurusan_id);?>   
                                    </div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/angkatan'"/>
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