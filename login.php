<?php  

	require_once("lib/php/koneksi.php");

	if ($proses->cekLogin()) {
		header("location:index.php");
	}

	// form action
	if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		if (isset($_POST['login'])) {
			
			$username = $_POST['username'];
			$password = $_POST['password'];

			$cek = $proses->loginPeminjam($username, $password);
			
			if ($cek) {
				header('location:index.php');
			}
			else {
				$error = $proses->getError();
			}

		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-sacle=1">
	<title>Login</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="assets/assets-login/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="assets/assets-login/css/main.css">

	 <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body class="main-page" style="background-color: #ddd">
	<div class="main-login-page">
		
		<div class="login-page-body">

			<div class="form-group">
				<h1 class="text-center">Login User</h1>

				<?php  

					if (isset($error)) {
						echo "<p class='text-danger'>{$error}</p>";
					}

				?>
			</div>

			<form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<div class="input-group">
					<span class="input-group-addon">
						<span class="fa fa-user"></span>
					</span>
					<input type="text" name="username" placeholder="username" class="form-control" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="fa fa-key"></span>
					</span>
					<input type="password" name="password" placeholder="password" class="form-control" required>
				</div>
				<br>
				<div class="input-group">
					<input type="submit" name="login" class="btn btn-block btn-primary" value="Login">
				</div>
			</form>
		</div>
	</div>
</body>
</html>