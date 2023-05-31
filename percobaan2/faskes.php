<!DOCTYPE html>
<html lang="en">

<?php
include "koneksi.php";
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faskes</title>
  <style>
    @media print {
      a {
        display: none;
      }
    }
  </style>
</head>

<!-- hal. faskes cuma nampilin daftar faskes aja tanpa edit sama hapus -->

<body>
  <a href="home.php"> <- Daftar KIS </a>
      <a href="tambahFaskes.php">Tambah Faskes</a>
      <table border="1">
        <tr>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
        <?php $sql = "SELECT * FROM faskes";
        foreach (query($sql) as $data) : ?>
          <tr>
            <th><?= $data['namaFaskes'] ?></th>
            <th>
              <?php if (query("SELECT idFaskes FROM kis WHERE idFaskes = $data[idFaskes]") == []) : ?>
                <button type="submit">Hapus</button>
              <?php else : ?>
                Sudah terhubung
              <?php endif ?>
            </th>
          </tr>
        <?php endforeach ?>
      </table>
</body>

</html>