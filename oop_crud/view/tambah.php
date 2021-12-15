<?php 
include '../controller/Surat.php';

$ctrl = new Surat();
$Surat = $ctrl->index();
//$jenis = $ctrl->getJenisData();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Surat</title>
	 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Tambah Surat</H2>
		<div class="card-body">
		  <form class="row g-3" action="<?php echo $ctrl->simpanSurat();?>" method="post" name="form1">
		  <div class="col-md-6">
		    <label for="noSurat" class="form-label">Nomor Surat</label>
		    <input type="text" class="form-control" id="noSurat" name="noSurat" placeholder="SK-2021-09001">
		  </div>
		  <div class="col-md-4">
		    <label for="jenisSurat" class="form-label">Jenis Surat</label>
		    <select id="jenisSurat" name="jenisSurat" class="form-select">
		    </select>
		    <a class="btn btn-primary " href="#" data-bs-toggle="modal" data-bs-target="#ModalJenis">Add</a>
		  </div>
		  <div class="col-md-12">
		    <label for="tglSurat" class="form-label">Tanggal Surat</label>
		    <input type="date" class="form-control" id="tglSurat" name="tglSurat">
		  </div>
		  	<div class="col-md-12">
		    <label for="ttdSurat" class="form-label">Pembuat Surat</label>
		    <input type="text" class="form-control" id="ttdSurat" name="ttdSurat" placeholder="Unyil">
			</div>
		  <div class="col-md-6">
		    <label for="ttdMenyetujui" class="form-label">Menyetujui</label>
		    <input type="text" class="form-control" id="ttdMenyetujui" name="ttdMenyetujui" placeholder="Usro">
		  </div>
		    <div class="col-md-6">
		    <label for="ttdMengetahui" class="form-label">Mengetahui</label>
		    <input type="text" class="form-control" id="ttdMengetahui" name="ttdMengetahui" placeholder="Pa RT">
		  </div>
		  <div class="col-12">
		    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
		     <button type="button" class="btn btn-danger">Cancel</button>
		  </div>
		</form>
		</div>
	</row>
	</div>
<div class="example-modal">
  <div id="ModalJenis" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="row g-3" id="formJenisSurat">
        <div class="modal-header">
          <h3 class="modal-title">Add Jenis Surat</h3>
        </div>
        <div class="modal-body">
          <label for="jenisSurat" class="form-label">Pembuat Surat</label>
		    <input type="text" class="form-control" id="jenisSurat" name="jenisSurat" placeholder="Surat ....">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" id="btnSimpan">Simpan
                        </button>    
          <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>     
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">

$(document).ready(function(){
//alert('test');
	show_jenis();  //memanggil function yang ada di bawah
	//
	function show_jenis(){ //untuk menampilkan data product
	  $.ajax({
	    type  : 'GET',
	    url   : 'api.php', //Memanggil Controller/Function
	    async : false,
	    dataType : 'json',
	    success : function(data){
	      var html = '';
	      var i;
	      var no;
	      html = '<option value="">Silahkan Pilih ...</option>';
	      for(i=0; i<data.length; i++){ //looping atau pengulangan
	        no = i + 1;
	        html += 
	            '<option value="'+data[i].id_js+'">'+data[i].jenis_surat+'</option>';                ;
	      } // akhir dari looping

	      $('#jenisSurat').html(html); // mengirim data
	    }      
	  });
	}
	
	$('#btnSimpan').click(function(){
    // alert('button');
    	$('#ModalJenis').modal('hide');
		var dataForm = $('#formJenisSurat').serialize();
		$.ajax({
		type  : 'POST',
		url   : 'api.php',//Memanggil Controller/Function
		async : false,
		dataType : 'json',
		data : dataForm, 
		success:function(response){
		        if (response == 200) {
					Swal.fire({
					type: 'success',
					title: 'Berhasil di simpan!',
					text: 'Tunggu sejenak',
					timer: 1000,
					showCancelButton: false,
					showConfirmButton: false
					})
					.then (function() {
						show_jenis();
					});

		        } else {

		          	Swal.fire({
		            type: 'error',
		            title: 'Gagal menyimpan',
		            text: 'silahkan coba lagi!'
		          });

		        }

		        console.log(response);

		      },

		      error:function(response){

		          Swal.fire({
		            type: 'error',
		            title: 'Opps!',
		            text: 'server error!'
		          });

		          console.log(response);

		      }
		});

	});  
     
});

  
</script>
</html>