<?php 
error_reporting(0);
// Buat Koneksinya
$con = mysqli_connect("localhost","root", "", "db_surat_usro");

$tgl = date('d F Y');
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM tbl_surat where id='$id'");
$isi = $query->fetch_assoc();

if($isi['jenis_surat']=='1'){
			$js = "Surat Keputusan";
		}
		else if($isi['jenis_surat']=='2'){
			$js = "Surat Pernyataan";
		}else if($isi['jenis_surat']=='3'){
			$js = "Surat Peminjaman";
		}else{
			$js = "Kode Bermasalah";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Surat</title>
	 <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Tambah Surat</H2>
		<div class="card-body">
		  <form class="row g-3" action="edit.php" method="post" name="form1">
		  	<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
		  <div class="col-md-6">
		    <label for="noSurat" class="form-label">Nomor Surat</label>
		    <input type="text" class="form-control" id="noSurat" name="noSurat" value="<?php echo $isi['no_surat'] ?>" placeholder="SK-2021-09001">
		  </div>
		  <div class="col-md-6">
		    <label for="jenisSurat" class="form-label">Jenis Surat</label>
		    <select id="jenisSurat" name="jenisSurat" class="form-select">
		      <option selected  value="<?php echo $isi['jenis_surat'] ?>"><?php echo $js ?></option>
		      <option value="1">Surat Keputusan</option>
		      <option value="2">Surat Pernyataan</option>
		      <option value="3">Surat Peminjaman</option>
		    </select>
		  </div>
		  <div class="col-md-12">
		    <label for="tglSurat" class="form-label">Tanggal Surat</label>
		    <input type="date" class="form-control" id="tglSurat" name="tglSurat"  value="<?php echo $isi['tgl_surat'] ?>">
		  </div>
		  	<div class="col-md-12">
		    <label for="ttdSurat" class="form-label">Pembuat Surat</label>
		    <input type="text" class="form-control" id="ttdSurat" name="ttdSurat" placeholder="Unyil"  value="<?php echo $isi['ttd_surat'] ?>">
			</div>
		  <div class="col-md-6">
		    <label for="ttdMenyetujui" class="form-label">Menyetujui</label>
		    <input type="text" class="form-control" id="ttdMenyetujui" name="ttdMenyetujui" placeholder="Usro"  value="<?php echo $isi['ttd_menyetujui'] ?>">
		  </div>
		    <div class="col-md-6">
		    <label for="ttdMengetahui" class="form-label">Mengetahui</label>
		    <input type="text" class="form-control" id="ttdMengetahui" name="ttdMengetahui" placeholder="Pa RT"  value="<?php echo $isi['ttd_mengetahui'] ?>">
		  </div>
		  <div class="col-12">
		    <button type="submit" class="btn btn-primary" name="update">Update</button>
		     <button type="button" class="btn btn-danger">Cancel</button>
		  </div>
		</form>
		</div>
	</row>
	</div>
	 <?php
 
  
    if(isset($_POST['update'])) {
    	$id = $_POST['id'];
        $no_surat = $_POST['noSurat']; // name / id kolom
        $jenis_surat = $_POST['jenisSurat'];
        $tgl_surat = $_POST['tglSurat'];
        $ttd_surat = $_POST['ttdSurat'];
        $ttd_mengetahui = $_POST['ttdMengetahui'];
        $ttd_menyetujui = $_POST['ttdMenyetujui'];
        
                
        // Insert user data into table
        $result = mysqli_query($con, "UPDATE `tbl_surat` 
        	SET  `no_surat` = '$no_surat', 
        	`jenis_surat` = '$jenis_surat', `tgl_surat` = '$tgl_surat', `ttd_surat` = '$ttd_surat', 
        	`ttd_mengetahui` = '$ttd_mengetahui', 
        	`ttd_menyetujui` = '$ttd_menyetujui' 
        	WHERE `id` = '$id'");
        
        // Show message when user added
        //echo "Surat Updated successfully. <a href='view.php'>List Surat</a>";
        header("Location:view.php?pesan=success&frm=edit");
    }

    
    ?>
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>