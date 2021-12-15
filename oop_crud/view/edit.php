<?php 
include '../controller/Surat.php';

$ctrl = new Surat();
$id = $_GET['id'];
$isi = $ctrl->getData($id);
$jenis = $ctrl->getJenisData();

//var_dump($isi);

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
	<title>Edit Surat</title>
	 <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Edit Surat</H2>
		<div class="card-body">
		 <form class="row g-3" action="<?php echo $ctrl->updateSurat($id);?>" method="post" name="form1">
		  <div class="col-md-6">
		    <label for="noSurat" class="form-label">Nomor Surat</label>
		    <input type="text" class="form-control" id="noSurat" name="noSurat" value="<?php echo $isi['no_surat'] ?>">
		  </div>
		  <div class="col-md-6">
		    <label for="jenisSurat" class="form-label">Jenis Surat</label>
		    <select id="jenisSurat" name="jenisSurat" class="form-select">
		      <option selected value="<?php echo $isi['jenis_surat'] ?>"><?php echo $js ?></option>
		      <?php 
		      foreach ($jenis as $js) {
		      	?>
		      <option value="<?php echo $js['id_js'] ?>"><?php echo $js['jenis_surat'] ?></option>
		      <?php
			  }
			  ?>
		    </select>
		  </div>
		  <div class="col-md-12">
		    <label for="tglSurat" class="form-label">Tanggal Surat</label>
		    <input type="date" class="form-control" id="tglSurat" name="tglSurat" value="<?php echo $isi['tgl_surat'] ?>">
		  </div>
		  	<div class="col-md-12">
		    <label for="ttdSurat" class="form-label">Pembuat Surat</label>
		    <input type="text" class="form-control" id="ttdSurat" name="ttdSurat" value="<?php echo $isi['ttd_surat'] ?>">
			</div>
		  <div class="col-md-6">
		    <label for="ttdMenyetujui" class="form-label">Menyetujui</label>
		    <input type="text" class="form-control" id="ttdMenyetujui" name="ttdMenyetujui" value="<?php echo $isi['ttd_menyetujui'] ?>">
		  </div>
		    <div class="col-md-6">
		    <label for="ttdMengetahui" class="form-label">Mengetahui</label>
		    <input type="text" class="form-control" id="ttdMengetahui" name="ttdMengetahui" value="<?php echo $isi['ttd_mengetahui'] ?>">
		  </div>
		  <div class="col-12">
		    <button type="submit" class="btn btn-primary" name="update">Update</button>
		     <button type="button" class="btn btn-danger">Cancel</button>
		  </div>
		</form>
		</div>
	</row>
	</div>
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>