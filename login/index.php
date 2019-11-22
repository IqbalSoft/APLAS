<?php 
	session_start();
	if(isset($_SESSION["login"])){
		header("location: ../data/peminjaman/");
		exit;
	}

	require '../fungsi/functions.php';

	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$data = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

		if(mysqli_num_rows($data) === 1){
			$row = mysqli_fetch_assoc($data);

			if(PASSWORD_VERIFY($password, $row["password"])){
				$_SESSION["login"] = true;	

				header("location: ../data/pengembalian/");
				exit;
			}
		}
		$error = true;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style/login.css">
	<title>LOGIN</title>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="thumbnail">
					<h2 class="text-center">Please Login... <hr></h2>
					<br>	
					<?php if(isset($error)) : ?>
						<p class="alert-danger text-center" >USERNAME / PASSWORD SALAH</p>
					<?php endif; ?>

					<form action="" method="POST" class="form-group has-feedback">
						
						<label for="username">Username :</label>
						<input type="text" id="username" name="username" class="form-control" autofocus placeholder="Masukkan Username...">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
						<br>
						
						<div class="form-group has-feedback">	
							<label for="password">Password :</label>
							<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password...">
							<span data-target="lock" class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<br>

						<button name="login" class="btn btn-success">Masuk</button>

						<a href="../" id="home"> &nbsp;&nbsp;&nbsp;Kembali ke home <i class="glyphicon glyphicon-chevron-right"></i></a>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>