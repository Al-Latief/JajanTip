<?php
// Menghubungkan fungsi dan komponen lain jika diperlukan
include "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <?php include "includes/linkcss.php"; ?>
</head>

<body style="background-color: #ffffb3;">

    <!-- Navbar -->
    <?php include "includes/navbar.php"; ?>

    <!-- Konten Utama -->
    <div class="container text-center" style="margin-top: 100px; margin-bottom: 265px;">
        <h1>Selamat Datang di JajanTip!</h1>
        <p class="lead">Kami menyediakan berbagai produk makanan dan minuman terbaik untuk Anda.</p>
        <a href="produk.php" class="btn btn-primary btn-lg mt-3">Lihat Produk</a>
    </div>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>