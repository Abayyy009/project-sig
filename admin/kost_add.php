<?php include "_header.php"; ?>

<div class="header bg-gradient-success pb-8 pt-2 pt-md-7">
	<div class="container-fluid px-4">
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active text-dark">Tambah Kost</li>
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

		<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="desc">Description</label>
					<input type="text" name="desc" id="desc" class="form-control">
				</div>

				<div class="form-group">
					<label for="info">Information</label>
					<textarea name="info" id="info" class="form-control"></textarea>
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
					<input type="file" name="image" id="image" class="form-control-file">
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="lat">Latitude</label>
						<input type="text" name="lat" id="lat" class="form-control" required>
					</div>

					<div class="form-group col-md-6">
						<label for="lng">Longitude</label>
						<input type="text" name="lng" id="lng" class="form-control" required>
					</div>
				</div>

				<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>

			<?php
			if (isset($_POST['simpan'])) {
				$title = trim($_POST['title']);
				$desc = trim($_POST['desc']);
				$info = trim($_POST['info']);
				$lat = trim($_POST['lat']);
				$lng = trim($_POST['lng']);

				$file_name = '';
				if ($_FILES['image']['name'] != '') {
					$img = $_FILES['image']['name'];
					$ext = pathinfo($img, PATHINFO_EXTENSION);
					$file_name = "img-" . time() . "." . $ext;
					$target_dir = "../assets/images/maps/";
					move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $file_name);
				}

				$row = [
					'title' => $title,
					'description' => $desc,
					'info' => $info,
					'image' => $file_name,
					'lat' => $lat,
					'lng' => $lng
				];

				$sql = "INSERT INTO maps (title, description, info, image, latitude, longitude, created_at) 
                        VALUES (:title, :description, :info, :image, :lat, :lng, NOW())";
				$status = $pdo->prepare($sql)->execute($row);

				if ($status) {
					echo "<script>window.location='kost.php';</script>";
				} else {
					echo "<div class='alert alert-danger'>Gagal menyimpan data!</div>";
				}
			}
			?>
		</div>
	</div>



	<?php include "_footer.php"; ?>