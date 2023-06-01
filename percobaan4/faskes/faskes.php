<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faskes</title>
</head>

<?php include "../koneksi.php" ?>

<body>
  <table border="1">
    <tr>
      <th><a href="tambahFaskes.php">Tambah Data Faskes</a></th>
    </tr>
    <tr>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
    <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
      <tr>
        <td><?= $faskes['namaFaskes'] ?></td>
        <td>
          <a href="editFaskes.php?id=<?= $faskes['idFaskes'] ?>">Edit</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</body>

</html>