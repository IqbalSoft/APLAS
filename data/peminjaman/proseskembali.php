<?php
	require '../../fungsi/functions.php';

	if(isset($_POST["submit"])) {
		global $conn;
		$id 		= $_POST["id_peminjam"];
		$nama 		= htmlspecialchars(strtoupper($_POST["nama_peminjam"]));
	 	$kelas 		= $_POST["kelas"];
	 	$buku 		= htmlspecialchars($_POST["buku"]);
	 	$jumlah 	= htmlspecialchars($_POST["jumlah"]);
	 	$jaminan 	= htmlspecialchars($_POST["jaminan"]);
		$kontak 	= htmlspecialchars($_POST["kontak"]);
		$tanggal 	= $_POST["tanggal"];
		$waktu 		= $_POST["waktu"];
		$foto		= $_POST["foto"];

		$query = "INSERT INTO pengembalian
						VALUES 
				  ('', '$nama', '$kelas', '$buku', '$jumlah','$jaminan', '$kontak', '$tanggal', '$waktu', '$foto')";
		$hasil = mysqli_query($conn, $query);
		$hasil = mysqli_query($conn, "DELETE FROM peminjam WHERE id_peminjam = '$id'");

		if($hasil){	
			echo "<script>
					alert('Buku telah di kembalikan!');
					document.location.href = '../peminjaman';
				  </script>";
		}
		else{
			echo "<script>
					alert('Buku gagal di kembalikan!');
					document.location.href = '../peminjaman';
				  </script>";
		}		  
	}
?>