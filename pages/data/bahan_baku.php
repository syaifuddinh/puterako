<?php
/*define("HOST","localhost");
define("USER_NAME","root");
define("PASSWORD","");
define("DB_NAME","account");*/


$hasil=array();

$isian = $_GET['kode'];

/*$koneksi = mysql_connect(HOST,USER_NAME,PASSWORD);
if (!$koneksi){echo"Gagal membuat koneksi database";}
mysql_select_db(DB_NAME,$koneksi);*/

$koneksi = inisialisasi();

$hasil = array(false,null);

$kode = explode(":",$isian);
    
$sql = "SELECT `satuan` FROM `bahan_baku` WHERE `kode`='".trim($kode[0])."' AND `aktif`='1'";
$res = mysql_query($sql, $koneksi);
if (!$res){echo mysql_error();die;}

//echo $sql;
$jum = mysql_num_rows($res);

if ($jum >= 1){
$row = mysql_fetch_array($res);
$hasil[0]=true;
$hasil[1]=$row[0];    
}

echo json_encode($hasil);

mysql_close($koneksi);
?>