<?php
session_start();
session_destroy();
header("Location: loginboostrap.php"); // Ganti dengan halaman loginmu
exit;
?>
