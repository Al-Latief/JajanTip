<?php

// Proses registrasi
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Cek apakah password dan konfirmasi password sama
    if ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak sama!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah username sudah ada
        $result = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username='$username'");
        if (mysqli_num_rows($result) > 0) {
            $error = "Username sudah terdaftar!";
        } else {
            // Simpan data pengguna baru ke database
            $sql = "INSERT INTO tb_pengguna (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($conn, $sql)) {
                // Redirect ke halaman login setelah registrasi berhasil
                echo "<script>
                            alert('Terimakasih. Registrasi akun anda berhasil!');
                            document.location.href = 'login.php';
                        </script>";
                exit();
            } else {
                $error = "Terjadi kesalahan saat registrasi: " . mysqli_error($conn);
            }
        }
    }
}
