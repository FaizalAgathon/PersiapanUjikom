<?php

include "../koneksi.php";

if (isset($_GET['hapusKIS'])) {
  mysqli_query($link, "DELETE FROM kis WHERE noKIS = '$_GET[hapusKIS]'");
  mysqli_query($link, "DELETE FROM warga WHERE nikWarga = '$_GET[nikWarga]'");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar KIS</title>
</head>

<body>

  <a href="../home.php">
    < HOME</a>

      <table border="1">
        <tr>
          <th colspan="10">
            <h3>Daftar KIS</h3>
          </th>
        </tr>
        <tr>
          <th colspan="10"><a href="tambahKIS.php">Tambah KIS</a></th>
        </tr>
        <tr>
          <th>No KIS</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Faskes</th>
          <th>Aksi</th>
        </tr>
        <?php foreach (query("SELECT * FROM kis 
    INNER JOIN warga ON kis.nikWarga = warga.nikWarga
    INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes") as $kis) : ?>
          <tr>
            <td><?= $kis['noKIS'] ?></td>
            <td><?= $kis['nikWarga'] ?></td>
            <td><?= $kis['namaWarga'] ?></td>
            <td><?= $kis['namaFaskes'] ?></td>
            <td>
              <a href="cetakKIS.php?noKIS=<?= $kis['noKIS'] ?>">Cetak</a> ||
              <a href="editKIS.php?noKIS=<?= $kis['noKIS'] ?>">Edit</a> ||
              <a href="?hapusKIS=<?= $kis['noKIS'] ?>&nikWarga=<?= $kis['nikWarga'] ?>">Hapus</a>
            </td>
          </tr>
        <?php endforeach ?>
      </table>

</body>

</html>