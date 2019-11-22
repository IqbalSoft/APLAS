<?php
	require '../../fungsi/functions.php';
	
	$data = query("SELECT * FROM peminjam");

	if(isset($_POST["cari"])){
		$data = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style/pinjam.css">
	<title>Data Peminjam buku</title>
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
				 		<li class="active"><a href=""><i class="glyphicon glyphicon-book"></i> Data Peminjaman Buku</a></li>
				 		<li><a href="../pengembalian/"><i class="glyphicon glyphicon-save"></i> Data Pengembalian Buku</a></li>
				 	</ul>
				 </div>
			 </div>
		</div>
	</nav>

	<div class="container">
		<div class="col-md-6">
			<form action="" method="POST" class="form-group has-feedback">
				<div class="col-md-10">
					<textarea name="keyword" autofocus autocomplete="off" class="search form-control" cols="30" rows="1" placeholder="Masukkan keyword..."></textarea>
					<span class="glyphicon glyphicon-search form-control-feedback" id="search"></span>
				</div>
				<button name="cari" id="tombol" class="btn btn-warning">Cari</button>
			</form>
		</div>
		<br><br>

		<div id="container">	
			<table class="table-bordered table-striped">
				<tr>
					<th colspan="11" style="padding-bottom: 5px;background-color: lightgrey;"><h3>DATA PEMINJAMAN BUKU</h3></th>
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
						<!-- <a href="print.php" target="blank" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</a> -->
						<a href="../peminjaman" class="btn btn-info"><img src="../../img/refresh.png" width="20"> Refresh</a>
					</th>
				</tr>
				
				<?php $i = 1; ?>
				<?php foreach($data as $row) : ?>
					<tr>
						<td><?= $i++; ?></td>
					 <form action="proseskembali.php" method="post">
                		<input type="hidden" name="id_peminjam" value="<?= $row['id_peminjam']?>">
						<td class="text-center">
							<img src="../../foto_peminjam/<?= $row['foto'];?>" width="120">
							<input class="form-control" type="hidden" name="foto" value="<?php echo $row['foto']?>">
						</td>
						<td class="text-center">
							<?= $row['nama_peminjam'];?>
							<input class="form-control" type="hidden" name="nama_peminjam" value="<?php echo $row['nama_peminjam']?>">
						</td>
						<td class="text-center">
							<?= $row['kelas'];?>
							<input class="form-control" type="hidden" name="kelas" value="<?php echo $row['kelas']?>">
						</td>
						
						<td class="text-center">
							<?= $row['buku'];?>
							<input class="form-control" type="hidden" name="buku" value="<?php echo $row['buku']?>">
						</td>

						<td class="text-center">
							<?= $row['jumlah']?>
							<input class="form-control" type="hidden" name="jumlah" value="<?php echo $row['jumlah']?>">
						</td>
						
						<td>
							<?= $row["jaminan"]; ?>
							<input class="form-control" type="hidden" name="jaminan" value="<?php echo $row['jaminan']?>">
						</td>

						<td>
							<?= $row["kontak"]; ?>
							<input class="form-control" type="hidden" name="kontak" value="<?php echo $row['kontak']?>">
						</td>

						<td>
							<?= $row["tanggal"]; ?>
							<input class="form-control" type="hidden" name="tanggal" value="<?php echo $row['tanggal']?>">		
						</td>

						<td>
							<?= $row["waktu"]; ?>
							<input class="form-control" type="hidden" name="waktu" value="<?php echo $row['waktu']?>">		
						</td>
						
						<td>
							<input type="submit" name="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-primary" value="Kembalikan buku"><br><br>
							<a href="edit.php?id=<?= $row["id_peminjam"]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i> Ubah data</a>
						</td>
                	</tr>
            	</form>	
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<!-- <script src="../../js/script.js"></script> -->
</body>
</html>