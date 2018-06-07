<?php

include "../../../../library/conn.php";
include "../../../../library/helper.php";

if($_POST) {
	$id_penawaran = $_POST['id'];
	$alasan_batal = mres($_POST['alasan_batal']);
	$update_cmd = 'UPDATE penawaran_hdr SET status_app = 2, alasan_batal= "' . $alasan_batal . '" WHERE id_penawaran = ' . $id_penawaran;
	$update = mysql_query($update_cmd);

	if(!$update) 
		die("Error query");
	else {
		$nav = base_url() . '?page=approval/index';
		redirect($nav);
	}
}