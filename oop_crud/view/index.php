<?php
include '../controller/Surat.php';
$ctrl = new Surat();
$surat = $ctrl->index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
  <div class="example-modal">
  <div id="logout" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="row g-3" action="<?php $ctrl->logout()?>" method="post" name="form1">
        <div class="modal-header">
          <h3 class="modal-title">Log Out</h3>
        </div>
        <div class="modal-body">
          <h5 align="center" class="exampleModalLabel">Apakah anda yakin ingin keluar ?</h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="logout">Yes</button>    
          <button id="nologout" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">No</button>     
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <header class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="#">MI 20 B Project</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"></li>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Menu </a>
                            <div class="dropdown-menu"><a class="dropdown-item" href="add.php">Tambah Surat</a><a class="dropdown-item" href="#">Tambah Jenis Surat</a></div>
                        </li>
                    </ul><form class="form-inline mr-auto" target="_self">
                        <div class="form-group mb-0"><label for="search-field"></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                    </form><span class="navbar-text"> </span>

                    <a class="btn btn-light action-button" role="button" href="#" data-bs-toggle="modal" data-bs-target="#logout">Log Out</a>
                </div>
            </div>
        </nav>
    </header>

            <div class="container">
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
            <div class="row">
              <div class="container-fluid">
            <table class="table">
              <thead class="table-light">
                <td>No Surat</td>
                <td>Jenis Surat</td>
                <td>Tanggal Surat</td>
                <td>TTD Surat</td>
                <td colspan="2">Action</td>
              </thead>
              <tbody>
            <?php 
                foreach ($surat as $isi) {
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
                        <form class="row g-3" action="<?php $ctrl->hapusSurat()?>" method="post" name="form1">
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
            </div>
                </div>
            </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
</body>

</html>