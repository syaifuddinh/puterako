<?php
include "library/conn.php";
date_default_timezone_set("Asia/Jakarta");

// Define relative path from this script to mPDF
$nama_dokumen='FORM SO - ' . date('d-m-Y') . ' - ' . date('h.i.s'); //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P'); // Create new mPDF Document
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
$q_header = mysql_query("SELECT * FROM so_hdr WHERE kode_so='".$kode."'"); ?>
<p></p>
<table width="100%">
	<?php
	if(mysql_num_rows($q_header) > 0) { 
	while($data = mysql_fetch_array($q_header)) { 
	$kepada_nama = $data['kepada_nama'];
	$kepada_alamat = $data['kepada_alamat'];
	$kepada_kota = $data['kepada_kota'];
	$kepada_telpon = $data['kepada_telpon'];
	$customer = $data['nama_custemer'];
	/*$diskon = $data['diskon'];
	$dpp = $data['dpp'];
	$ppn = $data['ppn'];
	*/
	?>
	<tr>
   	  <td width="69%" rowspan="4"><img src="images/fotter.jpeg" width="545" height="99"></td>
      <td width="20%" style="text-align:right; font-size:10px">No Form</td>
      <td width="11%" style="text-align:left; font-size:10px"><?=$data['kode_so']?></td>
    </tr>
    <tr>

      <td style="text-align:right; font-size:10px">Revisi</td>
      <td style="text-align:left"></td>
    </tr>
    <tr>
      <td style="text-align:right; font-size:10px">Tgl Berlaku</td>
      	<?php $tgl_berlaku = date('d F Y', strtotime($data['tgl_jht'] )); ?>
      <td style="text-align:left; font-size:10px"><?=$tgl_berlaku?></td>
    </tr>
    <tr>
    	<td style="text-align:center" colspan="2"><h4 style="text-align:center">SALES ORDER</h4></td>
    </tr>
    <?php
    	}	}
	?>
</table>
<hr style="border:double">
<div class="garis_tepi1">
<br><?=$kepada_nama?>
<br><?=$kepada_alamat?>
<br><?=$kepada_kota?>
<br><?=$kepada_telpon?>
</div>
<p>
<div id="tabel1">
<table id="example1" class="table table-bordered" width="100%" border="1" style="font-size:12px">
										<thead>
											<tr>
                                                <th width="5%">No</th>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th style="text-align:right">Qty</th>
                                                <th>Satuan</th>
                                                <th style="text-align:right">Harga</th>
                                                <th style="text-align:right">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$q_detail1 = mysql_query("SELECT * FROM so_dtl WHERE kode_so='".$kode."' "); 
												$n=1; $totalnet=0; if(mysql_num_rows($q_detail1) > 0) { 
												while($data1 = mysql_fetch_array($q_detail1)) { 
												?>
										        
											<tr>
                                                <td><?php echo $n++ ?></td>
												<td><?php echo $data1['kode_inventori'];?></td>
												<td><?php echo $data1['nama_inventori'];?></td>
												<td style="text-align:right"><?php echo number_format($data1['jumlah_so']);?></td>
                                                <td><?php echo $data1['satuan'];?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($data1['total_harga']);?></td>
											</tr>
											<?php
												$totalnet += $data1['total_harga'];} }
											?>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><b>Total Bruto</b> </td>
												<td style="text-align:right"><?php echo number_format($totalnet);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><b>Disc </b> </td>
												<td style="text-align:right"><?php //echo number_format($totalnet);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><b>DPP </b> </td>
												<td style="text-align:right"><?php //echo number_format($totalnet);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><b>PPn </b> </td>
												<td style="text-align:right"><?php //echo number_format($totalnet);?></td>
											</tr>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><b>Grandtotal </b> </td>
												<td style="text-align:right"><?php //echo number_format($totalnet);?></td>
											</tr>
										</tbody>
									</table>
</div>                                    
<p style="text-align:left"></p>
<div>
<table align="center" width="100%" border="0" style="font-size:12px">
										
										<tbody>
											<tr>
                                            	<td width="33%" style="text-align:center">Disetujui,</td>
                                                <td width="33%" style="text-align:center">Admin,</td>
                                                <td width="33%" style="text-align:center">Customer,</td>
											</tr>
                                      		<tr>
                                            	<td height="70" style="text-align:center"></td>
                                <td style="text-align:center"></td>
                                                <td style="text-align:right"></td>
											</tr>
                                            <tr>
                                            	<td style="text-align:center"></td>
                                				<td style="text-align:center"></td>
                                                <td style="text-align:center"><?=$customer?></td>
											</tr>
                                            
											
	</tbody>
  </table>
</div>


                                    
<p align="right" style="font-size:12px">Dicetak Pada : <?=$now?> <p>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>