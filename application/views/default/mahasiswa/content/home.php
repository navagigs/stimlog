 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Beranda</h4> </div>
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
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Beranda</h3>
                          Selamat datang di Sistem Administrasi Pengelolaan Keuangan Sekolah Tinggi Ilmu Manajemen Logistik, Halaman mahasiswa <br><br>

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

                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i> Terimakasih anda telah melakukan pembayaran SPP <b><?php echo $row->semester_nama; ?></b>, Silahkan Print Bukti Pembayaran <a href="<?php echo site_url();?>website/pembayaran_print/<?php echo $row->pembayaran_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></button></a>
                            </div>
                            <?php } ?>
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