<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    mysqli_query($conn, "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status)
        VALUES ('$nama', '$kk', '$nik', '$alamat', '$status')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Warga</h2>
<form method="post">
    Nama Lengkap: <input type="text" name="nama" required><br>
    Nomor KK: <input type="text" name="kk" required><br>
    NIK: <input type="text" name="nik" required><br>
    Alamat: <textarea name="alamat" required></textarea><br>
    Status:
    <select name="status" required>
        <option value="Kepala Keluarga">Kepala Keluarga</option>
        <option value="Anggota Keluarga">Anggota Keluarga</option>
    </select><br>
    <input type="submit" value="Simpan">
</form>
<a href="index.php">← Kembali ke Daftar</a>

</body>
</html>
