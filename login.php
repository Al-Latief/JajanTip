<?php
// Mulai session
session_start();

// Koneksi ke database
include "includes/functions.php";

// Proses login
include "includes/proses-login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Login</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Container Login -->
    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="p-4 shadow rounded bg-secondary text-white">
                    <h2 class="text-center">LOGIN PENGGUNA</h2>
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
                        <!-- Tombol Login -->
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <!-- Tombol Home -->
                        <a href="index.php" class="btn btn-success text-decoration-none text-white">Home</a>
                        <!-- Tombol Registrasi -->
                        <a href="register.php" class="btn btn-warning text-decoration-none text-white">Register Pengguna</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Akhir Container Login -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>