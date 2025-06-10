<?php

// Jangan lupa ! kalo mau menggunakan session
// Harus ada session start
session_start();

// Cek apakah ada session login agar bisa masuk ke halaman ini
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Buat variabel yang menampung isi dari function query
$produk = query("SELECT * FROM tb_produk");


// Buat variabel yang menampung id admin dari session yang sedang login saat ini
$id_admin = $_SESSION["id_admin"]; // Pastikan Anda menyimpan id_admin di session saat login
$user = query("SELECT * FROM tb_admin WHERE id_admin = $id_admin")[0];

// Cek bila tombol cari diklik
if (isset($_POST["cari"])) {
    $produk = cari($_POST["keyword"]);
}

// Cek bila tombol kategori makanan diklik
if (isset($_POST["kategori_makanan"])) {
    $produk = kategorimakanan($_POST["makanan"]);
}

// Cek bila tombol kategori minuman diklik
if (isset($_POST["kategori_minuman"])) {
    $produk = kategoriminuman($_POST["minuman"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>JajanTip || Admin - Produk</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <?php include "includes/navbar.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Mulai Container Admin -->
    <div class="container" style="margin-top:57px;">

        <!-- Mulai Tambah Produk, Pencarian & Tabel Produk -->
        <div class="row">
            <div class="col-md-12">
                <hr>

                <!-- Mulai Tambah Produk & Pencarian Produk -->
                <div class="row">

                    <!-- Mulai Tambah Produk -->
                    <div class="col-md-6">
                        <a href="tmbproduk.php" class="btn btn-primary border">Tambah Produk</a>
                    </div>
                    <!-- Akhir Tambah Produk -->

                    <!-- Mulai Kategori Makanan & Minuman -->
                    <div class="col-md-3 d-flex">
                        <form action="" method="POST">
                            <input type="hidden" name="makanan" value="Makanan">
                            <button type="submit" name="kategori_makanan" class="btn btn-primary border">Makanan</button>
                        </form>
                        <form action="" method="POST">
                            <input type="hidden" name="minuman" value="Minuman">
                            <button type="submit" name="kategori_minuman" class="btn btn-primary border">Minuman</button>
                        </form>
                    </div>
                    <!-- Akhir Kategori Makanan & Minuman -->

                    <!-- Mulai Pencarian Produk -->
                    <div class="col-md-3">
                        <form action="" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" size="30" autofocus
                                    placeholder="Masukkan keyword pencarian....."
                                    autocomplete="off"
                                    class="form-control">
                                <button type="submit" name="cari" class="btn btn-primary border">Cari !</button>
                            </div>
                        </form>
                    </div>
                    <!-- Akhir Pencarian Produk -->

                </div>
                <!-- Akhir Tambah Produk & Pencarian Produk -->

                <hr>

                <!-- Mulai Tabel Responsive Produk -->
                <div class="table-responsive" style="height: 393px; overflow-y:auto;">
                    <!-- Mulai Tabel Produk -->
                    <table class="table table-dark table-striped table-hover table-bordered">

                        <!-- Mulai Header Tabel Produk -->
                        <tr class="text-center align-middle" style="position: sticky; top: 0; z-index: 1;">
                            <th scope="col" class="col-0">No</th>
                            <th scope="col" class="col-1">Gambar</th>
                            <th scope="col" class="col-2">Nama</th>
                            <th scope="col" class="col-0">Stok</th>
                            <th scope="col" class="col-1">Harga</th>
                            <th scope="col" class="col-1">Kategori</th>
                            <th scope="col" class="col-1">Tanggal Ditambahkan</th>
                            <th scope="col" class="col-4">Deskripsi</th>
                            <th scope="col" class="col-2">Aksi</th>
                        </tr>
                        <!-- Akhir Header Tabel Produk -->

                        <!-- Mulai Isi Tabel Produk -->
                        <!-- Mulai Perulangan untuk ID Nomer -->
                        <?php $i = 1; ?>
                        <!-- Mulai Perulangan Tabel Produk -->
                        <?php foreach ($produk as $pro) { ?>
                            <tr class="text-center align-middle">
                                <td scope="row"><?php echo $i; ?></td>
                                <td><img src="img/<?php echo $pro["gambar_produk"]; ?>" alt="" style="width: 70px;"></td>
                                <td><?php echo $pro["nama_produk"]; ?></td>
                                <td><?php echo $pro["stok_produk"]; ?></td>
                                <td>Rp. <?php echo number_format($pro["harga_produk"], 0, ',', '.'); ?></td>
                                <td><?php echo $pro["kategori"]; ?></td>
                                <td><?php echo $pro["tanggal_ditambahkan"]; ?></td>
                                <td><?php echo $pro["deskripsi_produk"]; ?></td>
                                <td>
                                    <a href="ubhproduk.php?id_produk=<?php echo $pro["id_produk"]; ?>" class="btn btn-warning">Ubah</a>
                                    <a href="hpsproduk.php?id_produk=<?php echo $pro["id_produk"]; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <!-- Akhir Perulangan untuk ID Nomer -->
                        <?php } ?>
                        <!-- Akhir Perulangan Tabel Produk -->
                        <!-- Akhir Isi Tabel Produk -->

                    </table>
                    <!-- Akhir Tabel Produk -->
                </div>
                <!-- Akhir Tabel Responsive Produk -->

                <hr>

            </div>
        </div>
        <!-- Akhir Tambah Produk, Pencarian & Tabel Produk -->

    </div>
    <!-- Akhir Container Admin -->

    <!-- Mulai Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- Akhir Footer -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>