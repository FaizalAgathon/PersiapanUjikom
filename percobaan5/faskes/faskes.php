<?php

include "../koneksi.php";

if (isset($_GET['hapusFaskes'])) {
  mysqli_query($link, "DELETE FROM faskes WHERE idFaskes = '$_GET[hapusFaskes]");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Faskes</title>
</head>

<body>

<a href="../home.php"> < HOME</a>
  
  <table border="1">
    <tr>
      <th colspan="10">
        <h3>Daftar Faskes</h3>
      </th>
    </tr>
    <tr>
      <th colspan="10">
        <a href="tambahFaskes.php">Tambah Faskes</a>
      </th>
    </tr>
    <tr>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
    <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
      <tr>
        <td><?= $faskes['namaFaskes'] ?></td>
        <td>
          <a href="editFaskes.php?idFaskes=<?= $faskes['idFaskes'] ?>">Edit</a> ||
          <?php if (query("SELECT idFaskes FROM kis WHERE idFaskes = '$faskes[idFaskes]'") == []) : ?>
            <a href="?hapusFaskes=<?= $faskes['idFaskes'] ?>">Hapus</a>
          <?php else : ?>
            Sudah Berelasi
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

</body>

</html>