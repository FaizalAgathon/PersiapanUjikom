<!DOCTYPE html>
<html lang="en">

<?php
include "koneksi.php";

// Ngecek kalau session login belum aktif / blm login di lempar ke hal. login lagi
if ($_SESSION['login'] != true){
  header("Location: login.php");
}

// kalau ada hapusNo di url bakal ngehapus kis nya (seharusnya, ini masih blm berhasil)
if (isset($_GET['hapusNO'])){
  mysqli_query($link, "DELETE FROM kis WHERE noKIS = '$_GET[hapusNO]'");
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <a href="tambahKIS.php">Tambah KIS</a>
  <a href="logout.php">Log Out</a>
  <a href="faskes.php">Daftar Faskes -> </a>
  <table border="10">
    <tr m>
      <th>No. Kartu</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Faskes</th>
      <th>Aksi</th>
    </tr>
    <?php
    $sql = "SELECT * FROM kis 
    INNER JOIN warga ON kis.nikWarga = warga.nikWarga 
    INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes";
    foreach (query($sql) as $data) : ?>
      <tr>
        <th><?= $data['noKIS'] ?></th>
        <th><?= $data['nikWarga'] ?></th>
        <th><?= $data['namaWarga'] ?></th>
        <th><?= $data['namaFaskes'] ?></th>
        <th>
          <a href="detailKIS.php?no=<?= $data['noKIS'] ?>">Detail</a> ||
          <a href="editKIS.php?no=<?= $data['noKIS'] ?>">Edit</a> ||
          <a href="home.php?hapusNo=<?= $data['noKIS'] ?>">Hapus</a>
        </th>
      </tr>
    <?php endforeach ?>
  </table>
</body>

</html>