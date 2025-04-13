<?php
include "_header.php";
include "../+koneksi.php"; // Pastikan koneksi ke database sudah benar

// Ambil total data dari tabel maps menggunakan PDO
try {
	$stmt = $pdo->query("SELECT COUNT(*) AS total_maps FROM maps");
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	$total_maps = $data['total_maps'];
	$kostStmt = $pdo->query("SELECT title FROM maps");
	$kostList = $kostStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	die("Error: " . $e->getMessage());
}
?>

<div class="header bg-gradient-success pb-8 pt-2 pt-md-7">
	<div class="container-fluid px-4">
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active text-dark">Dashboard </li>
		</ol>
		<div class="header-body">

			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4 mb-xl-0">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kost</h5>
									<span class="h2 font-weight-bold mb-0"><?php echo $total_maps; ?></span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
										<i class="fas fa-home"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span class="text-nowrap">Sejak bulan lalu</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4 mb-xl-0">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Pengguna Terdaftar
									</h5>
									<span class="h2 font-weight-bold mb-0">89</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
										<i class="fas fa-users"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
								<span class="text-nowrap">Sejak minggu lalu</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4 mb-xl-0">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Kost Aktif</h5>
									<span class="h2 font-weight-bold mb-0">121</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
										<i class="fas fa-check-circle"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.72%</span>
								<span class="text-nowrap">Terakhir diperbarui</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4 mb-xl-0">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Admin</h5>
									<span class="h2 font-weight-bold mb-0">3</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-info text-white rounded-circle shadow">
										<i class="fas fa-user-shield"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-muted">Status aktif semua</span>
							</p>
						</div>
					</div>
				</div>
			</div> <!-- End row -->
		</div>
	</div>
</div>

<!-- Page content -->
<div class="container-fluid mt--7">


	<!-- Ringkasan Data -->

	<br>

	<!-- Daftar Nama Kost -->
	<?php
	// Ambil jumlah total data
	$queryTotal = $pdo->query("SELECT COUNT(*) FROM maps");
	$totalData = $queryTotal->fetchColumn();

	// Konfigurasi pagination
	$limit = 10; // Jumlah data per halaman
	$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
	$start = ($page > 1) ? ($page * $limit) - $limit : 0;
	$totalPages = ceil($totalData / $limit);

	// Ambil data sesuai halaman
	$query = $pdo->prepare("SELECT * FROM maps ORDER BY id DESC LIMIT :start, :limit");
	$query->bindValue(':start', $start, PDO::PARAM_INT);
	$query->bindValue(':limit', $limit, PDO::PARAM_INT);
	$query->execute();
	$KostList = $query->fetchAll(PDO::FETCH_ASSOC);
	?>

	<div class="card mb-4">
		<div class="card-body">
			<h4 class="card-title text-dark"><i class="fas fa-home"></i> Daftar Kost</h4>
			<div class="table-responsive pt-3">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th style="width: 10%;">No</th>
							<th style="width: 40%;">Nama Kost</th>
							<th style="width: 50%;">Alamat</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($KostList)): ?>
							<?php $no = $start + 1; ?>
							<?php foreach ($KostList as $Kost): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= htmlspecialchars($Kost['title']) ?></td>
									<td><?= htmlspecialchars($Kost['description']) ?></td>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="3" class="text-center">Tidak ada data</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>

			<!-- Pagination Argon Style -->
			<nav class="mt-4">
				<ul class="pagination justify-content-center mb-0">
					<?php if ($page > 1): ?>
						<li class="page-item">
							<a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">
								<span class="fas fa-angle-left"></span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
					<?php endif; ?>

					<?php for ($i = 1; $i <= $totalPages; $i++): ?>
						<li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
							<a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
						</li>
					<?php endfor; ?>

					<?php if ($page < $totalPages): ?>
						<li class="page-item">
							<a class="page-link" href="?page=<?= $page + 1 ?>">
								<span class="fas fa-angle-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</div>

	<?php include "_footer.php"; ?>

	<!-- Chart.js Script -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const ctx = document.getElementById('argonChart').getContext('2d');
			new Chart(ctx, {
				type: 'line',
				data: {
					labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September'],
					datasets: [
						{
							label: 'Data Y',
							data: [1, 14, 5, 4, 5, 1, 14, 5, 5],
							borderColor: '#4e73df',
							backgroundColor: 'rgba(78, 115, 223, 0.2)',
							borderWidth: 2,
							pointRadius: 5
						},
						{
							label: 'Data X',
							data: [5, 2, 10, 1, 9, 5, 2, 10, 8],
							borderColor: '#1cc88a',
							backgroundColor: 'rgba(28, 200, 138, 0.2)',
							borderWidth: 2,
							pointRadius: 5
						}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: true,
							position: 'top'
						}
					},
					scales: {
						x: {
							ticks: {
								color: '#fff'
							}
						},
						y: {
							ticks: {
								color: '#fff'
							}
						}
					}
				}
			});
		});
	</script>