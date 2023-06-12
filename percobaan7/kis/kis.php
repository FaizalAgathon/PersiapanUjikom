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

if (isset($_GET['hapusKIS'])){
  mysqli_query($link, "DELETE FROM kis WHERE noKIS = '$_GET[hapusKIS]'");
  mysqli_query($link, "DELETE FROM warga WHERE nikWarga = '$_GET[nik]'");
  $_SESSION['del'] = 'Berhasil Menghapus Data KIS';
  header("Location: kis.php");
  exit;
}

$dataPerHal = 10;
$jmlData = count(query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes"));
$jmlHal = ceil($jmlData / $dataPerHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($dataPerHal * $halAktif) - $dataPerHal;

if (isset($_GET['cari']) && !isset($_GET['hal'])) {

  $sqlReadKIS = "SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
  WHERE 
  warga.nikWarga LIKE '%$_GET[cari]%' OR
  warga.namaWarga LIKE '%$_GET[cari]%' OR
  faskes.namaFaskes LIKE '%$_GET[cari]%' OR
  kis.noKIS LIKE '%$_GET[cari]%'
  ";
  $jmlData = count(query($sqlReadKIS));
  $jmlHal = ceil($jmlData / $dataPerHal);
} else if (!isset($_GET['cari']) && isset($_GET['hal'])) {

  $sqlReadKIS = "SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes 
  LIMIT $awalData, $dataPerHal";
  $jmlData = count(query("SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes"));
  $jmlHal = ceil($jmlData / $dataPerHal);
} else if (isset($_GET['cari']) && isset($_GET['hal'])) {

  $sqlReadKIS = "SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes 
  WHERE warga.nikWarga LIKE '%$_GET[cari]%' OR
  warga.namaWarga LIKE '%$_GET[cari]%' OR
  faskes.namaFaskes LIKE '%$_GET[cari]%' OR
  kis.noKIS LIKE '%$_GET[cari]%' LIMIT $awalData, $dataPerHal";

  $jmlData = count(query("SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
  WHERE warga.nikWarga LIKE '%$_GET[cari]%' OR
  warga.namaWarga LIKE '%$_GET[cari]%' OR
  faskes.namaFaskes LIKE '%$_GET[cari]%' OR
  kis.noKIS LIKE '%$_GET[cari]%'"));

  $jmlHal = ceil($jmlData / $dataPerHal);
} else {

  $sqlReadKIS = "SELECT * FROM kis 
  INNER JOIN warga ON kis.nikWarga = warga.nikWarga
  INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
  LIMIT $awalData, $dataPerHal";
}

// var_dump($_SESSION['login']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar KIS</title>
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
  
    <?php include "../assets/components/navbar.php" ?>

  <div class="container">
    <table class="table table-stripped table-bordered">
      <tr>
        <th colspan="3">
          <a href="tambahKIS.php" class="btn btn-success w-100">Tambah KIS</a>
        </th>
        <th colspan="5">
          <form action="" method="get">
            <div class="input-group">
              <?php if (isset($_GET['hal'])) : ?>
                <input type="hidden" name="hal" value="<?= $_GET['hal'] ?>">
              <?php endif ?>
              <input type="text" name="cari" class="form-control" value="<?= (isset($_GET['cari'])) ? "$_GET[cari]" : '' ?>">
              <button type="submit" class="btn btn-success"> 🔎 </button>
              <?php if (isset($_GET['cari'])) : ?>
                <a href="kis.php" class="btn btn-primary">Reset</a>
              <?php endif ?>
            </div>
          </form>
        </th>
      </tr>
      <tr class="table-dark text-center">
        <th>No KIS</th>
        <th>NIK</th>
        <th>Nama Warga</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Nama Faskes</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php foreach (query($sqlReadKIS) as $kis) : ?>
        <tr>
          <th><?= $kis['noKIS'] ?></th>
          <td><?= $kis['nikWarga'] ?></td>
          <td><?= $kis['namaWarga'] ?></td>
          <td><?= $kis['tglLahirWarga'] ?></td>
          <td><?= $kis['alamatWarga'] ?></td>
          <td><?= $kis['namaFaskes'] ?></td>
          <td>
            <a href="editKIS.php?id=<?= $kis['noKIS'] ?>" class="btn btn-warning">Edit</a>
          </td>
          <td>
            <a href="?hapusKIS=<?= $kis['noKIS'] ?>&nik=<?= $kis['nikWarga'] ?>" class="btn btn-danger">Hapus</a>
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