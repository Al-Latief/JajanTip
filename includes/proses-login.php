<?php

// Proses Login
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ambil semua data pengguna berdasarkan username
    $result = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username='$username'");

    // Cek Username
    if (mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Set session
            $_SESSION["login_pengguna"] = true;
            $_SESSION["id_pengguna"] = $row["id_pengguna"]; // Simpan id_pengguna di session
            $_SESSION["username"] = $row["username"]; // Simpan username di session
            // Pindahkan ke halaman index
            echo "<script>
                            alert('Terimakasih. Login akun anda berhasil!');
                            document.location.href = 'index.php';
                        </script>";
            exit;
        } else {
            $error = "Password yang anda masukkan salah!";
        }
    } else {
        $error = "Username yang anda masukkan tidak ditemukan!";
    }
}
