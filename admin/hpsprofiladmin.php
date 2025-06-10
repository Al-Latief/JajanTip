<?php
// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Ambil id_admin dari GET
$id_admin = $_GET["id_admin"];

// Logika untuk Hapus admin
if (hapusadmin($id_admin) > 0) {
    echo "<script>
            alert('Pesan berhasil dihapus!');
            document.location.href = 'admin.php'; // Kembali ke halaman daftar admin
        </script>";
} else {
    echo "<script>
            alert('pesan gagal dihapus!');
            document.location.href = 'admin.php';
        </script>";
}
