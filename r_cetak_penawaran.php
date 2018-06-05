<?php
include "library/conn.php";
date_default_timezone_set("Asia/Jakarta");

// Define relative path from this script to mPDF
$nama_dokumen='FORM PENAWARAN PUTERAKO - ' . date('d-m-Y') . ' - ' . date('h.i.s'); //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P','','','15','15','28','18'); // Create new mPDF Document
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

.garis_tepi1 { width:auto; height:auto; padding: 3px;
	 
     border: 1px solid;
}

div.static {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 600px;
  /*border: 3px solid #543535;*/
}

</style>
<?php 
$kode = $_GET['kode'];
$token = $_GET['token'];
$q_header = mysql_query("SELECT * FROM penawaran_hdr WHERE kode_penawaran='".$kode."' AND token='".$token."'"); 
$header = '<img src="images/fotter.jpeg" width="293" height="53">'; 
?>
	<?php
	if(mysql_num_rows($q_header) > 0) { 
	while($data = mysql_fetch_array($q_header)) { 
	$kepada = $data['kepada'];
	$up = $data['Up'];
	$tanggal = $data['tanggal'];
	$tgl = date('d-m-Y', strtotime($tanggal)); 
	$perihal = $data['perihal'];
	$note = $data['note'];
	$hormat_kami = $data['hormat_kami'];
	$hormat = $data['dengan_hormat']; } }
	?>
	
<div style="font-size:14px">
<br>Surabaya, <?=$tgl?>
<br>
<br>Kepada Yth :
<br><?=$kepada?>
<br>UP : <?=$up?>
<br>
<br>Perihal : <?=$perihal?>
<br>No : <?=$kode?>
<br>
<br>Dengan Hormat,
<br>
<br><?=$hormat?>
<br>dengan perincian sebagai berikut :

</div>
<?php $q_judul1 = mysql_query("SELECT DISTINCT(jenis_barang) FROM penawaran_dtl WHERE kode_penawaran='".$kode."' AND token='".$token."' AND urutan_jb='1'  "); 

while($row1 = mysql_fetch_array($q_judul1)){ $judul1 = $row1['jenis_barang'];}

?> 
<p style="text-align:left"><i><b>I. <?=$judul1?></b></i></p>
<div id="tabel1">
<table id="example1" class="table table-bordered" width="100%" border="1" style="font-size:12px">
										<thead>
											<tr>
                                                <th width="5%">No</th>
												<th width="15%">Model</th>
												<th width="33%">Description</th>
												<th width="7%" style="text-align:right">Qty</th>
                                                <th width="10%">Satuan</th>
                                                <th width="15%" style="text-align:right">Price rupiah</th>
                                                <th width="15%" style="text-align:right">Total rupiah</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$q_detail1 = mysql_query("SELECT * FROM penawaran_dtl WHERE kode_penawaran='".$kode."' AND token='".$token."' AND urutan_jb='1'"); 
												$n=1; $totalnet=0; if(mysql_num_rows($q_detail1) > 0) { 
												while($data1 = mysql_fetch_array($q_detail1)) { 
												?>
										        
											<tr>
                                                <td><?php echo $n++ ?></td>
												<td><?php echo $data1['model_item'];?></td>
												<td><?php echo $data1['description_item'];?></td>
												<td style="text-align:right"><?php echo number_format($data1['qty']);?></td>
                                                <td><?php echo $data1['satuan'];?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['total']);?></td>
											</tr>
											<?php
												$totalnet += $data1['total'];} }
											?>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><b>Total Nett Rp</b> </td>
												<td style="text-align:right"><?php echo number_format($totalnet);?></td>
											</tr>
										</tbody>
									</table>
</div> 
<?php $q_judul2 = mysql_query("SELECT DISTINCT(jenis_barang) FROM penawaran_dtl WHERE kode_penawaran='".$kode."' AND token='".$token."' AND urutan_jb='2'  "); 

while($row2 = mysql_fetch_array($q_judul2)){ $judul2 = $row2['jenis_barang'];}

?>                                    
<p style="text-align:left"><i><b>II. <?=$judul2?></b></i></p>
<div id="tabel2">
<table id="example1" class="table table-bordered" width="100%" border="1" style="font-size:12px">
										<thead>
											<tr>
                                                <th width="5%">No</th>
<!--												<th>Model</th> -->
												<th width="48%">Description</th>
												<th width="7%" style="text-align:right">Qty</th>
                                                <th width="10%">Satuan</th>
                                                <th width="15%" style="text-align:right">Price rupiah</th>
                                                <th width="15%" style="text-align:right">Total rupiah</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$q_detail1 = mysql_query("SELECT * FROM penawaran_dtl WHERE kode_penawaran='".$kode."' AND token='".$token."' AND urutan_jb='2'"); 
												$n=1; $totalnet=0; if(mysql_num_rows($q_detail1) > 0) { 
												while($data1 = mysql_fetch_array($q_detail1)) { 
												?>
										        
											<tr>
                                                <td><?php echo $n++ ?></td>
<!--												<td><?php echo $data1['model_item'];?></td> -->
												<td><?php echo $data1['description_item'];?></td>
												<td style="text-align:right"><?php echo number_format($data1['qty']);?></td>
                                                <td><?php echo $data1['satuan'];?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['total']);?></td>
											</tr>
											<?php
												$totalnet += $data1['total'];} }
											?>
                                            <tr>
                                                <td colspan="5" style="text-align:right"><b>Total Nett Rp</b> </td>
												<td style="text-align:right"><?php echo number_format($totalnet);?></td>
											</tr>
										</tbody>
  </table>
</div>
<?php $q_judul3 = mysql_query("SELECT DISTINCT(jenis_barang) FROM penawaran_dtl WHERE kode_penawaran='".$kode."' AND token='".$token."' AND urutan_jb='3'  "); 

while($row3 = mysql_fetch_array($q_judul3)){ $judul3 = $row3['jenis_barang'];}

?>                 
<p style="text-align:left"><i><b>III. <?=$judul3?></b></i></p>
<div id="tabel3">
<table id="example1" class="table table-bordered" width="100%" border="1" style="font-size:12px">
										<thead>
											<tr>
                                                <th width="5%">No</th>
<!--												<th>Model</th> -->
												<th width="48%">Description</th>
												<th width="7%" style="text-align:right">Qty</th>
                                                <th width="10%">Satuan</th>
                                                <th width="15%" style="text-align:right">Price rupiah</th>
                                                <th width="15%" style="text-align:right">Total rupiah</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$q_detail1 = mysql_query("SELECT * FROM penawaran_dtl WHERE kode_penawaran='".$kode."' AND token='".$token."' AND urutan_jb='3'"); 
												$n=1; $totalnet=0; if(mysql_num_rows($q_detail1) > 0) { 
												while($data1 = mysql_fetch_array($q_detail1)) { 
												?>
										        
											<tr>
                                                <td><?php echo $n++ ?></td>
<!--												<td><?php echo $data1['model_item'];?></td> -->
												<td><?php echo $data1['description_item'];?></td>
												<td style="text-align:right"><?php echo number_format($data1['qty']);?></td>
                                                <td><?php echo $data1['satuan'];?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['total']);?></td>
											</tr>
											<?php
												$totalnet += $data1['total'];} }
											?>
                                            <tr>
                                                <td colspan="5" style="text-align:right"><b>Total Nett Rp</b> </td>
												<td style="text-align:right"><?php echo number_format($totalnet);?></td>
											</tr>
										</tbody>
  </table>
</div>
<p style="text-align:left"></p>
<div id="tabel4">
<table id="example1" class="table table-bordered" width="100%" border="0" style="font-size:12px">
										
										<tbody>
											<?php
												$q_grand = mysql_query("SELECT * FROM penawaran_hdr WHERE kode_penawaran='".$kode."' AND token='".$token."'"); 
												$n=1; if(mysql_num_rows($q_grand) > 0) { 
												while($data1 = mysql_fetch_array($q_grand)) { 
												?>
										        
											<tr>
                                                <td colspan="6" style="text-align:right">Sub Total Rp</td>
                                                <td width="15%" style="text-align:right"><?php echo number_format($data1['sub_total']);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right">Diskon Rp</td>
                                                <td style="text-align:right"><?php echo number_format($data1['diskon_hdr']);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right">PPn Rp</td>
                                                <td style="text-align:right"><?php echo number_format($data1['ppn']);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right">Grandtotal Rp</td>
                                                <td style="text-align:right"><?php echo number_format($data1['grand_total']);?></td>
											</tr>
											<?php
												} }
											?>
										</tbody>
  </table>
</div>


	<div>
    <br />Keterangan :
    <p style="text-align:left; font-size:14px"><?php echo nl2br($note);?>
    </div>
    
    <div>
    <p style="text-align:left; font-size:14px">Demikian Penawaran ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih <br />
    
    Hormat Kami, <p><p><p><p>
    
    <?=$hormat_kami;?><p>
    </div> 
    
<!--    <div class="static">
  	Demikian Penawaran ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih <br />
  
  	Hormat Kami, <br><br><br><br> 
    
    Santoso Direjo
	</div> -->

                                    
<!-- <p align="right" style="font-size:12px">Dicetak Pada : <?=$now?> <p> -->
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->setHTMLHeader($header);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>