<?php 
	session_start();

	if(!isset($_SESSION["login"])){
		header("location: ../../login/");
		exit;
	}

	require '../../fungsi/functions.php';

	$data = query("SELECT * FROM pengembalian");

	if(isset($_POST["cari"])){
		$data = pencarian($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style/pengembalian.css">
	<title>Data Pengembalian buku</title>
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

		         <a href="../../index.php" class="img-brand"><img src="../../img/logo.png" width="50"> Perpustakaan SMKN 13 BANDUNG</a>	
			 </div>

			 <div class="collapse navbar-collapse" id="menu">
			 	<div class="container">
				 	<ul class="nav navbar-nav navbar-right">
				 		<li><a href="../../index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				 		<li><a href="../peminjaman/"><i class="glyphicon glyphicon-book"></i> Data Peminjaman Buku</a></li>
				 		<li class="active"><a href="../pengembalian/"><i class="glyphicon glyphicon-save"></i> Data Pengembalian Buku</a></li>
				 		<li><a href="../../fungsi/logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
				 	</ul>
				 </div>
			 </div>
		</div>
	</nav>

	<div class="container">
		<div class="col-md-5">
			<form action="" method="GET" class="form-group has-feedback">
				<input type="text" name="keyword" class="search form-control" autocomplete="off" autofocus placeholder="Masukkan keyword pencarian..." id="keyword">
				<span class="glyphicon glyphicon-search form-control-feedback"></span>
				<button name="cari" id="tombol">Cari</button>
			</form>
		</div>
		<br><br>

		<div id="container">	
			<table class="table-bordered table-striped">
				<tr>
					<th colspan="11" style="padding-bottom: 10px;background-color: lightgrey;"><h3 style="font-weight: bold;">DATA PENGEMBALIAN BUKU</h3></th>
				</tr>
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Judul Buku</th>
					<th>Jumlah Buku</th>
					<th>Jaminan</th>
					<th>Kontak</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>
						<a href="print.php" target="blank" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</a>
						<a href="delete_all.php" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> delete all</a>
					</th>
				</tr>
				
				<?php $i = 1; ?>
				<?php foreach($data as $row) : ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><img src="../../foto_peminjam/<?= $row['foto'];?>" width="120"></td>
						<td><?= $row["nama"]; ?></td>
						<td><?= $row["kelas"]; ?></td>
						<td><?= $row["buku"]; ?></td>
						<td><?= $row["jumlah"]; ?></td>
						<td><?= $row["jaminan"]; ?></td>
						<td><?= $row["kontak"]; ?></td>
						<td><?= $row["tanggal"]; ?></td>
						<td><?= $row["waktu"]; ?></td>
						<td>
							<a href="delete.php?id=<?= $row["id_pengembalian"]; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
						</td>
					</tr>	
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script2.js"></script>
</body>
</html>