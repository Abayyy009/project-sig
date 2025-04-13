<?php include "_header.php"; ?>

<div class="header bg-gradient-success pb-8 pt-2 pt-md-7">
	<div class="container-fluid px-4">
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active text-dark">Settigs</li>
		</ol>
		<div class="header-body">
		</div>
	</div>
</div>
<div class="container-fluid mt--7">
	<div class="card">
		<div class="card-header d-flex justify-content-end align-items-center">
			<a href="kost.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> kembali</a>
		</div>
		<?php
		$query = $pdo->query("SELECT * FROM settings LIMIT 1");
		$data = $query->fetch();
		?>

		<div class="card-body">
			<form action="" method="post">

				<div class="form-group">
					<label for="web_title">Web Title</label>
					<input type="text" name="web_title" id="web_title" class="form-control"
						value="<?= $data['web_title'] ?>" required>
				</div>

				<div class="form-group">
					<label for="web_desc">Web Description</label>
					<textarea name="web_desc" id="web_desc" class="form-control" rows="4"
						required><?= $data['web_description'] ?></textarea>
				</div>

				<div class="form-group">
					<label for="zoom">Map Zoom</label>
					<input type="number" name="zoom" id="zoom" class="form-control" value="<?= $data['map_zoom'] ?>">
				</div>

				<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
				<a href="./index.php" class="btn btn-danger">Cancel</a>
			</form>

			<?php
			if (isset($_POST['simpan'])) {
				$web_title = trim($_POST['web_title']);
				$web_desc = trim($_POST['web_desc']);
				$zoom = trim($_POST['zoom']);

				$row = [
					'web_title' => $web_title,
					'web_desc' => $web_desc,
					'zoom' => $zoom
				];

				$sql = "UPDATE settings SET web_title=:web_title, web_description=:web_desc, map_zoom=:zoom, updated_at=now()";
				$status = $pdo->prepare($sql)->execute($row);

				if ($status) {
					echo "<script>alert('Data setting tersimpan'); window.location='./index.php';</script>";
				}
			}
			?>
		</div>
	</div>
</div>

<?php include "_footer.php"; ?>