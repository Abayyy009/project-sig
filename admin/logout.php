<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Regenerasi session ID untuk mencegah session fixation
session_start();
session_regenerate_id(true);

// Redirect ke halaman login secara aman
header("Location: login.php");
exit();