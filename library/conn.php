<?php
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "lotusolu_puterako";

# Konek ke Web Server Lokal
$koneksidb	= mysql_connect($myHost, $myUser, $myPass) or die ("Koneksi MySQL gagal !");
#PDO
$pdo = new PDO('mysql:host='.$myHost.';dbname='.$myDbs, $myUser, $myPass);
# Memilih database pd MySQL Server
mysql_select_db($myDbs, $koneksidb) or die ("Database $myDbs tidak ditemukan !");
?>