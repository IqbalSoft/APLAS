<?php 
	require '../../fungsi/functions.php';

	if(hapusall() > 0){
		echo "<script>
				alert('Data berhasil terhapus semua');
				document.location.href = '../pengembalian/';
			  </script>";
	}
	else{
		echo "<script>
				alert('Data gagal terhapus semua');
				document.location.href = '../pengembalian/';
			  </script>";
	}
?>