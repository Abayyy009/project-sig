<?php include "_header.php"; ?>

<div class="header bg-gradient-success pb-8 pt-2 pt-md-7">
	<div class="container-fluid px-4">
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active text-dark">Edit Profile</li>
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
		$query = $pdo->query("SELECT * FROM users WHERE id = '$_SESSION[userid]'");
		$data = $query->fetch();
		?>
		<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $data['id'] ?>">

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" name="nama" id="nama" class="form-control" value="<?= $data['name'] ?>" required>
				</div>

				<div class="form-group">
					<label for="user">Username</label>
					<input type="text" name="user" id="user" class="form-control" value="<?= $data['username'] ?>"
						required>
				</div>

				<div class="form-group">
					<label for="pass">Password</label>
					<input type="text" name="pass" id="pass" class="form-control">
					<small class="text-muted">(Biarkan kosong jika tidak mengganti password)</small>
				</div>

				<div class="form-group">
					<label for="avatar">Avatar</label>
					<input type="file" name="avatar" id="avatar" class="form-control-file">
					<div class="mt-2">
						<?php if ($data['avatar'] == ''): ?>
							<img src="../assets/images/user.png" width="40px">
						<?php else: ?>
							<img src="../assets/images/users/<?= $data['avatar'] ?>" width="40px">
						<?php endif; ?>
						<small class="text-muted">(Biarkan kosong jika tidak mengganti avatar)</small>
					</div>
				</div>

				<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
				<a href="./index.php" class="btn btn-danger">Cancel</a>
			</form>

			<?php
			if (isset($_POST['simpan'])) {
				$id = trim($_POST['id']);
				$nama = trim($_POST['nama']);
				$user = trim($_POST['user']);
				$pass = trim($_POST['pass']);

				if ($_FILES['avatar']['name'] != '') {
					$img = $_FILES['avatar']['name'];
					$ekstensi = explode(".", $img);
					$file_name = "img-" . round(microtime(true)) . "." . end($ekstensi);
					$sumber = $_FILES['avatar']['tmp_name'];
					$target_dir = "../assets/images/users/";
					$target_file = $target_dir . $file_name;

					$data = $pdo->query("SELECT * FROM users WHERE id = '$id'")->fetch();
					if ($data['avatar'] != '') {
						unlink($target_dir . $data['avatar']);
					}

					$upload = move_uploaded_file($sumber, $target_file);
					if ($upload) {
						$avatar = $file_name;
					} else {
						echo "Upload gagal";
						exit;
					}
				} else {
					$avatar = $data['avatar'];
				}

				$row = [
					'name' => $nama,
					'username' => $user,
					'avatar' => $avatar,
					'id' => $id
				];

				if ($pass != '') {
					$row['password'] = password_hash($pass, PASSWORD_BCRYPT);
					$sql = "UPDATE users SET name=:name, username=:username, avatar=:avatar, password=:password, updated_at=now() WHERE id=:id";
				} else {
					$sql = "UPDATE users SET name=:name, username=:username, avatar=:avatar, updated_at=now() WHERE id=:id";
				}

				$status = $pdo->prepare($sql)->execute($row);

				if ($status) {
					echo "<script>alert('Profil berhasil diubah'); window.location='./index.php';</script>";
				}
			}
			?>
		</div>
	</div>


	<?php include "_footer.php"; ?>