<?php
	$conn = mysqli_connect("localhost", "root", "", "perpus");

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];

		while( $row = mysqli_fetch_assoc($result) )
			$rows[] = $row; 
		
		return $rows;
	}
	function upload(){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$error = $_FILES['foto']['error'];
		$tmpName = $_FILES['foto']['tmp_name'];
	
		if ( $error === 4 ) {
		  echo "<script>
			  alert('Please choose image!');
			  </script>";
		  return false;	  
		}
  
		$ekstensi = ['png', 'jpg', 'jpeg'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
  
		if ( !in_array($ekstensiGambar, $ekstensi) ) {
			echo "<script>
			  alert('Your choose not image format!');
			  </script>";
		  return false;
		  } 
  
		  if ( $ukuranFile > 3000000 ) {
			echo "<script>
			  alert('Size very big!');
			  </script>";
		  return false;
		  }
  
		  $newname = uniqid();
		  $newname .= '.';
		  $newname .= $ekstensiGambar;
		  move_uploaded_file($tmpName, 'foto_peminjam/' . $newname);
		  return $newname;
	}
	function sistem($data){
		global $conn;
		date_default_timezone_set('asia/Jakarta');
		$nama 		= htmlspecialchars(strtoupper($data["nama_peminjam"]));
	 	$kelas 		= $data["kelas"];
	 	$buku 		= htmlspecialchars($data["buku"]);
	 	$jumlah 	= htmlspecialchars($data["jumlah"]);
	 	$jaminan 	= htmlspecialchars($data["jaminan"]);
		$kontak 	= htmlspecialchars($data["kontak"]);
		$tanggal 	= date('l,d-m-Y');
		$waktu 		= date('H:i:sa');

		if($_FILES['foto']['error'] === 4){
			$foto = "nophoto.png";
		}
		else{
		$foto = upload();
		}

		$query = "INSERT INTO peminjam
						VALUES
	    			('', '$nama', '$kelas', '$buku', '$jumlah','$jaminan', '$kontak', '$tanggal', '$waktu', '$foto')";

		mysqli_query($conn,$query);
		return mysqli_affected_rows($conn);	
	}
	function edit($data){
		global $conn;
		$id 		= $data["id_peminjam"];
		$nama 		= htmlspecialchars(strtoupper($data["nama_peminjam"]));
	 	$kelas 		= htmlspecialchars($data["kelas"]);
	 	$buku 		= htmlspecialchars($data["buku"]);
	 	$jumlah 	= htmlspecialchars($data["jumlah"]);
	 	$jaminan 	= htmlspecialchars($data["jaminan"]);
		$kontak 	= htmlspecialchars($data["kontak"]);
		$tanggal 	= $data["tanggal"];

		$query = "UPDATE peminjam SET 
					nama_peminjam 	= '$nama',
					kelas 			= '$kelas',
					buku 			= '$buku',
					jumlah 			= '$jumlah',
					jaminan 		= '$jaminan',
					kontak 			= '$kontak',
					tanggal 		= '$tanggal'
							WHERE
					id_peminjam = '$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);		  
	}
	
	function delete($id){
		global $conn;

		$query = "DELETE FROM peminjam WHERE id_peminjam = '$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
	function deleteall(){
		global $conn;
		$query = "DELETE FROM peminjam";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
	function hapus($id){
		global $conn;
		$query = "DELETE FROM pengembalian WHERE id_pengembalian = '$id'";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
	function hapusall(){
		global $conn;
		$query = "DELETE FROM pengembalian";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
	function cari($keyword){
		global $conn;
		$query = "SELECT * FROM peminjam
					 	WHERE
				  nama_peminjam LIKE '%$keyword%' OR
				  kelas			LIKE '%$keyword%' OR
				  buku 			LIKE '%$keyword%' OR
				  tanggal 		LIKE '%$keyword%' ";
		
		return query($query);		   
	}
?>