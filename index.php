<?php
	require 'fungsi/functions.php';

	if( isset($_POST["submit"]) ){
		if(sistem($_POST) > 0){
			echo "<script>
					alert('Buku sukses di pinjam kembalikan tepat WAKTU!!!');
				  </script>";
		}
		else{
			echo "<script>
					alert('Data Gagal Di inputkan!');
				  </script>";
		}
	}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style/form.css">
	<title>Form TRANSAKSI Buku</title>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
		          aria-expanded="false">
		            <span class="sr-only">Toggle Navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		         </button>

		         <a href="index.php" class="img-brand"><img src="img/logo.png" width="50"> Perpustakaan SMKN 13 BANDUNG</a>	
			 </div>

			 <div class="collapse navbar-collapse" id="menu">
			 	<div id="container">
				 	<ul class="nav navbar-nav navbar-right">
				 		<li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				 		<li><a href="data/peminjaman"><i class="glyphicon glyphicon-book"></i> Data Peminjaman Buku</a></li>
				 		<li><a href="data/pengembalian"><i class="glyphicon glyphicon-save"></i> Data Pengembalian Buku</a></li>
				 	</ul>
				 </div>
			 </div>
		</div>
	</nav>

	<div class="container">	
		<h2 class="text-center">Perpustakaan SMKN 13 BANDUNG <hr></h2>
		
		<div class="col-md-8">
			<form action="" method="post" class="form-group" enctype="multipart/form-data">

				<div class="row">
					<div class="col-md-6">
						<label for="nama">Nama :</label>
						<input type="text" id="nama" name="nama_peminjam" class="form-control" placeholder="Masukkan Nama Lengkap..." autofocus autocomplete="off" required><br>
						<!-- akhir nama -->	
					</div>

					<div class="col-md-6">
						<label for="kelas">Kelas :</label>
						<select name="kelas" id="kelas" class="form-control" required>
							<option>Pilih Kelas</option>
							<option value="X AK 1">X AK 1</option>
							<option value="X AK 2">X AK 2</option>
							<option value="X AK 3">X AK 3</option>
							<option value="X AK 3">X AK 4</option>
							<option value="X AK 5">X AK 5</option>
							<option value="X AK 6">X AK 6</option>
							<option value="X TKJ 1">X TKJ 1</option>
							<option value="X TKJ 2">X TKJ 2</option>
							<option value="X TKJ 3">X TKJ 3</option>
							<option value="X RPL 1">X RPL 1</option>
							<option value="X RPL 2">X RPL 2</option>

							<option value="XI AK 1">XI AK 1</option>
							<option value="XI AK 2">XI AK 2</option>
							<option value="XI AK 3">XI AK 3</option>
							<option value="XI AK 3">XI AK 4</option>
							<option value="XI AK 5">XI AK 5</option>
							<option value="XI AK 6">XI AK 6</option>
							<option value="XI TKJ 1">XI TKJ 1</option>
							<option value="XI TKJ 2">XI TKJ 2</option>
							<option value="XI TKJ 3">XI TKJ 3</option>
							<option value="XI RPL 1">XI RPL 1</option>
							<option value="XI RPL 2">XI RPL 2</option>

							<option value="XII AK 1">XII AK 1</option>
							<option value="XII AK 2">XII AK 2</option>
							<option value="XII AK 3">XII AK 3</option>
							<option value="XII AK 4">XII AK 4</option>
							<option value="XII AK 5">XII AK 5</option>
							<option value="XII AK 6">XII AK 6</option>
							<option value="XII TKJ 1">XII TKJ 1</option>
							<option value="XII TKJ 2">XII TKJ 2</option>
							<option value="XII TKJ 3">XII TKJ 3</option>
							<option value="XII RPL 1">XII RPL 1</option>
							<option value="XII RPL 2">XII RPL 2</option>

							<option value="XIII AK 1">XIII AK 1</option>
							<option value="XIII AK 2">XIII AK 2</option>
							<option value="XIII AK 3">XIII AK 3</option>
							<option value="XIII AK 4">XIII AK 4</option>
							<option value="XIII AK 5">XIII AK 5</option>
							<option value="XIII AK 6">XIII AK 6</option>
						</select><br>
						<!-- akhir kelas -->	
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<label for="buku">Buku :</label>
						<input type="text" class="form-control" name="buku" autocomplete="off" placeholder="Masukkan Nama Buku..." id="buku" required><br>
					</div>

					<div class="col-md-6">
						<label for="jumlah">Jumlah Buku :</label>
						<input type="number" class="form-control" name="jumlah" value="1" min="1" id="jumlah" required><br>
					</div>
				</div>	

				<div class="row">
					<div class="col-md-6">
						<label for="jaminan">Jaminan :</label>
						<input type="text" class="form-control" name="jaminan" autocomplete="off" placeholder="Masukkan Jaminan..." id="jaminan" required><br>
					</div>

					<div class="col-md-6">
						 <label for="foto">Upload foto :</label>
						 <input type="file" name="foto" id="foto" class="form-control">
					</div>
				</div>
				<!-- akhir jaminan -->

				<label for="kontak">Kontak :</label>
				<input type="text" class="form-control" id="kontak" name="kontak" autocomplete="off"  placeholder="Masukkan no HandPhone..." required><br>
				<!-- akhir kontak -->
				<button name="submit" class="btn btn-success"><i class="glyphicon glyphicon-upload"></i> Pinjam</button>
			</form>
			<!-- akhir form -->
		</div>

		<div class="col-md-4">
			<div class="panel">
				<h4 class="text-center">Foto anda dengan jaminan</h4>

				<select class="video-devices" id="select">
			      <!-- <option value="">select some</option> -->
			    </select>

			    <video class="camera-movie" style="width: 340px;height: 200px;"></video>
			    <canvas class="captured-frame" style="width: 310px;height:150px;padding-left:40px;margin-top:10px;"></canvas>
				<br>
				
				<center>
			    <a href="javascript:void(0);" class="capture-button btn btn-primary" value="img">Ambil foto</a>
			    <a class="save-button btn btn-info" download="foto-peminjam.png">save</a>
				</center >
			</div>
		</div>
		<!-- akhir grid system -->
	</div>
	<!-- akhir container -->

	<footer>
		<p style="color: #eaeaea; margin-top: -30px;margin-left: 120px;">&copy;2018 by SE2GROUP | XI RPL 2 .</p>
	</footer>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/capture.js"></script>
</body>
</html>