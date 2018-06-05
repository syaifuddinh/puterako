<?php
$q_mp = mysql_query("select kode_penawaran from penawaran_hdr where status = '0' order by id_penawaran");
$q_so = mysql_query("select * from so_hdr where status = '0' order by id_so_hdr");



// Ini untuk update ke database
if(isset($_GET['action']) and $_GET['action'] == "edit") {
	$kode = mres($_GET['kode']);
	
	$q_edit = mysql_query("select * from permintaan_penawaran where id_pp = '$kode'");
	
	if(isset($_POST['update'])) {
		$nama_perusahaan=mysql_real_escape_string($_POST['nama_perusahaan']);
		$alamat=mysql_real_escape_string($_POST['alamat']);
		$up=mysql_real_escape_string($_POST['up']);
		$contact_person=mysql_real_escape_string($_POST['contact_person']);
		$nama_sales=mysql_real_escape_string($_POST['nama_sales']);
		$tanggal=mysql_real_escape_string($_POST['tanggal']);
		$diskripsi=mysql_real_escape_string($_POST['diskripsi']);
		
		define('LOG','log.txt');
			function write_log($log){  
			 $time = @date('[Y-d-m:H:i:s]');
			 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
			 $fp = @fopen(LOG, 'a');
			 $write = @fwrite($fp, $op);
			 @fclose($fp);
			}
        $user_posting = $_SESSION['app_user'];

		
			
		$sql = "update permintaan_penawaran set nama_perusahaan = '$nama_perusahaan',alamat = '$alamat', up = '$up', contact_person = '$contact_person', nama_sales = '$nama_sales', tanggal = '$tanggal', diskripsi = '$diskripsi'  where id_pp = '".$kode."'";
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

// TRACK 
if(isset($_GET['action']) and $_GET['action'] == "track") {
	$id_penawaran = ($_GET['kode']);
	
	$q_penawaran_prev = mysql_query("SELECT id_penawaran FROM penawaran_hdr WHERE id_penawaran = (select max(id_penawaran) FROM penawaran_hdr WHERE id_penawaran < ".$id_penawaran.")");
	
	$q_penawaran_next = mysql_query("SELECT id_penawaran FROM penawaran_hdr WHERE id_penawaran = (select min(id_penawaran) FROM penawaran_hdr WHERE id_penawaran > ".$id_penawaran.")");
	
	$penawaran_hdr = mysql_query("SELECT * FROM penawaran_hdr WHERE id_penawaran = '".$id_penawaran."'");
	$infrastructure = mysql_query("SELECT dtl.*,hdr.id_penawaran FROM penawaran_hdr hdr INNER JOIN penawaran_dtl dtl on hdr.kode_penawaran=dtl.kode_penawaran where dtl.jenis_barang = 'infrastructure' and hdr.id_penawaran = '".$id_penawaran."'");
	$material = mysql_query("SELECT dtl.*,hdr.id_penawaran FROM penawaran_hdr hdr INNER JOIN penawaran_dtl dtl on hdr.kode_penawaran=dtl.kode_penawaran where dtl.jenis_barang = 'material' and hdr.id_penawaran = '".$id_penawaran."'");
	$jasa = mysql_query("SELECT dtl.*,hdr.id_penawaran FROM penawaran_hdr hdr INNER JOIN penawaran_dtl dtl on hdr.kode_penawaran=dtl.kode_penawaran where dtl.jenis_barang = 'jasa' and hdr.id_penawaran = '".$id_penawaran."'");
	
}


?>