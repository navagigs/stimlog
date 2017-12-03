 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">pembayaran</h4> </div> <!-- /.col-lg-12 -->
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
                    <!-- <div class="row">
                      <div class="col-xs-6"><a href="<?php echo site_url();?>website/pembayaran/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah pembayaran</button></a></div>
                      <div class="col-xs-6"><form action="" method="post" id="form">
                                                    <div class='row'>
                                                        <div class='col-md-6 col-sm-12'>
                                                            <div class='button-search'><?php array_pilihan('cari', $berdasarkan, $cari);?></div>
                                                        </div>
                                                        <div class='col-md-6 col-sm-12 select-search'>
                                                            <div class="input-group">
                                                                <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                                                <span class="input-group-btn">
                                                                    <button type="submit" name="kirim" class="btn btn-primary" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class='btn-navigation'> 
                                                        <div class='pull-right'>
                                                        </div>
                                                    </div> 
                                            </form></div></div> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TANGGAL</th> 
                                            <th>NAMA MAHASISWA</th>   
                                            <th>SEMESTER</th>     
                                            <th>JUMLAH PEMBAYARAN</th>   
                                            <th>SISA PEMBAYARAN</th>     
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       <?php 
                                          $no=1;
                                    $query = $this->db->query("SELECT 
                                        pembayaran.pembayaran_id AS pembayaran_id,
                                        pembayaran.pembayaran_tanggal AS pembayaran_tanggal,
                                        pembayaran.pembayaran_jumlah AS pembayaran_jumlah,
                                        pembayaran.pembayaran_sisa AS pembayaran_sisa,
                                        pembayaran.pembayaran_status AS pembayaran_status,
                                        pembayaran.mahasiswa_npm AS mahasiswa_npm,
                                        pembayaran.jurusan_id AS jurusan_id,
                                        semester.semester_id AS semester_id,
                                        semester.semester_nama AS semester_nama,
                                        jurusan.jurusan_id AS jurusan_id,
                                        jurusan.jurusan_nama AS jurusan_nama,
                                        mahasiswa.mahasiswa_npm AS mahasiswa_npm,
                                        mahasiswa.mahasiswa_nama AS mahasiswa_nama
                                     FROM pembayaran
                                     LEFT JOIN semester ON semester.semester_id = pembayaran.semester_id
                                     LEFT JOIN jurusan ON jurusan.jurusan_id = pembayaran.jurusan_id
                                     LEFT JOIN mahasiswa ON mahasiswa.mahasiswa_npm = pembayaran.mahasiswa_npm
                                     WHERE pembayaran.mahasiswa_npm ='$mahasiswa->mahasiswa_npm' AND pembayaran.pembayaran_status ='Y'");
                                    foreach ($query->result() as $row){ 
                                            ?>
                                  
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo dateIndo($row->pembayaran_tanggal); ?></td>
                                            <td><?php echo $row->mahasiswa_nama; ?></td>
                                            <td><?php echo $row->semester_nama; ?></td>
                                            <td><?php echo $row->pembayaran_jumlah; ?></td>
                                            <td><?php 
												if (empty($row->pembayaran_sisa))
												{
												    echo "<b>Lunas</b>";
												}
												else
												{
												    echo $row->pembayaran_sisa;
												} ?></td>
                                            <td><a href="<?php echo site_url();?>website/pembayaran_print/<?php echo $row->pembayaran_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></button></a> </td>
                                        </tr>
                                      <?php
                                    $no++; }  ?>
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


 <?php } ?>