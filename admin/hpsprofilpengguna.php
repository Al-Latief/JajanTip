<?php
// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Ambil id_pengguna dari GET
$id_pengguna = $_GET["id_pengguna"];

// Logika untuk Hapus pengguna
if (hapuspengguna($id_pengguna) > 0) {
    echo "<script>
            alert('Pengguna berhasil dihapus!');
            document.location.href = 'pengguna.php'; // Kembali ke halaman daftar pengguna
        </script>";
} else {
    echo "<script>
            alert('pengguna gagal dihapus!');
            document.location.href = 'pengguna.php';
        </script>";
}
