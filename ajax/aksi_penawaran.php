<?php
	include "../library/conn.php";
	//if(!empty($_POST['nm_proyek'])){
		$nama = $_POST['nm_proyek'];
		
		$data_hdr = mysql_query("SELECT * FROM pp_hdr WHERE nama_proyek LIKE '$nama'");
		$hasil = mysql_fetch_array($data_hdr);
		$kd_proyek = $hasil['kd_proyek'];
		$kd = '';
		
		$alamat = $_POST['alamat_proyek'];
		$cp = $_POST['contact_person'];
		$sales = $_POST['nama_sales'];
		$tanggal = $_POST['tanggal'];		
		
		mysql_query("INSERT INTO penawaran VALUES ('', '$kd_proyek', '$kd', '$nama', '$alamat', '$cp', '$sales', '$tanggal')");
		
		$q_penawaran = mysql_query("SELECT * FROM penawaran ORDER BY id_penawaran DESC");
		$hasil_penawaran = mysql_fetch_array($q_penawaran);
		$id_penawaran = $hasil_penawaran['id_penawaran'];
		
		$data_dtl = mysql_query("SELECT * FROM pp_dtl WHERE kd_proyek LIKE '$kd_proyek'");
		while ($hasil = mysql_fetch_array($data_dtl)){
			$model_item = $hasil['model_item'];
			$nama_item = $hasil['nama_item'];
			$qty = $hasil['qty'];
			mysql_query("INSERT INTO penawaran_dtl VALUES ('', '$id_penawaran', '$model_item', '$nama_item', '$qty')");
		}
	//}
?>