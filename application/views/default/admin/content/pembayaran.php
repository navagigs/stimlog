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
                    <div class="row">
                      <div class="col-xs-6"><a href="<?php echo site_url();?>home/pembayaran/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah pembayaran</button></a></div>
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
                                            </form></div></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>TANGGAL</th> 
                                            <th>NAMA MAHASISWA</th>   
                                            <th>SEMESTER</th>     
                                            <th>JUMLAH  PEMBAYARAN</th>   
                                            <th>SISA  PEMBAYARAN</th>     
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       <?php 
                                            $i  = $page+1;
                                            $like_pembayaran[$cari]    = $q;
                                        if ($jml_data > 0){
                                            foreach ($this->ADM->grid_all_pembayaran('', 'pembayaran_id', 'DESC', $batas, $page, '', $like_pembayaran) as $row){
                                            ?>
                                  
                                        <tr>
                                            <td><?php echo $i; ?></td>
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
                                            <td><a href="<?php echo site_url();?>home/pembayaran/edit/<?php echo $row->pembayaran_id; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/pembayaran/status/<?php echo $row->pembayaran_id; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-file"></span></button></a> 
                                            <a href="<?php echo site_url();?>home/pembayaran/hapus/<?php echo $row->pembayaran_id; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                        </tr>
                                      <?php
                                    $i++;
                                } 
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8">Belum ada data!.</td>
                                </tr>
                            <?php } ?>
                                <tr>
                                    <th colspan="8" align="left">TOTAL : <?php echo $jml_data;?>
                                        <ul class="pagination pull-right">
                                             <li><?php if ($jml_halaman > 1){ echo pages($halaman, $jml_halaman, 'home/pembayaran/view', $id=""); }?></li>
                                        </ul>
                                    </th>
                                </tr>
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
                        <h4 class="page-title">pembayaran</h4> </div>
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
                <script>
                    function sum() {
                          var txtFirstNumberValue = document.getElementById('txt1').value;
                          var txtSecondNumberValue = document.getElementById('txt2').value;
                          var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
                          if (!isNaN(result)) {
                             document.getElementById('txt3').value = result;
                          }
                    }
            </script>
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">                       
                            <h3 class="box-title">Tambah pembayaran</h3>
                                <div class="table-responsive">
                                <form action="<?php echo site_url();?>home/pembayaran/tambah" method="post" id="exampleStandardForm" autocomplete="off"  onSubmit="return validate()">
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NPM</label>
                                        <input type="text" class="form-control input-sm" id="mahasiswa_npm" name="mahasiswa_npm" value="<?php echo $mahasiswa_npm; ?>" placeholder="NPM" required/> 
                                    </div>
                                    
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Semester</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM semester", 'semester_id', 'semester_id', 'semester_nama', $semester_id, 'submit();');?>  
                                    </div>
                                <?php if ($mahasiswa_npm == $mahasiswa_npm ) {?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama Mahasiswa</label>

                                        <?php $query = $this->db->query("SELECT * FROM mahasiswa WHERE mahasiswa_npm='$mahasiswa_npm' limit 1");
                                        foreach ($query->result() as $row){?>
                                        <input type="text" class="form-control input-sm" name="mahasiswa_nama" value="<?php echo $row->mahasiswa_nama; ?>" disabled /> 
                                         <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if ($mahasiswa_npm == $mahasiswa_npm ) {?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Prodi</label>
                                        <?php $query = $this->db->query("SELECT 
                                        mahasiswa.mahasiswa_npm AS mahasiswa_npm,
                                        mahasiswa.mahasiswa_nama AS mahasiswa_nama,
                                        prodi.prodi_id AS prodi_id,
                                        prodi.prodi_nama AS prodi_nama
                                        FROM mahasiswa 
                                        LEFT JOIN prodi ON prodi.prodi_id = mahasiswa.prodi_id
                                        WHERE   mahasiswa.mahasiswa_npm='$mahasiswa_npm' limit 1");
                                        foreach ($query->result() as $row){?>
                                        <input type="text" class="form-control input-sm" name="prodi_nama" value="<?php echo $row->prodi_nama; ?>" disabled /> 
                                         <?php } ?>
                                    </div>
                                <?php } ?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Angkatan</label>  
                                        <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id, 'submit();');?>  
                                    </div>
                              
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tanggal</label>
                                        <input type="date" class="form-control input-sm" id="pembayaran_tanggal" name="pembayaran_tanggal" placeholder="Masukan Tahun" required/> 
                                    </div>
                                <?php if ($semester_id == $semester_id && $tahun_id ==  $tahun_id) {?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Biaya</label>

                                        <?php $query = $this->db->query("SELECT * FROM angkatan WHERE semester_id='$semester_id' AND tahun_id='$tahun_id' limit 1");
                                        foreach ($query->result() as $row){?>
                                        <input type="number" class="form-control input-sm" id="txt1" name="angkatan_biaya" value="<?php echo $row->angkatan_biaya; ?>" disabled  onkeyup="sum();" /> 
                                         <?php } ?>
                                    </div>
                                <?php } ?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jumlah Pembayaran</label>
                                        <input type="number" class="form-control input-sm" id="txt2" name="pembayaran_jumlah" placeholder="Masukan Biaya"  onkeyup="sum();" /> 
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Sisa Pembayaran</label>
                                        <input type="number" class="form-control input-sm" id="txt3" name="pembayaran_sisa" placeholder="Masukan Sisa" required/> 
                                    </div>
                                  <!--   <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Keterangan</label>
                                        <textarea  class="form-control input-sm" name="pembayaran_keterangan"></textarea> 
                                    </div> -->
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/pembayaran'"/>
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
<script>

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.angkatan_biaya.value;
two = document.autoSumForm.pembayaran_jumlah.value;
document.autoSumForm.pembayaran_sisa.value = (one * 1) - (two * 1);}
function stopCalc(){
clearInterval(interval);}
</script>
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">pembayaran</h4> </div>
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
                            <h3 class="box-title">Edit pembayaran</h3>
                                <div class="table-responsive">
                                <form action="<?php echo site_url();?>home/pembayaran/edit/<?php echo $pembayaran_id;?>" method="post" id="exampleStandardForm" autocomplete="off" onSubmit="return validate()" name='autoSumForm'>
                                <input type="hidden" name="pembayaran_id" value="<?php echo $pembayaran_id;?>" />
                            <div class="form-group form-material">
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">NPM</label>
                                        <input type="text" class="form-control input-sm" id="mahasiswa_npm" name="mahasiswa_npm" value="<?php echo $mahasiswa_npm; ?>" placeholder="NPM" required/> 
                                    </div>
                                    
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Semester</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM semester", 'semester_id', 'semester_id', 'semester_nama', $semester_id, 'submit();');?>  
                                    </div>
                                <?php if ($mahasiswa_npm == $mahasiswa_npm ) {?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama Mahasiswa</label>

                                        <?php $query = $this->db->query("SELECT * FROM mahasiswa WHERE mahasiswa_npm='$mahasiswa_npm' limit 1");
                                        foreach ($query->result() as $row){?>
                                        <input type="text" class="form-control input-sm" name="mahasiswa_nama" value="<?php echo $row->mahasiswa_nama; ?>" disabled /> 
                                         <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if ($mahasiswa_npm == $mahasiswa_npm ) {?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Prodi</label>
                                        <?php $query = $this->db->query("SELECT 
                                        mahasiswa.mahasiswa_npm AS mahasiswa_npm,
                                        mahasiswa.mahasiswa_nama AS mahasiswa_nama,
                                        prodi.prodi_id AS prodi_id,
                                        prodi.prodi_nama AS prodi_nama
                                        FROM mahasiswa 
                                        LEFT JOIN prodi ON prodi.prodi_id = mahasiswa.prodi_id
                                        WHERE   mahasiswa.mahasiswa_npm='$mahasiswa_npm' limit 1");
                                        foreach ($query->result() as $row){?>
                                        <input type="text" class="form-control input-sm" name="prodi_nama" value="<?php echo $row->prodi_nama; ?>" disabled /> 
                                         <?php } ?>
                                    </div>
                                <?php } ?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Angkatan</label>  
                                        <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id, 'submit();');?>  
                                    </div>
                              
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tanggal</label>
                                        <input type="date" class="form-control input-sm" id="pembayaran_tanggal" name="pembayaran_tanggal" placeholder="Masukan Tahun" required/> 
                                    </div>
                                <?php if ($semester_id == $semester_id && $tahun_id ==  $tahun_id) {?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Biaya</label>

                                        <?php $query = $this->db->query("SELECT * FROM angkatan WHERE semester_id='$semester_id'");
                                        foreach ($query->result() as $row){ ?>
                                        <input type="text" class="form-control input-sm" readonly="" name="angkatan_biaya" value="<?php echo $row->angkatan_biaya; ?>"  onFocus="startCalc();" onBlur="stopCalc();" /> 
                                         <?php } ?>
                                    </div>
                                <?php } ?>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jumlah Pemabayaran</label>
                                        <input type="text" class="form-control input-sm" name="pembayaran_jumlah"  onFocus="startCalc();" onBlur="stopCalc();"/> 
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Sisa Pemabayaran</label><input
                                         type="text" class="form-control input-sm" readonly="" name="pembayaran_sisa" onchange='tryNumberFormat(this.form.thirdBox);'>
                                    </div>
                                   <!--  <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Keterangan</label>
                                        <textarea  class="form-control input-sm" name="pembayaran_keterangan" ><?php echo $pembayaran_keterangan; ?></textarea> 
                                    </div>
 -->                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>home/pembayaran'"/>
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