<?php

// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Proses Contact
include "includes/proses-contact.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap CSS -->
    <?php include "includes/linkcss.php"; ?>

    <title>Halaman Contact Me</title>
</head>

<body style="background-color: #ffffb3;">

    <!-- Mulai Navbar -->
    <?php include "includes/navbar.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Mulai Container Contact Me -->
    <div class="container mb-4">

        <div class="row justify-content-center" style="margin-top:94px;">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="text-center m-0">FORMULIR KONTAK</h5>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION["login_pengguna"]) && $_SESSION["login_pengguna"] === true): ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama_kontak" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email" name="email_kontak" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="pesan" rows="3" name="pesan" required></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-warning">Kirim</button>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-warning" role="alert">
                                Anda harus <a href="login.php" class="alert-link">login pengguna</a> terlebih dahulu untuk mengirim pesan.
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="text-center m-0">Semua informasi dijaga kerahasiaannya.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Akhir Container Contact Me -->

    <!-- Mulai Footer -->
    <?php include "includes/footer.php"; ?>
    <!-- Akhir Footer -->

    <!-- Link Bootstrap Java Script -->
    <?php include "includes/linkjavascript.php"; ?>

</body>

</html>