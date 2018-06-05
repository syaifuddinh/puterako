<?php
include "library/conn.php";
date_default_timezone_set("Asia/Jakarta");

// Define relative path from this script to mPDF
$nama_dokumen='FORM SURVEY PUTERAKO - ' . date('d-m-Y') . ' - ' . date('h.i.s'); //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document
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

table, td{
    border: 1px solid black;
	padding: 3px;
    text-align: left;
}

th{ 
	padding: 3px;
	text-align: left;
	background:#CCC; 
} 
</style>
<?php 
$kode = $_GET['kode'];
?>
<p><h3>PT. PUTERAKO INTI BUANA</h3><hr style="border:double"></p>
<p><h4 style="text-align:center">MATRIX FORM SURVEY</h4></p>
<table id="example1" class="table table-bordered" width="100%" border="1">
										<thead>
											<tr>
                                                <th width="5%">No</th>
												<th>MA & MQ</th>
                                                <?php
												$q_lokasi = mysql_query("SELECT GROUP_CONCAT(a.lokasi ORDER BY a.id_fs_dtl ASC SEPARATOR ',') AS lokasi FROM fs_dtl a INNER JOIN fs_hdr b ON a.kd_proyek=b.kd_proyek AND a.token=b.token  WHERE id_fs_hdr= '".$kode."' ORDER BY lokasi ASC"); 
												
												while($data = mysql_fetch_array($q_lokasi)){
												$lokasi = $data['lokasi'];	
													$loka = explode(",", $lokasi);
														foreach($loka as $lok) {
															$location = trim($lok);
															//UNTUK HEADER LOKASI YANG DINAMIS
															echo "<th>$location</th>";
														}
												}
												?>												
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$q_print = mysql_query("SELECT kode_item,qty FROM fs_dtl a INNER JOIN fs_hdr b ON a.kd_proyek=b.kd_proyek AND a.token=b.token  WHERE id_fs_hdr= '".$kode."'");
												$n=1; if(mysql_num_rows($q_print) > 0) { 
												while($data = mysql_fetch_array($q_print)) { 
												?> 
										        
											<tr>
                                            
                                                <td><?php echo $n++ ?></td>
												<td><?php echo $data['kode_item'];?></td>
                                                <?php
                                                $q_qty = mysql_query("SELECT GROUP_CONCAT(a.qty ORDER BY a.id_fs_dtl ASC SEPARATOR ',') AS qty FROM fs_dtl a INNER JOIN fs_hdr b ON a.kd_proyek=b.kd_proyek AND a.token=b.token  WHERE id_fs_hdr= '".$kode."' ORDER BY lokasi ASC"); 
													while($data = mysql_fetch_array($q_qty)){
													$qty = $data['qty'];	
														$qt = explode(",", $qty);
															foreach($qt as $isi) {
																$jumlah = trim($isi);
																//UNTUK QTY YANG DINAMIS
																echo "<td>$jumlah</td>";
															}
													}
												?>
												<td></td>  
											</tr>
											<?php
												} }
											?>
										</tbody>
									</table>
                                    
<p align="right">Dicetak Pada : <?=$now?> <p>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>