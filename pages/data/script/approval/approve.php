<?php
session_start();
include "../../../../library/conn.php";
include "../../../../library/helper.php";
 
if($_POST) {
	$id_user = $_SESSION['app_id'];
	$id_penawaran = $_POST['id'];
	$update_cmd = 'UPDATE penawaran_hdr SET status_app = 1, user_approved_1 = ' . $id_user . ' WHERE id_penawaran = ' . $id_penawaran;
	$update = mysql_query($update_cmd);

	if(!$update) 
		die("Error query" . mysql_error());
	else {
		$nav = base_url() . '?page=approval/index';
		redirect($nav);
	}
}