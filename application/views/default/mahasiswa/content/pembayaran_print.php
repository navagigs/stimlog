  <body onload="javascript:window.print()">
    <style type="text/css">
.table {
    font-size: 12px;
    border-collapse: collapse;
    width: 100%;
}

.table, .table th, .table td {
    padding: 4px;
    border: 1px solid black;
}
.tb {
    border: 1px solid #ff;
}
</style>
<table width="100%" >
    <tr>
        <th><img src="<?php echo base_url();?>templates/default/admin/plugins/images/logo-pos.png" width="80"></th>
        <th><p align="center">BUKTI PEMBAYARAN SPP</p>
</th>
    </tr>
</table>
 <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>TANGGAL</th> 
                                            <th>NAMA MAHASISWA</th>   
                                            <th>SEMESTER</th>     
                                            <th>JUMLAH PEMBAYARAN</th>   
                                            <th>SISA PEMBAYARAN</th>  
                                        </tr>
                                    </thead>
                                    <tbody>

                                       <?php 
                                        // $pembayaran_id = $this->input->post('pembayaran_id');
                                          $no=1;
                                    $query = $this->db->query("SELECT 
                                        pembayaran.pembayaran_id AS pembayaran_id,
                                        pembayaran.pembayaran_tanggal AS pembayaran_tanggal,
                                        pembayaran.pembayaran_jumlah AS pembayaran_jumlah,
                                        pembayaran.pembayaran_sisa AS pembayaran_sisa,
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
                                     WHERE pembayaran.mahasiswa_npm ='$mahasiswa->mahasiswa_npm' AND pembayaran.pembayaran_id = '$pembayaran->pembayaran_id' ORDER BY  pembayaran.pembayaran_id DESC");
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
                                      <?php
                                    $no++; }  ?>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <table width="100%">
                                    <tr>
                                        <td align="right">Bandung, .................... <?php echo date('Y'); ?></td>
                                    </tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr><td></td></tr>
                                    <tr>
                                        <td align="right"><b><u>Staff Bauk</u></b></td>
                                    </tr>
                                </table>