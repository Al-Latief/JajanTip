<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Tangkap id_pengguna dari GET
$id_pengguna = $_GET["id_pengguna"];

// Ambil data pengguna dari database
$pengguna = query("SELECT * FROM tb_pengguna WHERE id_pengguna = $id_pengguna")[0];

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Ambil data dari form
    $id_pengguna = htmlspecialchars($_POST["id_pengguna"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Update data pengguna
    if (ubahprofilpengguna($id_pengguna, $username, $password) > 0) {
        echo "<script>
                alert('Profil berhasil diubah!');
                document.location.href = 'pengguna.php';
              </script>";
    } else {
        echo "<script>
                alert('Profil gagal diubah!');
              </script>";
    }
}

// Ambil data admin yang sedang login
$id_admin = $_SESSION["id_admin"];
$user = query("SELECT * FROM tb_admin WHERE id_admin = $id_admin")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/linkcss.php"; ?>
    <title>JajanTip || Admin - Ubah Profil Pengguna</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 me-0" href="">Selamat Datang, <?php echo $user['username']; ?>!</a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="pengguna.php">Pengguna</a>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Mulai Ubah Profil Pengguna -->
    <div class="container">
        <div class="row justify-content-center" style="margin-top:90px;">
            <div class="col-md-7">

                <!-- Mulai Card Ubah Profil Pengguna -->
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="text-center m-0">UBAH PROFIL PENGGUNA</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="">
                                <input type="hidden" class="form-control" name="id_pengguna" value="<?php echo $pengguna['id_pengguna']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $pengguna['username']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <a href="pengguna.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
                <!-- Akhir Card Ubah Profil Pengguna -->

            </div>
        </div>
    </div>
    <!-- Akhir Ubah Profil Pengguna -->

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