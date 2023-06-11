<?php

include "../koneksi.php";

if (isset($_GET['hapusKIS'])){
  mysqli_query($link, "DELETE FROM kis WHERE noKIS = '$_GET[hapusKIS]'");
  mysqli_query($link, "DELETE FROM warga WHERE nikWarga = '$_GET[nikWarga]'");
  $_SESSION['del'] = "Berhasil Menghapus Data";
  header("Location: kis.php");
}

$jmlDataPerHal = 2;
$jmlData = count(query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes"));
$jmlHal =  ceil($jmlData / $jmlDataPerHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jmlDataPerHal * $halAktif) - $jmlDataPerHal;

$sqlKIS = "SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
  LIMIT $awalData, $jmlDataPerHal";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DAFTAR KIS</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
  <div class="container">

    <a href="tambahKIS.php" class="btn btn-success">ADD KIS</a>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>NO KARTU</th>
          <th>NIK</th>
          <th>NAMA</th>
          <th>FASKES</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (query($sqlKIS) as $kis) : ?>
          <tr>
            <td><?= $kis['noKIS'] ?></td>
            <td><?= $kis['nikWarga'] ?></td>
            <td><?= $kis['namaWarga'] ?></td>
            <td><?= $kis['namaFaskes'] ?></td>
            <td>
              <a href="cetakKIS.php?noKIS=<?= $kis['noKIS'] ?>" class="btn btn-primary">PRINT</a>
              <a href="editKIS.php?noKIS=<?= $kis['noKIS'] ?>" class="btn btn-warning">EDIT</a>
              <a href="?hapusKIS=<?= $kis['noKIS'] ?>&nikWarga=<?= $kis['nikWarga'] ?>" class="btn btn-warning">DELETE</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <?php if ($halAktif > 1) : ?>
      <a href="?hal=<?= $halAktif - 1 ?>" class="btn btn-info">&laquo;</a>
    <?php endif ?>

    <?php for ($i = 1; $i <= $jmlHal; $i++) : ?>
      <a href="?hal=<?= $i ?>" class="btn btn-info"><?= $i ?></a>
    <?php endfor ?>

    <?php if ($halAktif < $jmlHal) : ?>
      <a href="?hal=<?= $halAktif + 1 ?>" class="btn btn-info">&raquo;</a>
    <?php endif ?>

    <?php unset($_SESSION['add'], $_SESSION['edit'], $_SESSION['del']) ?>
  </div>
</body>

</html>