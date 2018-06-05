<?php
$q_pp = mysql_query("select * from permintaan_penawaran order by id_pp");

//simpan permintaan penawaran
if(isset($_POST['simpan'])) {
	$nama_perusahaan=mres($_POST['nama_perusahaan']);
	$alamat=mres($_POST['alamat']);
	$up=mres($_POST['up']);
	$jabatan=mres($_POST['jabatan']);
	$contact_person=mres($_POST['contact_person']);
	$nama_sales=mres($_POST['nama_sales']);
	$tanggal=mres($_POST['tanggal']);
	$diskripsi=mres($_POST['diskripsi']);
    $tgl_buat= date("Y-m-d",strtotime($tanggal));
	$status_survey=(@$_POST['status_survey'] == 1) ? 1 : 0;
	$kategori = mres($_POST['kategori']);
   	// Membuat no urut otomatis
	$kode_pp = buat_no_permintaan($kategori, $tanggal);
	
	define('LOG','log.txt');
			function write_log($log){  
			 $time = @date('[Y-d-m:H:i:s]');
			 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
			 $fp = @fopen(LOG, 'a');
			 $write = @fwrite($fp, $op);
			 @fclose($fp);
			}
    $user_posting = $_SESSION['app_user'];

		
	$sql = "insert into permintaan_penawaran value ('','$kode_pp', 0,'$nama_perusahaan','$alamat','$up','$jabatan', '$contact_person', '$nama_sales', '$tgl_buat', '$diskripsi','1','0','$status_survey','','0', '$kategori')";
	
	$query = mysql_query ($sql) ;
	
	if ($query) {
		write_log("Insert pp User '".$user_posting ."' Sukses");
	    echo("<script>location.href = '".base_url()."?page=pp';</script>");
	} else { 
	    write_log("Insert pp User '".$user_posting ."' Gagal");
		$response = "99||Simpan data gagal. ".mysql_error(); 
	}
}

// Ini untuk update ke database
if(isset($_GET['action']) and $_GET['action'] == "edit") {
	$kode = mres($_GET['kode']);
	
	$q_edit = mysql_query("select * from permintaan_penawaran where id_pp = '$kode'");
	
	if(isset($_POST['update'])) {
		$kode_pp=mysql_real_escape_string($_POST['kode_pp']);
		$nama_perusahaan=mysql_real_escape_string($_POST['nama_perusahaan']);
		$alamat=mysql_real_escape_string($_POST['alamat']);
		$up=mysql_real_escape_string($_POST['up']);
		$jabatan=mysql_real_escape_string($_POST['jabatan']);
		$contact_person=mysql_real_escape_string($_POST['contact_person']);
		$nama_sales=mysql_real_escape_string($_POST['nama_sales']);
		$tanggal=mysql_real_escape_string($_POST['tanggal']);
		$diskripsi=mysql_real_escape_string($_POST['diskripsi']);
		$kategori=mysql_real_escape_string($_POST['kategori']);
		$status_survey=(@$_POST['status_survey'] == 1) ? 1 : 0;
		$tgl_buat= date("Y-m-d",strtotime($tanggal));
		// membuat ref / kode referensi
		$cmd = "SELECT COUNT(id_pp) AS kode_ref FROM permintaan_penawaran WHERE kode_pp='$kode_pp'";
		$go = mysql_query($cmd);
		$resp = mysql_fetch_array($go);
		$ref = $resp['kode_ref'];

		define('LOG','log.txt');
			function write_log($log){  
			 $time = @date('[Y-d-m:H:i:s]');
			 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
			 $fp = @fopen(LOG, 'a');
			 $write = @fwrite($fp, $op);
			 @fclose($fp);
			}
        $user_posting = $_SESSION['app_user'];

		
			
		$sql = "insert into permintaan_penawaran value ('','$kode_pp', $ref,'$nama_perusahaan','$alamat','$up','$jabatan', '$contact_person', '$nama_sales', '$tgl_buat', '$diskripsi','1','0','$status_survey','','0', '$kategori')";

		$query = mysql_query ($sql) ;
		
		if ($query) {
			write_log("Update pp User '".$user_posting ."' Sukses");
			echo("<script>location.href = '".base_url()."?page=pp';</script>");
		} else {
			write_log("Update pp User '".$user_posting ."' Gagal");
			$response = "99||Update data gagal. ".mysql_error();
		}
	}
}

if(isset($_GET['action']) and $_GET['action'] == "status") {
	$kode = mres($_GET['kode']);
	$alasan_batal = mres ($_POST['alasan_batal']);
	
	define('LOG','log.txt');
			function write_log($log){  
			 $time = @date('[Y-d-m:H:i:s]');
			 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
			 $fp = @fopen(LOG, 'a');
			 $write = @fwrite($fp, $op);
			 @fclose($fp);
			}
    $user_posting = $_SESSION['app_user'];

	
	$sql = "update pp_hdr set status = '1', alasan_batal = '$alasan_batal' where kd_proyek = '".$kode."'";
		$query = mysql_query ($sql) ;
		
		if ($query) {
			write_log("Mengaktifkan PP User '".$user_posting ."' Sukses");
			echo("<script>location.href = '".base_url()."?page=pp';</script>");
		} else {
			write_log("Mengaktifkan PP User '".$user_posting ."' Gagal");
			$response = "99||Update data gagal. ".mysql_error();
		}
	
	
}

if(isset($_POST['batal'])) {
	$kode = mres($_POST['batal_pp']);
	$alasan_batal = mres ($_POST['alasan_batal']);
	
	define('LOG','log.txt');
			function write_log($log){  
			 $time = @date('[Y-d-m:H:i:s]');
			 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
			 $fp = @fopen(LOG, 'a');
			 $write = @fwrite($fp, $op);
			 @fclose($fp);
			}
    $user_posting = $_SESSION['app_user'];

	
	$sql = "update permintaan_penawaran set status = '2', alasan_batal = '$alasan_batal' where kode_pp = '".$kode."'";
		$query = mysql_query ($sql) ;
		
		if ($query) {
			write_log("membatalkan PP User '".$user_posting ."' Sukses");
			echo("<script>location.href = '".base_url()."?page=pp';</script>");
		} else {
			write_log("membatalkan PP User '".$user_posting ."' Gagal");
			$response = "99||Update data gagal. ".mysql_error();
		}
	
	
}

// TRACK 
if(isset($_GET['action']) and $_GET['action'] == "track") {
	$id_pp = ($_GET['kode']);
	
	$q_pp_prev = mysql_query("SELECT id_pp FROM permintaan_penawaran WHERE id_pp = (select max(id_pp) FROM permintaan_penawaran WHERE id_pp < ".$id_pp.")");
	
	$q_pp_next = mysql_query("SELECT id_pp FROM permintaan_penawaran WHERE id_pp = (select min(id_pp) FROM permintaan_penawaran WHERE id_pp > ".$id_pp.")");
	
	$q_pp = mysql_query("SELECT * FROM permintaan_penawaran WHERE id_pp = '".$id_pp."'");
	
}


?>