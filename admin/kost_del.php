<?php
include "../+koneksi.php";

$where = ['id' => $_GET['id']];

$data = $pdo->query("SELECT * FROM maps WHERE id = '$where[id]'")->fetch();
if($data['image'] != '') {
    unlink('../assets/images/maps/'.$data['image']);
}

$pdo->prepare("DELETE FROM maps WHERE id=:id")->execute($where);
echo "<script>window.location='kost.php';</script>";