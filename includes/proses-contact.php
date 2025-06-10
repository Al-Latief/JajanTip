<?php

// Proses contact
// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil di tambahkan atau tidak 
    if (tambahkontak($_POST) > 0) {
        echo "<script>
                alert('Terimakasih. Pesan yang anda kirim berhasil!');
                document.location.href = 'contact.php';
            </script>";
    } else {
        echo "Data Gagal Ditambahkan" . mysqli_error($conn);
    }
}
