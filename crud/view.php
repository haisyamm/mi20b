<?php 
error_reporting(0);
// Buat Koneksinya
$con = new mysqli("localhost","root", "", "db_surat_usro");

$tgl = date('d F Y');

$query = mysqli_query($con, 'SELECT * FROM tbl_surat ' );
// $isi = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Surat</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

</div>
<div class="container">
  <?php // ALERT SETTING MULAI
  $pesan = $_GET['pesan'];
  $frm = $_GET['frm'];
  //echo $pesan;
  if ($pesan=='success' && $frm =='del') {
  
  ?>
  <div class="alert alert-danger  alert-dismissible fade show" role="alert">
    <strong>Selamat!!!</strong> Anda Berhasil Menghapus.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  } else if ($pesan=='success' && $frm =='add') {
  ?>
  <div class="alert alert-success  alert-dismissible fade show" role="alert">
    <strong>Selamat!!!</strong> Anda Berhasil Menambahkan Data.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  } else if ($pesan=='success' && $frm =='edit') {
  ?>
  <div class="alert alert-primary  alert-dismissible fade show" role="alert">
    <strong>Selamat!!!</strong> Anda Berhasil Merubah Data.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  } // ALERT SETTING AKHIR
  ?>
<row>
	<div class="container-fluid">
	<H2 align="center">List Surat</H2>

<table class="table">
	<a href="add.php">Tambah</a></td>
  <thead class="table-light">
    <td>No Surat</td>
    <td>Jenis Surat</td>
    <td>Tanggal Surat</td>
    <td>TTD Surat</td>
    <td colspan="2">Action</td>
  </thead>
  <tbody>
<?php 
   	foreach ($query as $isi) {
   		if($isi["jenis_surat"]=='1'){
			$js = "Surat Keputusan";
		}
		else if($isi["jenis_surat"]=='2'){
			$js = "Surat Pernyataan";
		}else if($isi["jenis_surat"]=='3'){
			$js = "Surat Peminjaman";
		}else{
			$js = "Kode Bermasalah";
		}
    	?>
    <tr>
	   	<td><?php echo $isi['no_surat'];?></td>
	    <td><?php echo $js;?></td>
	    <td><?php echo $isi['tgl_surat'];?></td>
	    <td><?php echo $isi['ttd_surat'];?></td>
	    <td><a href="edit.php?id=<?php echo $isi['id'];?>">Edit</a></td>
	    <td><a href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $isi['id'];?>">Delete</a></td>
    </tr>
    <!-- modal delete -->
    <div class="example-modal">
      <div id="deletesurat<?php echo $isi['id'];?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
          <div class="modal-content">
          	<form class="row g-3" action="delete.php" method="post" name="form1">
            <div class="modal-header">
              <h3 class="modal-title">Konfirmasi Delete Data Surat</h3>
            </div>
            <div class="modal-body">
            	
            	<input type="hidden" id="id" name="id" value="<?php echo $isi['id'];?>">
             	<h4 align="center" >Apakah anda yakin ingin menghapus no surat <?php echo $isi['no_surat'];?><strong><span class="grt"></span></strong> ?</h4>
            </div>
            <div class="modal-footer">
              	<button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancle</button>
            	<button type="submit" class="btn btn-primary" name="delete">Delete</button>         
            </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- modal delete -->
    <?php

	}
    ?>
  </tbody>
</table>

</div>
</row>

</div>
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>