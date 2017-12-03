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
     <table width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>TANGGAL</th> 
                                            <th>NAMA MAHASISWA</th>   
                                            <th>SEMESTER</th>     
                                            <th><p align="right">JUMLAH PEMBAYARAN</p></th> 
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
                                     WHERE pembayaran.semester_id ='$pembayaran->semester_id'");
                                    foreach ($query->result() as $row){
                                    error_reporting(0);
                                     $total += $row->pembayaran_jumlah;
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo dateIndo($row->pembayaran_tanggal); ?></td>
                                            <td><?php echo $row->mahasiswa_nama; ?></td>
                                            <td><?php echo $row->semester_nama; ?></td>
                                            <td><p align="right"><?php echo $row->pembayaran_jumlah; ?></p></td>
                                        </tr>
                                     <?php $no++; } ?>
                                    <tr>
                                        <td colspan="4"><b>TOTAL</b></td>
                                        <td><p align="right"><strong>Rp.<?php echo number_format($total,0,',','.'); ?></strong></p></td>
                                    </tr>
                                    </tbody>
                                </table>