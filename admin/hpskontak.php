<?php
// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Ambil id_kontak dari GET
$id_kontak = $_GET["id_kontak"];

// Logika untuk Hapus Kontak
if (hapuskontak($id_kontak) > 0) {
    echo "<script>
            alert('Pesan berhasil dihapus!');
            document.location.href = 'contact.php'; // Kembali ke halaman daftar kontak
        </script>";
} else {
    echo "<script>
            alert('pesan gagal dihapus!');
            document.location.href = 'contact.php';
        </script>";
}
