<?php

function base_url(){
	return 'http://'.$_SERVER['HTTP_HOST'].'/'.'puterako/';
}

function redirect($url){
	echo "<meta http-equiv='refresh' content='0; url=".$url."' />";
}

function mres($data){
	return mysql_real_escape_string($data);
}

# Fungsi untuk membuat kode automatis #bulan dan tahun
function set_id($id, $tabel, $kddepan, $date = "")
{
	if($date == "") { $date = date('Y-m-d');}
	$q = mysql_query("select $id as id from $tabel where left($id, 6) like '".$kddepan.date('ym', strtotime($date))."' order by $id desc limit 1");
	$id = "";
	if(mysql_num_rows($q) > 0) {
		$k = mysql_fetch_array($q);
		$str = substr($k['id'],2,4);
		$count = (substr($k['id'],6,4))  + 1;
		if(strlen($count) == 1) {$jmlnol = "000";}
		else if(strlen($count) == 2) {$jmlnol = "00";}
		else if(strlen($count) == 3) {$jmlnol = "0";}
		else {$jmlnol = "";}
		if($str == date('ym', strtotime($date))) {
			$kd	= $kddepan.$str.$jmlnol.($count);
		} else {
			$kd	= $kddepan.(date('ym', strtotime($date)))."0001";
		}
	} else {
		$kd	= $kddepan.(date('ym', strtotime($date)))."0001";
	}
	return $kd;
}

# Fungsi untuk membuat kode automatis
function buatKode($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);

 	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
	
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}

function buatkodeform($id){
	
	$qry	= mysql_query("SELECT MAX(".$id.") FROM form_id");
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=1;
	}
 	else {
 		$angka=$row[0]+1;
 	}
	
 	return $angka;
	
}

function buatOpsi($id){
	
	$qry	= mysql_query("SELECT IFNULL(MAX(versi),0) AS versi FROM fs_hdr fsh LEFT JOIN penawaran_hdr p ON p.kode_penawaran=fsh.kd_proyek WHERE fsh.kd_proyek='".$id."' ");
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$opsi=1;
	}
 	else {
 		$opsi=$row[0]+1;
 	}
	
 	return $opsi;
	
}


# Fungsi untuk membuat format rupiah pada angka (uang)
function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}
function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 50; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    $hasil = $randstring;
    return $hasil;
}

function comp_name(){
	/*$query 	= mysql_query("SELECT value FROM variabel WHERE id = 'company_name'");	
	$row	= mysql_fetch_array($query); 
 	return base64_decode($row['value']);*/
	return "PT. PUTERAKO INTIBUANA";
}
function comp_address(){
	/*$query 	= mysql_query("SELECT value FROM variabel WHERE id = 'company_address'");	
	$row	= mysql_fetch_array($query); 
 	return base64_decode($row['value']);*/
	return "Jl. Gembong 30H Surabaya";
}
function comp_contact(){
	/*$query 	= mysql_query("SELECT value FROM variabel WHERE id = 'company_contact'");	
	$row	= mysql_fetch_array($query); 
 	return base64_decode($row['value']);*/
	return "";
}
function tgl_indo($data) {
	$src	= array("01","02","03","04","05","06","07","08","09","10","11","12");
	$rpl	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$ex		= str_replace($src,$rpl,date('m', strtotime($data)));
	return date('d', strtotime($data))." ".$ex." ".date('Y', strtotime($data));
}
function bulan($data) {
	$src	= array("01","02","03","04","05","06","07","08","09","10","11","12");
	$rpl	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$ex		= str_replace($src,$rpl,date('m', strtotime($data)));
	return $ex;
}

function bulan_tahun($data) {
	$src	= array("01","02","03","04","05","06","07","08","09","10","11","12");
	$rpl	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$ex		= str_replace($src,$rpl,date('m', strtotime($data)));
	return $ex.'-'.date('Y', strtotime($data));
}

// Function untuk mengubah angka desimal menjadi angka romawi
function romanNumerals($num) {
    $n = intval($num);
    $res = '';
 
    /*** roman_numerals array  ***/
    $roman_numerals = array(
                'M'  => 1000,
                'CM' => 900,
                'D'  => 500,
                'CD' => 400,
                'C'  => 100,
                'XC' => 90,
                'L'  => 50,
                'XL' => 40,
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1);
 
    foreach ($roman_numerals as $roman => $number) 
    {
        /*** divide to get  matches ***/
        $matches = intval($n / $number);
 
        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);
 
        /*** substract from the number ***/
        $n = $n % $number;
    }
 
    /*** return the res ***/
    return $res;
}

// Membuat no permintaan penawaran secara otomatis
function buat_no_permintaan($kategori, $tanggal_mentah) {
	if($kategori && $tanggal_mentah) {
		$tanggal = date_create($tanggal_mentah);
		$baca_tanggal = date_format($tanggal, 'Y-m-d');	
		$tahun = date_format($tanggal, 'y');
		$bulan = date_format($tanggal, 'n');
		$bulan_romawi = romanNumerals($bulan);
		// Query untuk menampilkan nomer urut
		$command = "SELECT COUNT(tanggal) + 1 AS jumlah FROM permintaan_penawaran WHERE YEAR(tanggal) = " . date_format($tanggal, 'Y') . " AND MONTH(tanggal) = $bulan";

		$do_command = mysql_query($command);
		$res = mysql_fetch_array($do_command);
		$no_urut = $res['jumlah'];

		$output = "";
		if($kategori == 'service') $output = "PIB/JK/$no_urut/SV/$bulan_romawi/$tahun";
		else if($kategori == 'sales') $output = "PIB/SD/$no_urut/SS/$bulan_romawi/$tahun";

		return $output;
	}
	else
		die("Parameter is required");
}

function buat_no_survey($no_permintaan, $tanggal_mentah) {
	if($no_permintaan !== '') {
		$parts = explode("/", $no_permintaan);
		$tanggal = date_create($tanggal_mentah);
		$baca_tanggal = date_format($tanggal, 'Y-m-d');	
		$tahun = date_format($tanggal, 'y');
		$bulan = date_format($tanggal, 'n');
		$bulan_romawi = romanNumerals($bulan);
		// Query untuk menampilkan nomer urut
		$command = "SELECT COUNT(tanggal) + 1 AS jumlah FROM fs_hdr WHERE YEAR(tanggal) = " . date_format($tanggal, 'Y') . " AND MONTH(tanggal) = $bulan";

		$do_command = mysql_query($command);
		$res = mysql_fetch_array($do_command);
		$no_urut = $res['jumlah'];

		$hasil = 'SV/' . $parts[0] . '/' . $parts[1] . '/' . $no_urut . '/' . $parts[3] . '/' . $bulan_romawi . '/' . $tahun;
		
		return $hasil;

	}
	else
		return false;
	
}

function buat_no_penawaran($no_permintaan, $tanggal_mentah) {
	if($no_permintaan !== '') {
		$parts = explode("/", $no_permintaan);
		$tanggal = date_create($tanggal_mentah);
		$baca_tanggal = date_format($tanggal, 'Y-m-d');	
		$tahun = date_format($tanggal, 'y');
		$bulan = date_format($tanggal, 'n');
		$bulan_romawi = romanNumerals($bulan);
		// Query untuk menampilkan nomer urut
		$command = "SELECT COUNT(tanggal) + 1 AS jumlah FROM penawaran_hdr WHERE YEAR(tanggal) = " . date_format($tanggal, 'Y') . " AND MONTH(tanggal) = $bulan";

		$do_command = mysql_query($command);
		$res = mysql_fetch_array($do_command);
		$no_urut = $res['jumlah'];

		$hasil = 'P/' . $parts[0] . '/' . $parts[1] . '/' . $no_urut . '/' . $parts[3] . '/' . $bulan_romawi . '/' . $tahun;
		
		return $hasil;

	}
	else
		return false;
	
}

?>