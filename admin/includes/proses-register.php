<?php

// Proses registrasi
// Cek adakah tombol registrasi sudah ditekan atau belum
if (isset($_POST["registrasi"])) {
    // Cek apakah data berhasil di tambahkan atau tidak 
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Terimakasih. Registrasi akun anda berhasil!');
                document.location.href = 'register.php';
            </script>";
    } else {
        echo "<script>
                alert('Maaf. Pendaftaran akun anda gagal total!');
            </script>" . mysqli_error($conn);
    }
}
