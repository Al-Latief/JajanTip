<?php
// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Ambil id_kontak dari GET
$id_kontak = $_GET["id_kontak"];

// Logika untuk Ubah Status Kontak
if (ubahstatuskontak($id_kontak) > 0) {
    echo "<script>
            alert('Status berhasil diubah!');
            document.location.href = 'contact.php'; // Kembali ke halaman daftar kontak
        </script>";
} else {
    echo "<script>
            alert('Status gagal diubah!');
            document.location.href = 'contact.php';
        </script>";
}
