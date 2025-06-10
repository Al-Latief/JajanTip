<?php
// Koneksi ke database, ambil datri config.php
include("config.php");

// Function untuk mengambil dan menampilkan data dari database
function query($query)
{
    // Ambil $conn di global
    global $conn;

    // Ambil data dari tabel mahasiswa/query data mahasiswa
    $result = mysqli_query($conn, $query);

    // Buat tempat atau array kosong
    $rows = [];

    // perulangan untuk mendapatkan data
    while ($row = mysqli_fetch_assoc($result)) {
        // Isi tempat array kosong dengan data yang didapat dari row
        $rows[] = $row;
    }

    // Kembalikan function query()
    return $rows;
}

// Function untuk menambahkan data kontak ke database
function tambahkontak($data)
{
    // Ambil $conn di global
    global $conn;

    // Ambil data dari tiap elemen dalam form &
    // Lakukan pengamanan dari hacker yang input datanya 
    $id_kontak = 0;
    $nama_kontak = htmlspecialchars($data["nama_kontak"]);
    $email_kontak = htmlspecialchars($data["email_kontak"]);
    $pesan = htmlspecialchars($data["pesan"]);
    $status_pesan = "Belum Terbaca";


    // query insert data
    $query = "INSERT INTO tb_kontak
                VALUES
                (
                '$id_kontak',
                '$nama_kontak',
                '$email_kontak',
                '$pesan',
                '$status_pesan'
                )
            ";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function tambah() dengan boll true
    // return $result = true; atau
    // Kembalikan function tambah() dengan nilai 1
    return mysqli_affected_rows($conn);
}

// Function untuk mengubah status kontak
function ubahstatuskontak($id_kontak)
{
    global $conn;

    // Ambil status pesan saat ini
    $query = "SELECT status_pesan FROM tb_kontak WHERE id_kontak = $id_kontak";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    // Tentukan status baru
    $status_baru = ($data['status_pesan'] === 'Belum Terbaca') ? 'Terbaca' : 'Belum Terbaca';

    // Query untuk mengubah status
    $query_update = "UPDATE tb_kontak SET status_pesan = '$status_baru' WHERE id_kontak = $id_kontak";
    mysqli_query($conn, $query_update);

    // Kembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($conn);
}

// Function untuk menghapus data kontak dari database
function hapuskontak($id_kontak)
{
    // Ambil $conn di global
    global $conn;

    // query Hapus data
    $query = "DELETE FROM tb_kontak 
                WHERE 
                id_kontak = $id_kontak";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function hapus() dengan boll true
    // return $result = true; atau
    // Kembalikan function hapus() dengan nilai 1
    return mysqli_affected_rows($conn);
}

// Function untuk tombol cari di tabel produk
function cari($keyword)
{
    // Isi query
    $query = "SELECT * FROM tb_produk
                WHERE
                id_produk LIKE '%$keyword%' OR
                nama_produk LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%'
            ";

    // Kembalikan function ini dengan function query=
    return query($query);
}

// Function untuk tombol kategori makanan di tabel produk
function kategorimakanan($makanan)
{
    // Isi query
    $query = "SELECT * FROM tb_produk
                WHERE
                kategori LIKE '%$makanan%'
            ";

    // Kembalikan function ini dengan function query=
    return query($query);
}

// Function untuk tombol kategori minuman di tabel produk
function kategoriminuman($minuman)
{
    // Isi query
    $query = "SELECT * FROM tb_produk
                WHERE
                kategori LIKE '%$minuman%'
            ";

    // Kembalikan function ini dengan function query=
    return query($query);
}

// Function untuk menambahkan data kontak ke database
function tambahproduk($data)
{
    // Ambil $conn di global
    global $conn;

    // Ambil data dari tiap elemen dalam form &
    // Lakukan pengamanan dari hacker yang input datanya 
    $id_produk = 0;
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $stok_produk = htmlspecialchars($data["stok_produk"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $tanggal_ditambahkan = htmlspecialchars($data["tanggal_ditambahkan"]);

    // Upload gambar
    $gambar_produk = upload();
    if (!$gambar_produk) {
        return false;
    }


    // query insert data
    $query = "INSERT INTO tb_produk
                VALUES
                (
                '$id_produk',
                '$gambar_produk',
                '$nama_produk',
                '$deskripsi_produk',
                '$kategori',
                '$harga_produk',
                '$stok_produk',
                '$tanggal_ditambahkan'
                )
            ";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function tambah() dengan boll true
    // return $result = true; atau
    // Kembalikan function tambah() dengan nilai 1
    return mysqli_affected_rows($conn);
}

// Function upload gambar produk
function upload()
{
    $namaFile = $_FILES["gambar_produk"]["name"];
    $ukuranFile = $_FILES["gambar_produk"]["size"];
    $error = $_FILES["gambar_produk"]["error"];
    $tmpName = $_FILES["gambar_produk"]["tmp_name"];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarProdukValid = ["jpg", "jpeg", "png"];
    $ekstensiGambarProduk = explode(".", $namaFile);
    $ekstensiGambarProduk = strtolower(end($ekstensiGambarProduk));
    if (!in_array($ekstensiGambarProduk, $ekstensiGambarProdukValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
                </script>";
        return false;
    }

    // Cek ukuran file terlalu besar maks 10Mb
    if ($ukuranFile > 10000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
                </script>";
        return false;
    }

    // Lolos pengecekan, gambar produk siap diupload
    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambarProduk;
    move_uploaded_file($tmpName, "img/" . $namaFileBaru);

    return $namaFileBaru;
}

// Function untuk mengubah atau update data di database
function ubahdataproduk($data)
{
    // Ambil $conn di global
    global $conn;

    // Ambil data dari tiap elemen dalam form &
    // Lakukan pengamanan dari hacker yang input datanya 
    $id_produk = $data["id_produk"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $stok_produk = htmlspecialchars($data["stok_produk"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $tanggal_ditambahkan = htmlspecialchars($data["tanggal_ditambahkan"]);

    $gambarProdukLama = htmlspecialchars($data["gambarProdukLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES["gambar_produk"]["error"] === 4) {
        $gambar_produk = $gambarProdukLama;
    } else {
        $gambar_produk = upload();
    }

    // query update data
    $query = "UPDATE `tb_produk` 
                SET 
                nama_produk ='$nama_produk',
                deskripsi_produk ='$deskripsi_produk',
                harga_produk ='$harga_produk',
                stok_produk ='$stok_produk',
                kategori ='$kategori',
                tanggal_ditambahkan ='$tanggal_ditambahkan',
                gambar_produk ='$gambar_produk' 
                WHERE id_produk = $id_produk
            ";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function tambah() dengan boll true
    // return $result = true; atau
    // Kembalikan function tambah() dengan nilai 1
    return mysqli_affected_rows($conn);
}

// Function untuk menghapus data produk dari database
function hapusproduk($id_produk)
{
    // Ambil $conn di global
    global $conn;

    // query Hapus data
    $query = "DELETE FROM tb_produk 
                WHERE 
                id_produk = $id_produk";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function hapus() dengan boll true
    // return $result = true; atau
    // Kembalikan function hapus() dengan nilai 1
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_escape_string($conn, $data["password"]);
    $password2 = mysqli_escape_string($conn, $data["password2"]);

    // Cek username. Apakah sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_admin WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Maaf! Username yang anda masukkan sudah ada');
                </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Maaf! Password yang anda masukkan tidak sama');
                </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data username dan password ke database users
    mysqli_query($conn, "INSERT INTO `tb_admin`
                            VALUES ('0','$username','$password')
                        ");

    return mysqli_affected_rows($conn);
}

// function untuk mengubah profil admin yang sedang digunakan
function ubahprofiladmin($id_admin, $username, $password)
{
    global $conn;

    // Jika password tidak kosong, hash password baru
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE tb_admin SET username = '$username', password = '$password' WHERE id_admin = $id_admin";
    } else {
        $query = "UPDATE tb_admin SET username = '$username' WHERE id_admin = $id_admin";
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Function untuk menghapus data admin dari database
function hapusadmin($id_admin)
{
    // Ambil $conn di global
    global $conn;

    // query Hapus data
    $query = "DELETE FROM tb_admin 
                WHERE 
                id_admin = $id_admin";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function hapus() dengan boll true
    // return $result = true; atau
    // Kembalikan function hapus() dengan nilai 1
    return mysqli_affected_rows($conn);
}

// function untuk mengubah profil admin yang sedang digunakan
function ubahprofilpengguna($id_pengguna, $username, $password)
{
    global $conn;

    // Jika password tidak kosong, hash password baru
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE tb_pengguna SET username = '$username', password = '$password' WHERE id_pengguna = $id_pengguna";
    } else {
        $query = "UPDATE tb_pengguna SET username = '$username' WHERE id_pengguna = $id_pengguna";
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Function untuk menghapus data pengguna dari database
function hapuspengguna($id_pengguna)
{
    // Ambil $conn di global
    global $conn;

    // query Hapus data
    $query = "DELETE FROM tb_pengguna 
                WHERE 
                id_pengguna = $id_pengguna";

    // Isi dari result ini adalah boll true dan data pun terkirim
    $result = mysqli_query($conn, $query);

    // Kembalikan function hapus() dengan boll true
    // return $result = true; atau
    // Kembalikan function hapus() dengan nilai 1
    return mysqli_affected_rows($conn);
}
