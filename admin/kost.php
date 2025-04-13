<?php include "_header.php"; ?>

<div class="header bg-gradient-success pb-8 pt-2 pt-md-7">
	<div class="container-fluid px-4">
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active text-dark">Daftar Kost</li>
		</ol>
		<div class="header-body">
		</div>
	</div>
</div>
<div class="container-fluid mt--7">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h6 class="text-uppercase text-primary mb-0">Daftar Kost</h6>
			<a href="Kost_add.php" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Tambah</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table align-items-center mb-0" id="dataTable">
					<thead>
						<tr>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">#</th>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">Title</th>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">Description</th>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">Information</th>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">Image Cover</th>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">
								Latitude<br>Longitude
							</th>
							<th class="text-uppercase text-dark text-xxs font-weight-bolder">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$query = $pdo->query("SELECT * FROM maps");
						while ($data = $query->fetch()) { ?>
							<tr>
								<td><?= $no++ ?>.</td>
								<td
									style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
									<a href="https://www.google.com/maps/search/?api=1&query=<?= $data['latitude'] . ',' . $data['longitude'] ?>"
										target="_blank">
										<?= htmlspecialchars($data['title']) ?>
									</a>
								</td>
								<td
									style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
									<?= htmlspecialchars($data['description']) ?>
								</td>
								<td
									style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
									<?= htmlspecialchars_decode($data['info']); ?>
								</td>
								<td>
									<?php if ($data['image']) { ?>
										<img src="../assets/images/maps/<?= htmlspecialchars($data['image']) ?>" width="100">
									<?php } else {
										echo "<i>No Image</i>";
									} ?>
								</td>
								<td><?= $data['latitude'] ?><br><?= $data['longitude'] ?></td>
								<td>
									<a href="Kost_edit.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm"><i
											class="fas fa-edit"></i></a>
									<a href="Kost_del.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
										onclick="return confirm('Yakin menghapus data?')"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<?php include "_footer.php"; ?>

	<script>
		$(document).ready(function () {
			$('#dataTable').DataTable({
				"scrollY": false,
				"scrollX": false
			});
		});
	</script>