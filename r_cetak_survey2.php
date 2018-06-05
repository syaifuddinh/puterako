<?php
include "library/conn.php";
date_default_timezone_set("Asia/Jakarta");

// Define relative path from this script to mPDF
$nama_dokumen='FORM SURVEY PUTERAKO - ' . date('d-m-Y') . ' - ' . date('h.i.s'); //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-L','','','15','15','28','18'); // Create new mPDF Document
$now = date("F j, Y, g:i a"); //tanggal hari ini 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<style>
table {
    border-collapse: collapse;
}

.table1, tr, td{
    border: 1px solid black;
	padding: 3px;
    text-align: left;
}

th{ 
	padding: 3px;
	text-align: left;
	background:#CCC; 
} 

.tabel2, tr, td{ border:none;
}

table.kolom {
    border: 7px solid black;
}

.garis_tepi1 { width:auto; height:auto; padding: 3px;
	 
     border: 1px solid;
}
.garis_tepi2 {
     border: 4px solid #8AF76F;
}
</style>
<?php 
$kode = $_GET['kode'];
$q_lokasi_hdr = mysql_query("SELECT b.lokasi_hdr,kd_proyek,tanggal,surveyor,nama_proyek
FROM fs_hdr b
WHERE id_fs_hdr= '".$kode."' "); 
$q_keterangan_hdr = mysql_query("SELECT b.keterangan
FROM fs_hdr b
WHERE id_fs_hdr= '".$kode."' "); 
$q_print = mysql_query("SELECT DISTINCT a.*, c.satuan, c.note, b.lokasi_hdr 
FROM fs_dtl_lokasi a
INNER JOIN fs_hdr b ON b.kd_proyek=a.kd_proyek
INNER JOIN fs_dtl c ON c.kd_proyek=b.kd_proyek AND c.token=b.token AND c.token=a.token AND c.kd_proyek=a.kd_proyek AND c.kode_item=a.kode_item
WHERE b.id_fs_hdr= '".$kode."' ORDER BY c.kode_item ASC"); 

$header = '<img src="images/fotter.jpeg" width="293" height="53">'; ?>
<!--<hr style="border:double"></p>-->
<h4 style="text-align:center">MATRIX FORM SURVEY</h4>
<?php

while($row = mysql_fetch_array($q_lokasi_hdr)){ $tgl = date("d-m-Y", strtotime($row['tanggal'])); ?>

	
    	<table class="tabel2" width="50%">
        <tr><td width="20%">No PP </td> <td> : <?=$row['kd_proyek'];?></td>
        <tr><td>Tanggal </td> <td> : <?=$tgl;?></td>
        <tr><td>Surveyor </td> <td> : <?=$row['surveyor'];?></td>
        <tr><td>Nama Proyek </td> <td> : <?=$row['nama_proyek'];?></td>
        </table>
	
    
	<p><h4 style="text-align:center"><?=$row['lokasi_hdr'];?></h4></p>
<?php }  ?>

<table id="example1" class="table1" width="100%">
										<thead>
											<tr>
                                                <th width="5%">No</th>
												<th style="text-align:center">MAT & EQ</th>
												<?php
												$q_lokasi = mysql_query("SELECT GROUP_CONCAT(DISTINCT a.lokasi ORDER BY a.lokasi ASC SEPARATOR ',') AS lokasi FROM fs_dtl a INNER JOIN fs_hdr b ON a.kd_proyek=b.kd_proyek AND a.token=b.token  WHERE id_fs_hdr= '".$kode."' ORDER BY lokasi ASC, kode_item ASC"); 
												
												while($data1 = mysql_fetch_array($q_lokasi)){
												$lokasi = $data1['lokasi'];	
													$loka = explode(",", $lokasi);
														foreach($loka as $lok) {
															$location = trim($lok);
															//UNTUK HEADER LOKASI YANG DINAMIS
															echo "<th style=\"text-align:center\">$location</th>";
														}
												}
												?>
                                                <th style="text-align:center">Total</th>
                                                <th style="text-align:center" width="10%">Satuan</th>
<!--                                                <th style="text-align:center">Keterangan</th> -->
											</tr>
										</thead>
										<tbody>
											<?php
												$n=1; $totalqty=0; if(mysql_num_rows($q_print) > 0) { 
												while($data = mysql_fetch_array($q_print)) { 
												?>
										        
											<tr>
                                                <td><?php echo $n++ ?></td>
												<td><?php echo $data['kode_item'];?></td>
												<?php
												$total_qty = 0;
												$q_lokasi = mysql_query("SELECT GROUP_CONCAT(DISTINCT a.lokasi ORDER BY a.lokasi ASC SEPARATOR ',') AS lokasi FROM fs_dtl a INNER JOIN fs_hdr b ON a.kd_proyek=b.kd_proyek AND a.token=b.token  WHERE id_fs_hdr= '".$kode."' ORDER BY lokasi ASC, kode_item ASC"); 
												
												while($data1 = mysql_fetch_array($q_lokasi)){
												$lokasi = $data1['lokasi'];	
													$loka = explode(",", $lokasi);
														foreach($loka as $lok) {
															$location = trim($lok);
															//UNTUK HEADER LOKASI YANG DINAMIS
															echo "<td style=\"text-align:center\">".$data[$location]."</td>";
															$total_qty += $data[$location];
														}
												}
												?>
                                                <td style="text-align:center"><?php echo $total_qty;?></td>
                                                <td style="text-align:center"><?php echo $data['satuan'];?></td>
<!--                                                <td><?php echo $data['note'];?></td> -->
											</tr>
											<?php
												$totalqty += $data['qty'];} }
											?>
                                            <!-- <tr>
                                                <td colspan="3" style="text-align:right"><b>Total</b> : </td>
												<td style="text-align:right"><?php echo $totalqty;?></td>
											</tr> -->
										</tbody>
									</table>

<?php
while($row1 = mysql_fetch_array($q_keterangan_hdr)){ ?>
	<p><h4 style="text-align:left">Note : <?=$row1['keterangan'];?></h4></p>
<?php }  ?>                                    
<!-- <p align="right"><?=$now?> <p> -->
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->setHTMLHeader($header);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>