<?php include "_header.php"; ?>

<div class="header bg-gradient-success pb-8 pt-2 pt-md-7">
	<div class="container-fluid px-4">
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active text-dark">Edit Data Kost</li>
		</ol>
		<div class="header-body">
		</div>
	</div>
</div>
<div class="container-fluid mt--7">
	<div class="card">
		<div class="card-header d-flex justify-content-end align-items-center">
			<a href="Kost.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i>kembali</a>
		</div>


		<?php
		$query = $pdo->query("SELECT * FROM maps WHERE id = '$_GET[id]'");
		$data = $query->fetch();
		?>
		<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $data['id'] ?>">

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" value="<?= $data['title'] ?>"
						required>
				</div>

				<div class="form-group">
					<label for="desc">Description</label>
					<input type="text" name="desc" id="desc" class="form-control" value="<?= $data['description'] ?>">
				</div>
				<div class="form-group">
					<label for="info">Information</label>
					<textarea name="info" id="info"
						class="form-control"><?= htmlspecialchars($data['info']); ?></textarea>

				</div>

				<!-- Tambahkan TinyMCE -->
				<script
					src="https://cdn.tiny.cloud/1/6vw8sv0fxewedu277b04cx3xdobbntta1lu3bggbu1k5zjck/tinymce/6/tinymce.min.js"
					referrerpolicy="origin"></script>
				<script>
					tinymce.init({
						selector: '#info',
						height: 300,
						menubar: false,
						plugins: 'advlist autolink lists link charmap preview anchor',
						toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
						content_css: 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css'
					});
				</script>
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="image" id="image" class="form-control">
					<?php if ($data['image']): ?>
						<img src="../assets/images/maps/<?= $data['image'] ?>" width="100" class="mt-2">
						<small class="d-block">(Kosongkan jika tidak ingin mengganti gambar)</small>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<label for="lat">Latitude</label>
					<input type="text" name="lat" id="lat" class="form-control" value="<?= $data['latitude'] ?>"
						required>
				</div>

				<div class="form-group">
					<label for="lng">Longitude</label>
					<input type="text" name="lng" id="lng" class="form-control" value="<?= $data['longitude'] ?>"
						required>
				</div>

				<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>

			<?php
			if (isset($_POST['simpan'])) {
				$id = trim($_POST['id']);
				$title = trim($_POST['title']);
				$desc = trim($_POST['desc']);
				$info = trim($_POST['info']);
				$lat = trim($_POST['lat']);
				$lng = trim($_POST['lng']);

				if ($_FILES['image']['name'] != '') {
					$img = $_FILES['image']['name'];
					$ext = pathinfo($img, PATHINFO_EXTENSION);
					$file_name = "img-" . time() . "." . $ext;
					$target_dir = "../assets/images/maps/";

					$old_image = $data['image'];
					if ($old_image && file_exists($target_dir . $old_image)) {
						unlink($target_dir . $old_image);
					}

					move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $file_name);

					$sql = "UPDATE maps SET title = ?, description = ?, info = ?, image = ?, latitude = ?, longitude = ?, updated_at = NOW() WHERE id = ?";
					$stmt = $pdo->prepare($sql);
					$status = $stmt->execute([$title, $desc, $info, $file_name, $lat, $lng, $id]);
				} else {
					$sql = "UPDATE maps SET title = ?, description = ?, info = ?, latitude = ?, longitude = ?, updated_at = NOW() WHERE id = ?";
					$stmt = $pdo->prepare($sql);
					$status = $stmt->execute([$title, $desc, $info, $lat, $lng, $id]);
				}

				if ($status) {
					echo "<script>window.location='Kost.php';</script>";
				} else {
					echo "<div class='alert alert-danger'>Gagal menyimpan data.</div>";
				}
			}
			?>
		</div>
	</div>


	<?php include "_footer.php"; ?>