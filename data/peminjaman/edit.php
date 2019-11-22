<?php 
	require '../../fungsi/functions.php';

	$id = $_GET["id"];

	$data = query("SELECT * FROM peminjam WHERE id_peminjam = '$id'")[0];

	if(isset($_POST["submit"])){
		if(edit($_POST) > 0){
			echo "<script>
					alert('Data berhasil diubah!');
					document.location.href = '../peminjaman/';	
				  </script>";
		}
		else{
			echo "<script>
					alert('Data gagal diubah!');	
				  </script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style/form.css">
	<title>Edit data peminjaman</title>
</head>
<body>
	<div class="container">	
		<h2 class="text-center">Perpustakaan SMKN 13 BANDUNG <hr></h2>
		
		<div class="col-md-8 col-md-offset-2">
			<form action="" method="post" class="form-group">

				<div class="row">
					<div class="col-md-6">
						<label for="nama">Nama :</label>
						<input type="text" name="nama_peminjam" value="<?= $data["nama_peminjam"]; ?>" class="form-control" ><br>
						<!-- akhir nama -->	
					</div>

					<div class="col-md-6">
						<label for="kelas">Kelas :</label>
						<input type="text" name="kelas" value="<?= $data["kelas"] ?>" class="form-control">
						<!-- akhir kelas -->	
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<label for="buku">Buku :</label>
						<input type="text" class="form-control" name="buku" value="<?= $data["buku"]; ?>" autocomplete="off" placeholder="Masukkan Nama Buku..." id="buku" required><br>
					</div>

					<div class="col-md-6">
						<label for="jumlah">Jumlah Buku :</label>
						<input type="number" class="form-control" name="jumlah" value="<?= $data["jumlah"]; ?>" min="1" id="jumlah" required><br>
					</div>
				</div>	

				<label for="jaminan">Jaminan :</label>
				<input type="text" class="form-control" name="jaminan" value="<?= $data["jaminan"]; ?>" autocomplete="off" placeholder="Masukkan Jaminan..." id="jaminan" required><br>
				<!-- akhir jaminan -->

				<label for="kontak">Kontak :</label>
				<input type="tel" class="form-control" id="kontak" name="kontak" value="<?= $data["kontak"]; ?>" autocomplete="off" placeholder="Masukkan no HandPhone..." required><br>
				<!-- akhir kontak -->

				<input type="hidden" name="tanggal" value="<?php echo date('l,d-m-Y'); ?>">
				<!-- akhir tanggal -->

				<input type="hidden" name="id_peminjam" value="<?= $data["id_peminjam"]; ?>">

				<button name="submit" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Ubah data</button>

				<a href="../peminjaman/" class="btn btn-danger">Batal</a>
			</form>
			<!-- akhir form -->
		</div>
		<!-- akhir grid system -->
	</div>
	<!-- akhir container -->

	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</body>
</html>