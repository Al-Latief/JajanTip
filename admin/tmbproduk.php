<?php

// Jangan lupa ! kalo mau menggunakan session
// Harus ada session start
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Proses tambah produk
// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil di tambahkan atau tidak 
    if (tambahproduk($_POST) > 0) {
        echo "<script>
                alert('Terimakasih. Data produk yang telah anda tambahkan berhasil masuk!');
                document.location.href = 'tmbproduk.php';
            </script>";
    } else {
        echo "Data produk anda gagal Ditambahkan" . mysqli_error($conn);
    }
}

// Buat variabel yang menampung id admin dari session yang sedang login saat ini
$id_admin = $_SESSION["id_admin"]; // Pastikan Anda menyimpan id_admin di session saat login
$user = query("SELECT * FROM tb_admin WHERE id_admin = $id_admin")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Admin || Tambah Data Produk</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light fixed-top" aria-label="Thirteenth navbar example">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 me-0" href="">Selamat Datang, <?php echo $user['username']; ?>!</a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="produk.php">Tampilkan Produk</a>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <button class="btn btn-outline-light">Logout</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Mulai Container Tambah Data Produk -->
    <div class="container">

        <!-- Mulai Tentang JajanTip, Apa yang kami tawarkan,Misi kami & Kenapa memilih JajanTip -->
        <div class="row justify-content-center" style="margin-top:65px;">

            <!-- Mulai Tambah Data Produk -->
            <div class="col-md-12 text-dark rounded-2 mb-2">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 text-center">TAMBAH DATA PRODUK</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 input-group row m-0">
                                <label for="nama_produk" class="input-group-text col-3">Nama</label>
                                <input type="text" class="form-control input-group-text col-9" id="nama_produk" name="nama_produk">
                            </div>
                            <div class="mb-3 input-group row m-0">
                                <label for="kategori" class="input-group-text col-3">Kategori</label>
                                <select class="form-select input-group-text col-9" id="kategori" name="kategori">
                                    <option selected>Makanan atau Minuman ??</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>
                            <div class="mb-3 input-group row m-0">
                                <label for="harga_produk" class="input-group-text col-3">Harga</label>
                                <input type="text" class="form-control input-group-text col-9" id="harga_produk" name="harga_produk">
                            </div>
                            <div class="mb-3 input-group row m-0">
                                <label for="stok_produk" class="input-group-text col-3">Stok</label>
                                <input type="text" class="form-control input-group-text col-9" id="stok_produk" name="stok_produk">
                            </div>
                            <div class="mb-3 input-group row m-0">
                                <label for="tanggal_ditambahkan" class="input-group-text col-3">Tanggal Ditambahkan</label>
                                <input type="date" class="form-control input-group-text col-9" id="tanggal_ditambahkan" name="tanggal_ditambahkan">
                            </div>
                            <div class="mb-3 input-group row m-0">
                                <label for="gambar_produk" class="input-group-text col-3">Gambar</label>
                                <input type="file" class="form-control input-group-text col-5" id="gambar_produk" name="gambar_produk">
                                <label for="gambar_produk" class="input-group-text col-4">Format ('jpg','jpeg','png') dan Max size ( 2Mb ) </label>
                            </div>
                            <div class="mb-3 input-group row m-0">
                                <label for="deskripsi_produk" class="input-group-text col-3">Deskripsi</label>
                                <textarea class="form-control input-group-text col-9" id="deskripsi_produk" name="deskripsi_produk"></textarea>
                            </div>
                            <div class="input-group row m-0">
                                <div class="col-3"></div>
                                <button type="submit" name="submit" class="btn btn-warning col-9">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="text-center m-0">Semangat. Semoga makin jaya.</p>
                    </div>
                </div>
            </div>
            <!-- Akhir Tambah Data Produk -->



        </div>
        <!-- Mulai Tentang JajanTip, Apa yang kami tawarkan,Misi kami & Kenapa memilih JajanTip -->

    </div>
    <!-- Akhir Container Tambah Data Produk -->

    <!-- Mulai Footer -->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-light">Copyright © 2025 Muhammad Latip.</span>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>