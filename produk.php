<?php

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Buat variabel yang menampung isi dari function query
$produk = query("SELECT*FROM tb_produk");

// Cek bila tombol cari diklik
if (isset($_POST["cari"])) {
    $produk = cari($_POST["keyword"]);
}

// Cek bila ada kategori makanan yang dikirm dari home
if (isset($_GET["kategori_makanan"])) {
    $produk = kategorimakanan("Makanan");
}

// Cek bila ada kategori minuman yang dikirm dari home
if (isset($_GET["kategori_minuman"])) {
    $produk = kategoriminuman("Minuman");
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

    <title>Halaman Products</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <?php include "includes/navbar.php" ?>
    <!-- Akhir Navbar -->

    <!-- Mulai Container Products -->
    <div class="container" style="margin-top:72px;">

        <hr>

        <!-- Mulai Kategori & Pencarian Produk -->
        <div class="row">


            <!-- Mulai Kategori Makanan & Minuman -->
            <div class="col-md-6 d-flex">
                <h5 class="mb-0" style="margin-top:5px ;">KATEGORI : </h5>
                <form action="" method="POST" class="ms-2">
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
            <div class="col-md-6">
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
        <!-- Akhir Kategori & Pencarian Produk -->

        <hr>

        <!-- Mulai Produk -->
        <div class="row">
            <?php foreach ($produk as $pro) { ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-2">
                        <img src="img/<?php echo $pro["gambar_produk"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pro["nama_produk"]; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rp. <?php echo number_format($pro["harga_produk"], 0, ',', '.'); ?></li>
                        </ul>
                        <div class="card-body">
                            <a href="produk-detail.php?id_produk=<?php echo $pro["id_produk"]; ?>" class="btn btn-dark">Details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Akhir Produk -->

    </div>
    <!-- Akhir Container Products -->

    <!-- Mulai Footer -->
    <?php include "includes/footer.php" ?>
    <!-- Akhir Footer -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>