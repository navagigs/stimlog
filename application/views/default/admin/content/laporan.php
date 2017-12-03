 <?php if ($action == 'view' || empty($action)){ ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4> </div>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>JURUSAN</th>                           
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
       								$query = $this->db->query("SELECT * FROM jurusan");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->jurusan_nama; ?></td>
                                            <td><a href="<?php echo site_url();?>home/laporan/pembayaran/<?php echo $row->jurusan_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-file"></span></button></a> 
                                           </td>
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

 <?php } elseif ($action == 'prodi') { ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4> </div>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>PRODI</th>                           
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM prodi WHERE jurusan_id='$jurusan_id'");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->prodi_nama; ?></td>
                                            <td><a href="<?php echo site_url();?>home/laporan/pembayaran/<?php echo $row->jurusan_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-file"></span></button></a> 
                                           </td>
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

 <?php } elseif ($action == 'pembayaran') { ?>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">laporan</h4> </div> <!-- /.col-lg-12 -->
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
                    <br>
                        <a href="<?php echo site_url();?>home/laporan_print/<?php echo $jurusan_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print Laporan</button></a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TANGGAL</th> 
                                            <th>NAMA MAHASISWA</th>   
                                            <th>SEMESTER</th>     
                                            <th>JUMLAH PEMABAYRAN</th>   
                                            <th>SISA PEMABAYRAN</th>   
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
                                     WHERE pembayaran.jurusan_id ='$jurusan_id'");
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
 <?php } ?>