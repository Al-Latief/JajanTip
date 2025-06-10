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
$admin = query("SELECT*FROM tb_admin");

// Buat variabel yang menampung id admin yang sedang login saat ini
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
    <title>JajanTip || Admin - Admin</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <?php include "includes/navbar.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Mulai Container Admin -->
    <div class="container" style="margin-top:57px;">

        <!-- Mulai Pencarian & Tabel Kontak -->
        <div class="row">
            <div class="col-md-12">
                <hr>

                <!-- Mulai Tambah Admin & Pencarian Kontak -->
                <div class="row">

                    <!-- Mulai Tambah Admin -->
                    <div class="col-md-6">
                        <a href="../registration" class="btn btn-primary">Tambah Admin</a>
                    </div>
                    <!-- Akhir Tambah Admin -->

                    <!-- Mulai Pencarian Kontak -->
                    <div class="col-md-6">

                    </div>
                    <!-- Akhir Pencarian Kontak -->

                </div>
                <!-- Akhir Tambah Admin & Pencarian Kontak -->

                <hr>

                <!-- Mulai Tabel Responsive Kontak -->
                <div class="table-responsive" style="height: 393px; overflow-y:auto;">
                    <!-- Mulai Tabel Kontak -->
                    <table class="table table-dark table-striped table-hover table-bordered">

                        <!-- Mulai Header Tabel Kontak -->
                        <tr class="text-center align-middle" style="position: sticky; top: 0; z-index: 1;">
                            <th scope="col" class="col-1">No</th>
                            <th scope="col" class="col-3">Username</th>
                            <th scope="col" class="col-4">Password</th>

                            <th scope="col" class="col-4">Aksi</th>
                        </tr>
                        <!-- Akhir Header Tabel Kontak -->

                        <!-- Mulai Isi Tabel Kontak -->
                        <!-- Mulai Perulangan untuk ID Nomer -->
                        <?php $i = 1; ?>
                        <!-- Mulai Perulangan Tabel Kontak -->
                        <?php foreach ($admin as $adm) { ?>
                            <tr class="text-center align-middle">
                                <td scope="row"><?php echo $i; ?></td>
                                <td><?php echo $adm["username"]; ?></td>
                                <td><?php echo $adm["password"]; ?></td>

                                <td>
                                    <a href="ubhprofiladmin.php?id_admin=<?= $adm['id_admin']; ?>" class="btn btn-warning">Ubah Profil</a>
                                    <a href="hpsprofiladmin.php?id_admin=<?= $adm['id_admin']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <!-- Akhir Perulangan untuk ID Nomer -->
                        <?php } ?>
                        <!-- Akhir Perulangan Tabel Kontak -->
                        <!-- Akhir Isi Tabel Kontak -->

                    </table>
                    <!-- Akhir Tabel Kontak -->
                </div>
                <!-- Akhir Tabel Responsive Kontak -->

                <hr>

            </div>
        </div>
        <!-- Akhir Pencarian & Tabel Kontak -->

    </div>
    <!-- Akhir Container Admin -->

    <!-- Mulai Footer -->
    <footer class="footer mt-auto py-3 bg-dark fixed-bottom">
        <div class="container">
            <span class="text-light">Copyright © 2025 Muhammad Latip.</span>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>