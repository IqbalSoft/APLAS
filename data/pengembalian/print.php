<?php
	require '../../vendor/autoload.php';

	require '../../fungsi/functions.php';

	$rental = query("SELECT * FROM pengembalian");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<style>
		a{
		color: blue;
		font-weight: 600;
		text-transform: uppercase;
		font-size: 13px;
		}
		a:hover{
			text-decoration: none;
		}
		ul li a{
			font-size: 13px;
		}
		ul li a:hover{
			border-bottom: 1px solid blue;
		}
		table{
			background-color: white;
		}
		table th{
			padding: 15px;
			text-align: center;
			background-color: lightblue;
		}
		table td{
			padding: 10px;
			text-align: center;
		}
		</style>
	<title>Laporan Pengembalian Buku</title>
</head>
<body>
	<img src="../../img/logo.png" style="width:90px;margin-left:290px;margin-bottom:10px;">
	<p align=center>Jalan Soekarno-Hatta Km.10</p>
	<h1 class="text-center">Laporan Pengembalian Buku</h1>
	<h5><b>'.date('l,d-m-Y').'</b>.</h5>
	<table border="0" class="table-bordered table-striped">
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
		</tr>';

		$i = 1;
		foreach( $rental as $row ){
			$html .= '<tr>
				<td>'. $i++ .'</td>
				<td><img src="../../foto_peminjam/'. $row["foto"] .'" width="120"></td>
				<td>'. $row["nama"] .'</td>
				<td>'. $row["kelas"] .'</td>
				<td>'. $row["buku"] .'</td>
				<td>'. $row["jumlah"] .'</td>
				<td>'. $row["jaminan"] .'</td>
				<td>'. $row["kontak"] .'</td>
				<td>'. $row["tanggal"] .'</td>
				<td>'. $row["waktu"] .'</td>
			</tr>';
		}

$html .= '</table>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>	
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Laporan-pengembalian-buku.pdf', 'D');

?>