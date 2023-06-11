<?php

include "../koneksi.php";

if (isset($_GET['hapusFaskes'])){
  mysqli_query($link, "DELETE FROM faskes WHERE idFaskes = '$_GET[hapusFaskes]'");
  $_SESSION['del'] = "Berhasil Menghapus Data";
  header("Location: faskes.php");
}

$jmlDataPerHal = 2;
$jmlData = count(query("SELECT * FROM faskes"));
$jmlHal =  ceil($jmlData / $jmlDataPerHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jmlDataPerHal * $halAktif) - $jmlDataPerHal;

$sqlFaskes = "SELECT * FROM faskes LIMIT $awalData, $jmlDataPerHal";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DAFTAR FASKES</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
  <div class="container">

    <a href="tambahFaskes.php" class="btn btn-success">ADD FASKES</a>

    <table class="table table-bordered w-50">
      <thead>
        <tr>
          <th>NAMA</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (query($sqlFaskes) as $faskes) : ?>
          <tr>
            <td><?= $faskes['namaFaskes'] ?></td>
            <td>
              <a href="editFaskes.php?idFaskes=<?= $faskes['idFaskes'] ?>" class="btn btn-warning">EDIT</a>
              <a href="?hapusFaskes=<?= $faskes['idFaskes'] ?>" class="btn btn-danger">DELETE</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <?php if ($halAktif > 1) : ?>
      <a href="?hal=<?= $halAktif - 1 ?>" class="btn btn-secondary">&laquo;</a>
    <?php endif ?>

    <?php for ($i = 1; $i <= $jmlHal; $i++) : ?>
      <a href="?hal=<?= $i ?>" class="btn <?= ($i == $halAktif) ? 'btn-primary' : 'btn-secondary' ?>"><?= $i ?></a>
    <?php endfor ?>

    <?php if ($halAktif < $jmlHal) : ?>
      <a href="?hal=<?= $halAktif + 1 ?>" class="btn btn-secondary">&raquo;</a>
    <?php endif ?>

    <?php unset($_SESSION['add'], $_SESSION['edit'], $_SESSION['del']) ?>
  </div>
</body>

</html>