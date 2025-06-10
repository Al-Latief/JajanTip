<?php

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Tangkap id_produk dari GET
$id_produk = $_GET["id_produk"];

// Buat variabel yang menampung isi dari function query
$produk = query("SELECT*FROM tb_produk WHERE id_produk=$id_produk")[0];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Detail Produk</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <?php include "includes/navbar.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Mulai Container Detail Produk -->
    <div class="container" style="margin-top:60px;">

        <div class="row">

            <div class="col-md-12" style="margin-bottom:7px;">
                <hr>
                <h2 class="text-center bg-dark text-light rounded">DETAIL PRODUK</h2>
                <hr>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <img src="img/<?php echo $produk['gambar_produk'] ?>" alt="" class="card-image-top img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo $produk['nama_produk'] ?></h3>
                    </div>
                    <div class="card-body">
                        <p>Stok : <?php echo $produk["stok_produk"]; ?></p>
                        <p>Harga : Rp. <?php echo number_format($produk["harga_produk"], 0, ',', '.'); ?></p>
                        <p>Kategori : <?php echo $produk["kategori"]; ?></p>
                        <p>Tanggal Ditambahkan : <?php echo $produk["tanggal_ditambahkan"]; ?></p>
                        <p>Deskripsi Produk : <?php echo $produk["deskripsi_produk"]; ?></p>
                    </div>
                    <div class="card-footer">
                        <?php if (isset($_SESSION["login_pengguna"]) && $_SESSION["login_pengguna"] === true): ?>
                            <a href="https://wa.link/u88hda" class="btn btn-success" target="_blank">Order via WhatsApp</a>
                        <?php else: ?>
                            <button class="btn btn-secondary" disabled>Login untuk Order</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top:2px; margin-bottom:4px;">
                <hr>
            </div>

        </div>

    </div>
    <!-- Akhir Container Detail Produk -->

    <!-- Mulai Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- Akhir Footer -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>