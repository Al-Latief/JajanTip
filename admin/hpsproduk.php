<?php
// Menghubungkan halaman lain ke halaman ini
include "includes/functions.php";

// Ambil id_produk dari GET
$id_produk = $_GET["id_produk"];

// Logika untuk Hapus produk
if (hapusproduk($id_produk) > 0) {
    echo "<script>
            alert('Produk berhasil dihapus!');
            document.location.href = 'produk.php'; // Kembali ke halaman daftar produk
        </script>";
} else {
    echo "<script>
            alert('Produk gagal dihapus!');
            document.location.href = 'produk.php';
        </script>";
}
