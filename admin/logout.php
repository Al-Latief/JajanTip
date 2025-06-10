<?php
// Memulai session
session_start();

// Memastikan session terhapus
session_unset();

// Lebih yakinkan lagi session nya telah terhapus
$_SESSION = [];

// Menghancurkan session
session_destroy();

// Hapus semua cookie
setcookie("id", "", time() - 3600, "/");
setcookie("key", "", time() - 3600, "/");


// Lempar ke halaman login
header("Location: login.php");
