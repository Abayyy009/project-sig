<?php
session_start();
if (!isset($_SESSION['userid'])) {
	echo "<script>window.location='login.php';</script>";
}
include "../+koneksi.php";
// Cek apakah pengguna sudah login
if (!isset($_SESSION['userid'])) {
	echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
	exit;
}

// Ambil data user dari database
$query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$query->execute([$_SESSION['userid']]);
$data = $query->fetch();

// Jika data user tidak ditemukan, logout otomatis
if (!$data) {
	session_destroy();
	echo "<script>alert('Akun tidak ditemukan!'); window.location='login.php';</script>";
	exit;
}

$name = $data['name']; // Ambil username dari database
$avatar = ($data['avatar'] == '') ? 'user.png' : 'users/' . $data['avatar'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrator GIS - Dashboard</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	<!-- Favicon -->
	<link href="https://technext.github.io/argon-dashboard/assets/img/brand/favicon.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="https://technext.github.io/argon-dashboard/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
	<link
		href="https://technext.github.io/argon-dashboard/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css"
		rel="stylesheet" />
	<!-- CSS Files -->
	<link href="https://technext.github.io/argon-dashboard/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
	<style>
		/* .nav-link {
			transition: background-color 0.3s, color 0.3s;
		}

		.nav-link:hover {
			background-color: #e0e0e0;
			color: #000;
		}

		.nav-link.active {
			background-color: #007bff;
			color: #fff;
			border-radius: 0.5rem;
		} */
		#sidenav-collapse-main .navbar-nav {
			margin-top: 0rem;
			/* atau 0.5rem, sesuaikan */
		}
	</style>
</head>

<body class="">
	<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
		<div class="container-fluid">
			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
				aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand pt-4 mb-0" href="index.php" style="margin-bottom: 0;">
				<img src="../assets/admin.png" class="navbar-brand-img mb-0" alt="..." style="margin-bottom: 0.2rem;">
			</a>

			<!-- User -->


			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">

				<!-- Navigation -->
				<ul class="navbar-nav">

					<li class="nav-item  ">
						<hr class="my-0">
						<a class="nav-link" href="index.php">
							<i class="ni ni-tv-2 text-success"></i> Dashboard
						</a>
					</li>

					<li class="nav-item ">
						<a class="nav-link " href="kost.php">
							<i class="ni ni-building text-primary"></i> Data Kost
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link " href="peta.php">
							<i class="ni ni-pin-3 text-orange"></i> Maps
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link " href="../index.php">
							<i class="ni ni-send text-default"></i> Lihat Website Ver. I
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="../index2.php">
							<i class="ni ni-send text-default"></i> Lihat Website Ver. II
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">
							<i class="ni ni-user-run text-danger"></i> logout
						</a>
					</li>

				</ul>

			</div>
		</div>
	</nav>
	<div class="main-content">
		<!-- Navbar -->
		<nav class="navbar navbar-top navbar-expand-md navbar-success bg-gradient-success" id="navbar-main">

			<div class="container-fluid">
				<!-- Brand -->
				<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"></a>
				<ul class="navbar-nav align-items-center d-none d-md-flex">
					<li class="nav-item dropdown">
						<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							<div class="media align-items-center justify-content-between">
								<div class="media-body d-none d-lg-block">
									<span
										class="mb-0 text-sm font-weight-bold text-white"><?= htmlspecialchars($name) ?></span>
								</div>
								<span class="avatar avatar-sm rounded-circle ml-3">
									<img alt="Image placeholder" src="../assets/images/<?= $avatar ?>">
								</span>
							</div>

						</a>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
							<div class=" dropdown-header noti-title">
								<h6 class="text-overflow m-0">Welcome!</h6>
							</div>
							<a href="profile_edit.php" class="dropdown-item">
								<i class="ni ni-single-02"></i>
								<span>My profile</span>
							</a>
							<a href="setting.php" class="dropdown-item">
								<i class="ni ni-settings-gear-65"></i>
								<span>Settings</span>
							</a>

							<div class="dropdown-divider"></div>
							<a href="#!" class="dropdown-item">
								<i class="ni ni-user-run"></i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Header -->


		<!-- <script>
			document.addEventListener("DOMContentLoaded", function () {
				const currentPage = window.location.pathname.split("/").pop();
				const links = {
					"index.php": "dashboard-link",
					"kost.php": "kost-link"
				};
				if (links[currentPage]) {
					document.getElementById(links[currentPage]).classList.add("active");
				}
			}); -->
		</script>