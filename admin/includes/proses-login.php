<?php

// Proses Login
// Cek apakah ada cookie dari tombol remember me
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM tb_admin WHERE id_admin = $id");
    $row = mysqli_fetch_assoc($result);

    // Cek cookie username(key) sama dengan username di database atau tidak
    if ($key === hash("sha256", $row["username"])) {
        // Buat session login
        $_SESSION["login"] = true;
        $_SESSION["id_admin"] = $row["id_admin"]; // Simpan id_admin di session
    }
}

// Cek apakah ada session login, kalo ada lempar ke halaman tampil_data
if (isset($_SESSION["login"])) {
    header("Location: produk.php");
    exit;
}

// Cek Username, Password, Set Session & Set Cookie
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ambil semua data users berdasarkan username
    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username'");

    // Cek Username
    if (mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Set session
            $_SESSION["login"] = true;
            $_SESSION["id_admin"] = $row["id_admin"]; // Simpan id_admin di session
            // Cek Remember Me
            if (isset($_POST["remember"])) {
                // Set cookie
                setcookie("id", $row["id_admin"], time() + 60, "/");
                setcookie("key", hash("sha256", $row["username"]), time() + 60, "/");
            }
            // Pindahkan ke halaman index
            header("Location: produk.php");
            exit;
        } else {
            echo "<p style='color:red; font-style:italic;'>Password yang anda masukkan salah !</p>";
        }
    } else {
        echo "<p style='color:red; font-style:italic;'>Username yang anda masukkan tidak ditemukan !</p>";
    }
}
