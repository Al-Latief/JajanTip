<?php
// Mulai session
session_start();

// Koneksi ke database
include "includes/functions.php";

// Proses register
include "includes/proses-register.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Registrasi</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Container Registrasi -->
    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="p-4 shadow rounded bg-secondary text-white">
                    <h2 class="text-center">REGISTRASI PENGGUNA</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <!-- Input Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <!-- Input Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <!-- Input Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <!-- Tombol Registrasi -->
                        <button type="submit" name="register" class="btn btn-primary">Daftar Pengguna</button>
                        <!-- Tombol Login -->
                        <p class="mt-3">Sudah punya akun? <a href="login.php" class="text-white">Login di sini</a></p>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Akhir Container Registrasi -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>