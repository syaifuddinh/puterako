<?php
	session_start();
	require('../library/conn.php');
	require('../library/helper.php');
	date_default_timezone_set("Asia/Jakarta");
	if( isset( $_REQUEST['keyword'] ) and $_REQUEST['keyword'] != "" )
	{

		$keyword		=		$_REQUEST['keyword'];
		$query			=		"SELECT kd_jasa,deskripsi,total FROM fjasa_hdr WHERE status='0' AND kd_jasa LIKE '%$keyword%' or deskripsi LIKE '%$keyword%' limit 10";
		$result			=		mysql_query($query);
		$html			=		"";
		if(mysql_num_rows($result) > 0) {
			while ( $row	=		mysql_fetch_array($result) ) 
			{
				$html	.='<li data="'.$row['kd_jasa'].'" data2="'.$row['deskripsi'].'" data3="'.$row['total'].'" id="xxxxxx">
							<span  class="left">'.$row['kd_jasa'].'</span> 
							<span  class="right">'.$row['deskripsi'].' </span> 
							</li>';
			}
		} else { $html = '<li data="">Data not found.</li>';}
		
		echo $html;
	}
?>	