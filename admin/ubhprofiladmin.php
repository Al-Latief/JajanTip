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

// Tangkap id_admin dari GET
$id_admin = $_GET["id_admin"];

// Buat variabel yang menampung isi dari function query
$admin = query("SELECT * FROM tb_admin WHERE id_admin = $id_admin")[0];

// Ambil data pengguna dari database
$id_admin = $_SESSION["id_admin"]; // Pastikan Anda menyimpan id_admin di session saat login
$user = query("SELECT * FROM tb_admin WHERE id_admin = $id_admin")[0];

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Ambil data dari form
    $id_admin = htmlspecialchars($_POST["id_admin"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Update data pengguna
    if (ubahprofiladmin($id_admin, $username, $password) > 0) {
        echo "<script>
                alert('Profil berhasil diubah!');
                document.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Profil gagal diubah!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/linkcss.php"; ?>
    <title>JajanTip || Admin - Ubah Profil Admin</title>
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
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Mulai Ubah Profil Admin -->
    <div class="container">
        <div class="row justify-content-center" style="margin-top:90px;">
            <div class="col-md-7">

                <!-- Mulai Card Ubah Profil Admin -->
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="text-center m-0">UBAH PROFIL ADMIN</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="">
                                <input type="hidden" class="form-control" id="" name="id_admin" value="<?php echo $admin['id_admin']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <!-- Akhir Card Ubah Profil Admin -->

            </div>
        </div>
    </div>
    <!-- Akhir Ubah Profil Admin -->

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