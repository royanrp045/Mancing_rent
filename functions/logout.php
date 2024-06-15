<?php
session_start(); // Memulai session

// Menghapus semua variabel session
session_unset();

// Menghapus session secara total
session_destroy();

// Mengarahkan kembali ke halaman login atau halaman lain yang sesuai
header("Location: ../html/login.php");
exit;
?>
