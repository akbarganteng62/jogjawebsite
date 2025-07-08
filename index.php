<?php
include 'koneksi.php';
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$query = "SELECT * FROM warga WHERE nama_lengkap LIKE '%$cari%'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Warga RT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Daftar Warga RT</h2>
<a href="tambah.php">Tambah Warga</a>
<form method="get">
    <input type="text" name="cari" placeholder="Cari nama..." value="<?= $cari ?>">
    <input type="submit" value="Cari">
</form>
<table>
    <tr>
        <th>Nama</th><th>KK</th><th>NIK</th><th>Alamat</th><th>Status</th><th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $row['nama_lengkap'] ?></td>
        <td><?= $row['nomor_kk'] ?></td>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM warga WHERE id=$id");
    header("Location: index.php");
}
?>
</body>
</html>
