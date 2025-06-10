<?php

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Proses Register
include "includes/proses-register.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Registrasi Admin</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Container Registrasi Admin -->
    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="p-4 shadow rounded bg-secondary text-white">
                    <h2 class="text-center">REGISTRASI</h2>
                    <form action="" method="POST">
                        <!-- Input Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username" name="username" required>
                        </div>
                        <!-- Input Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" aria-describedby="password" name="password" required>
                        </div>
                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password2" aria-describedby="password2" name="password2" required>
                        </div>
                        <!-- Tombol Registrasi -->
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" name="registrasi" class="btn btn-primary">Registrasi</button>
                        </div>
                        <!-- <p class="lead text-center mb-3">Sudah punya akun?</p> -->
                        <!-- Tombol Login -->
                        <div class="d-flex justify-content-center mb-0">
                            <a href="tbadmin.php" class="btn btn-warning text-white">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Akhir Container Registrasi Admin -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>