<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Part 15 : Membuat Modal dengan Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>	
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    

External JavaScript

    https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js
    https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container">		
	<center><h1>Membuat Modal dengan Bootstrap | www.malasngoding.com</h1></center>
	<br/>
	<!-- Tombol untuk menampilkan modal-->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buka Modal</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Bagian heading modal</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>bagian body modal.</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>