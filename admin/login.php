<?php
session_start();
if (isset($_SESSION['userid'])) {
	echo "<script>window.location='index.php';</script>";
}
include "../+koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CodePen - Sign up / Login Form</title>
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	<!DOCTYPE html>
	<html>

	<head>
		<title>Slide Navbar</title>
		<link rel="stylesheet" type="text/css" href="slide navbar style.css">
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	</head>

	<body>
		<div class="main">
			<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form class="user" method="post" action="">
					<label for="chk" aria-hidden="true">Sign up</label>
					<div class="form-group">
						<input type="text" name="user" class="form-control form-control-user" placeholder="Username"
							required autofocus>
					</div>
					<div class="form-group">
						<input type="password" name="pass" class="form-control form-control-user" placeholder="Password"
							required>
					</div>
					<button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
				</form>
				<?php
				if (isset($_POST['login'])) {
					$user = trim($_POST['user']);
					$pass = trim($_POST['pass']);

					$query = $pdo->prepare("SELECT * FROM users WHERE username = :user");
					$query->execute(['user' => $user]);

					if ($query->rowCount() < 1) {
						echo "<script>alert('User tidak ditemukan');</script>";
					} else {
						$data = $query->fetch();
						if (password_verify($pass, $data['password'])) {
							$_SESSION['userid'] = $data['id'];
							$_SESSION['username'] = $data['username'];
							echo "<script>alert('Selamat, Login sukses!'); window.location = 'index.php';</script>";
						} else {
							echo "<script>alert('Login gagal! Password salah');</script>";
						}
					}
				}
				?>
				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
		</div>
	</body>

	</html>
	<!-- partial -->

</body>

</html>