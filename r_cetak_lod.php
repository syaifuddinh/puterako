<?php
include "library/conn.php";
date_default_timezone_set("Asia/Jakarta");

// Define relative path from this script to mPDF
$nama_dokumen='FORM LOD - ' . date('d-m-Y') . ' - ' . date('h.i.s'); //Beri nama file PDF hasil.
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
$q_header = mysql_query("SELECT * FROM lod_hdr WHERE id='".$kode."'"); ?>
<p></p>
<table width="100%">
	<?php
	if(mysql_num_rows($q_header) > 0) { 
	while($data = mysql_fetch_array($q_header)) { 
	$no_lod = $data['no_lod'];
	$company = $data['company'];
	$no_proyek = $data['no_proyek'];
	$address = $data['address'];
	$no_so = $data['no_so'];
	$start = $data['timer_start'];
	$finish = $data['timer_finnis'];
	$lembur = $data['timer_lembur'];
	$taks = $data['task'];
	$note = $data['note'];
	/*$diskon = $data['diskon'];
	$dpp = $data['dpp'];
	$ppn = $data['ppn'];
	*/
	?>
	<tr>
   	  <td colspan="2" rowspan="4"><img src="images/fotter.jpeg" width="545" height="99"></td>
      <td style="text-align:center; font-size:12px" colspan="2"><h2 style="text-align:center">Letter Of Duty</h2></td>
      
    </tr>
    <tr>

      <td width="10%" style="text-align:left; font-size:12px">No. LOD</td>
      <td width="23%" style="text-align:left"><?=$no_lod?></td>
    </tr>
    <tr>
      <td style="text-align:left; font-size:12px">Tanggal</td>
      	<?php $tgl_buat = date('d F Y', strtotime($data['tgl_buat'] )); ?>
      <td style="text-align:left; font-size:12px"><?=$tgl_buat?></td>
    </tr>
    <tr>
    	<td style="text-align:left; font-size:12px">Contact & No.</td>
        <td style="text-align:left; font-size:12px"></td>
    </tr>
    <tr>
    	<td width="12%" style="text-align:left; font-size:12px">Company</td>
        <td width="42%" style="text-align:left; font-size:12px"><?=$company?></td>
        <td style="text-align:left; font-size:12px">No. Project</td>
        <td style="text-align:left; font-size:12px"><?=$no_proyek?></td>
    </tr>
    <tr>
    	<td style="text-align:left; font-size:12px">Address</td>
        <td style="text-align:left; font-size:12px"><?=$address?></td>
        <td style="text-align:left; font-size:12px">No. SO</td>
        <td style="text-align:left; font-size:12px"><?=$no_so?></td>
    </tr>
    <tr>
    	<td style="text-align:left; font-size:12px">Task</td>
        <td style="text-align:center; font-size:14px" colspan="3"><input name="installation" type="checkbox" <?php if ($taks=='instalation') { echo 'checked="checked"';} ?>>
        Instalation 
            <input name="service" type="checkbox" value="0" <?php if ($taks=='service') { echo 'checked="checked"';} ?>>
            Service 
             <input name="training" type="checkbox" value="0" <?php if ($taks=='traning') { echo 'checked="checked"';} ?>> 
             Training <input name="demo" type="checkbox" value="0" <?php if ($taks=='demo') { echo 'checked="checked"';} ?>> 
             Demo <input name="survey" type="checkbox" value="0" <?php if ($taks=='survey') { echo 'checked="checked"';} ?>> 
              Survey 
              <input name="other" type="checkbox" value="0" <?php if ($taks=='other') { echo 'checked="checked"';} ?>> 
              Others</td>
    </tr>
    <tr>
    	<td width="12%" style="text-align:left; font-size:12px">Time</td>
        <td width="20%" style="text-align:left; font-size:12px">Start</td>
        <td style="text-align:left; font-size:12px">Finish</td>
        <td style="text-align:left; font-size:12px">Lembur</td>
    </tr>
    <tr>
    	<td width="12%" style="text-align:left; font-size:12px"></td>
        <td width="20%" style="text-align:left; font-size:12px"><?=$start?></td>
        <td style="text-align:left; font-size:12px"><?=$finish?></td>
        <td style="text-align:left; font-size:12px"><?=$lembur?></td>
    </tr>
    <tr>
    	<td width="12%" style="text-align:left; font-size:12px">Status</td>
        <td colspan="3" style="font-size:14px"><input name="finish" type="checkbox" value=""> Finish 
            			<input name="progress" type="checkbox" value=""> Progress 
             			<input name="cancel" type="checkbox" value=""> Cancel
        </td>
    </tr>
    <tr>
    	<td width="12%" height="77" style="text-align:left; font-size:12px">Note</td>
        <td colspan="3" width="42%" style="text-align:left; font-size:12px; vertical-align:top"><?=$note?></td>
    </tr>
    <tr>
    	<td width="12%" style="text-align:left; font-size:12px">Product</td>
        <td width="42%" style="text-align:left; font-size:12px"></td>
        <td style="text-align:left; font-size:12px">Customer valuation indicator</td>
        <td style="text-align:left; font-size:14px"><input name="good" type="checkbox" value=""> Good 
            			<input name="fair" type="checkbox" value=""> Fair 
             			<input name="poor" type="checkbox" value=""> Poor</td>
    </tr>
    <?php
    	}	}
	?>
</table>
<div>
<table align="center" width="100%" border="0" style="font-size:12px">
										
										<tbody>
											<tr>
                                            	<td width="20%" style="text-align:center">Customer</td>
                                                <td width="20%" style="text-align:center">Technical Support</td>
                                                <td width="20%" style="text-align:center">Technical Manager / Coordinator</td>
                                                <td width="20%" style="text-align:center">PIC Project</td>
                                                <td width="20%" style="text-align:center">Admin Teknik</td>
											</tr>
                                      		<tr>
                                            	<td height="70" style="text-align:center"></td>
                                				<td style="text-align:center"></td>
                                                <td style="text-align:right"></td>
                                                <td style="text-align:right"></td>
                                                <td style="text-align:right"></td>
											</tr>
                                            <tr>
                                            	<td style="text-align:center">&nbsp;</td>
                                				<td style="text-align:center">&nbsp;</td>
                                                <td style="text-align:center">&nbsp;</td>
                                                <td style="text-align:center">&nbsp;</td>
                                                <td style="text-align:center">&nbsp;</td>
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