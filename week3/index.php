<?php
error_reporting(0);
 
//DATABASE PERTAMA
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$database = 'db_surat_usro';
 
// Buat Koneksinya
$db = new mysqli($db_host, $db_user, $db_pass, $database);
 
// Cek koneksi *BISA SOBAT HAPUS NANTINYA 
if ($db->connect_error) { 
	die("<b>Yahh! Koneksi Database pertama 'db_dewankomputer' gagal</b> : " . mysqli_connect_error()); 
} else { 
	echo "<b>Hore! Koneksi Database pertama 'db_dewankomputer' Berhasil</b>"; 
}
 
// ------------------------------------------------------------------------------- \\
 
?>