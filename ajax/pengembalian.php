<?php
	require '../fungsi/functions.php';

	$keyword = $_GET["keyword"];

	$query = "SELECT * FROM pengembalian
			  		WHERE
			  nama	   LIKE '%$keyword%' OR
			  kelas	   LIKE '%$keyword%' OR
			  tanggal  LIKE '%$keyword%' ";
	$data = query($query);	
?>
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