<?php

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Gunakan session_start kalo mau menggunakan $_SESSION
session_start();

// Proses Login
include "includes/proses-login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Login Admin</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Container Login Admin -->
    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="p-4 shadow rounded bg-secondary text-white">
                    <h2 class="text-center">LOGIN</h2>
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
                        <!-- Remember Me -->
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me!</label>
                        </div> -->
                        <!-- Tombol Login -->
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <!-- Tombol Registrasi -->
                        <!-- <a href="../registration/" class="btn btn-danger text-decoration-none">Registrasi</a> -->
                        <!-- Tombol Index -->
                        <a href="../index.php" class="btn btn-warning text-decoration-none text-white">Home</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Akhir Container Login Admin -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>