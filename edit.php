<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM warga WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE warga SET 
        nama_lengkap='$nama',
        nomor_kk='$kk',
        nik='$nik',
        alamat='$alamat',
        status='$status'
        WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Data Warga</h2>
<form method="post">
    Nama Lengkap: <input type="text" name="nama" value="<?= $row['nama_lengkap'] ?>" required><br>
    Nomor KK: <input type="text" name="kk" value="<?= $row['nomor_kk'] ?>" required><br>
    NIK: <input type="text" name="nik" value="<?= $row['nik'] ?>" required><br>
    Alamat: <textarea name="alamat" required><?= $row['alamat'] ?></textarea><br>
    Status:
    <select name="status" required>
        <option value="Kepala Keluarga" <?= $row['status'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
        <option value="Anggota Keluarga" <?= $row['status'] == 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
    </select><br>
    <input type="submit" value="Simpan Perubahan">
</form>
<a href="index.php">← Kembali ke Daftar</a>

</body>
</html>
