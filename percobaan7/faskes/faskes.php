<?php include "../koneksi.php";

if (isset($_SESSION['add'])) { ?>

  <div class="alert alert-dismissible alert-success fade show">
    <strong>SUCCESS!</strong> <?= $_SESSION['add'] ?>
  </div>

<?php } else if (isset($_SESSION['edit'])) { ?>

  <div class="alert alert-dismissible alert-success fade show">
    <strong>SUCCESS!</strong> <?= $_SESSION['edit'] ?>
  </div>

<?php } else if (isset($_SESSION['del'])) { ?>

  <div class="alert alert-dismissible alert-success fade show">
    <strong>SUCCESS!</strong> <?= $_SESSION['del'] ?>
  </div>

<?php }

if (isset($_GET['hapusFaskes'])){
  mysqli_query($link, "DELETE FROM faskes WHERE idFaskes = $_GET[hapusFaskes]");
  $_SESSION['del'] = 'Berhasil Menghapus Data Faskes';
  header("Location: faskes.php");
  exit;
}

$dataPerHal = 10;
$jmlData = count(query("SELECT * FROM faskes"));
$jmlHal = ceil($jmlData / $dataPerHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($dataPerHal * $halAktif) - $dataPerHal;

if (isset($_GET['cari']) && !isset($_GET['hal'])) {

  $sqlReadFaskes = "SELECT * FROM faskes WHERE namaFaskes LIKE '%$_GET[cari]%'";
  $jmlData = count(query($sqlReadFaskes));
  $jmlHal = ceil($jmlData / $dataPerHal);
} else if (!isset($_GET['cari']) && isset($_GET['hal'])) {

  $sqlReadFaskes = "SELECT * FROM faskes LIMIT $awalData, $dataPerHal";
  $jmlData = count(query("SELECT * FROM faskes"));
  $jmlHal = ceil($jmlData / $dataPerHal);
} else if (isset($_GET['cari']) && isset($_GET['hal'])) {

  $sqlReadFaskes = "SELECT * FROM faskes WHERE namaFaskes LIKE '%$_GET[cari]%' LIMIT $awalData, $dataPerHal";
  $jmlData = count(query("SELECT * FROM faskes WHERE namaFaskes LIKE '%$_GET[cari]%'"));
  $jmlHal = ceil($jmlData / $dataPerHal);
} else {

  $sqlReadFaskes = "SELECT * FROM faskes LIMIT $awalData, $dataPerHal";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Faskes</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <style>
    body {
      position: relative;
    }

    .alert {
      position: absolute;
      bottom: 20px;
      right: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <table class="table table-stripped table-bordered">
      <tr>
        <th colspan="2">
          <a href="tambahFaskes.php" class="btn btn-success w-100">Tambah Faskes</a>
        </th>
        <th colspan="2">
          <form action="" method="get">
            <div class="input-group">
              <?php if (isset($_GET['hal'])) : ?>
                <input type="hidden" name="hal" value="<?= $_GET['hal'] ?>">
              <?php endif ?>
              <input type="text" name="cari" class="form-control" value="<?= (isset($_GET['cari'])) ? "$_GET[cari]" : '' ?>">
              <button type="submit" class="btn btn-success"> 🔎 </button>
              <?php if (isset($_GET['cari'])) : ?>
                <a href="faskes.php" class="btn btn-primary">Reset</a>
              <?php endif ?>
            </div>
          </form>
        </th>
      </tr>
      <tr class="table-dark text-center">
        <th>#</th>
        <th>Nama</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php $i = 1;
      foreach (query($sqlReadFaskes) as $faskes) : ?>
        <tr>
          <th><?= $i++ ?></th>
          <td><?= $faskes['namaFaskes'] ?></td>
          <td>
            <a href="editFaskes.php?id=<?= $faskes['idFaskes'] ?>" class="btn btn-warning">Edit</a>
          </td>
          <td>
            <?php if (query("SELECT idFaskes FROM kis WHERE idFaskes = $faskes[idFaskes]") == []) : ?>
              <a href="?hapusFaskes=<?= $faskes['idFaskes'] ?>" class="btn btn-danger">Hapus</a>
            <?php else : ?>
              Tidak Bisa Dihapus!
            <?php endif ?>
          </td>
        </tr>
      <?php endforeach ?>
    </table>

    <?php if ($jmlData > $dataPerHal) : ?>
      <div class="pagination justify-content-center gap-2">
        <a href="?hal=<?= $halAktif - 1 ?><?= (isset($_GET['cari'])) ? '&cari=' . $_GET['cari'] : '' ?>" class="btn btn-primary <?= ($halAktif > 1) ? '' : 'disabled' ?>">&laquo;</a>

        <?php for ($i = 1; $i <= $jmlHal; $i++) : ?>
          <a href="?hal=<?= $i ?><?= (isset($_GET['cari'])) ? '&cari=' . $_GET['cari'] : '' ?>" class="btn btn-primary <?= ($i == $halAktif) ? 'active' : '' ?> "><?= $i ?></a>
        <?php endfor ?>

        <a href="?hal=<?= $halAktif + 1 ?><?= (isset($_GET['cari'])) ? '&cari=' . $_GET['cari'] : '' ?>" class="btn btn-primary <?= ($halAktif < $jmlHal) ? '' : 'disabled' ?>">&raquo;</a>
      </div>
    <?php endif ?>
  </div>

  <script>
    const alert = document.querySelector('.alert');
    setInterval(function() {
      alert.classList.remove('show')
    }, 5000)
  </script>

  <?php unset($_SESSION['add'], $_SESSION['edit'], $_SESSION['del']) ?>

</body>

</html>