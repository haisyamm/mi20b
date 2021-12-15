<?php 
$bio = array(
		'nama' => "Unyil Usro",
		'alamat' => "Tasikmalaya",
		'nohp' => "08XXXXX"
	);
$matkul = array('Web Programming 1', 'Web Design', 'Web Development Project');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Week 2 - Usro</title>
</head>
<body>
	<?php 
		echo "Surat Peminjaman";
		echo "<br><br>"; //Untuk memberikan spasi

		
		echo "<br>";
		echo "Alamat 	:".$bio['alamat'];
		echo "<br>";
		echo "NO HP 	:".$bio['nohp'];
		echo "<br>";
		echo "Saya mengambil mata kuliah sebagai berikut:";
		echo "<br>";

		$n = 1;
		for($x=0;$x<count($matkul);$x++){

		echo $n." ".$matkul[$x]."<br/>";
		$n++;
		}
    
    echo "Nama 		:".$bio['nama'];

	?>
</body>
</html>
