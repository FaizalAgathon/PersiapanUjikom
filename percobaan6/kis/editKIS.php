<?php

include "../koneksi.php";

if (isset($_POST['editKIS'])){
  mysqli_query($link, "UPDATE warga SET
    namaWarga = '$_POST[nama]', 
    tglLahirWarga = '$_POST[tglLahir]', 
    alamatWarga = '$_POST[alamat]'
    WHERE nikWarga = '$_POST[nik]'
  ");
  mysqli_query($link, "UPDATE kis SET
    '$_POST[faskes]'
    WHERE noKIS = '$_POST[noKIS]'
  ");

  $_SESSION['edit'] = "Berhasil Mengedit Data";
  header("Location: kis.php");
}

$kis = query("SELECT * FROM kis
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
WHERE noKIS = '$_GET[noKIS]'")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDIT KIS</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
  <div class="container">
    <form action="" method="post">
      <div class="input-group mb-3">
        <label class="form-control">NIK <?= $kis['nikWarga'] ?></label=>
        <label class="form-control"><?= $kis['nikWarga'] ?></label>
      </div>
      <div class="input-group mb-3">
        <label for="nama" class="form-control">NAMA</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= $kis['namaWarga'] ?>">
      </div>
      <div class="input-group mb-3">
        <label for="tglLahir" class="form-control">TANGGAL LAHIR</label>
        <input type="date" name="tglLahir" id="tglLahir" class="form-control" value="<?= $kis['tglLahirWarga'] ?>">
      </div>
      <div class="input-group mb-3">
        <label for="alamat" class="form-control">ALAMAT</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $kis['alamatWarga'] ?>">
      </div>
      <div class="input-group mb-3">
        <label for="faskes" class="form-control">NAMA FASKES</label>
        <select name="faskes" id="faskes" class="form-control">
          <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
            <option value="<?= $faskes['idFaskes'] ?>" <?= ($kis['idFaskes'] == $faskes) ? 'selected' : '' ?> ><?= $faskes['namaFaskes'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="input-group">
        <input type="hidden" name="noKIS" value="<?= $kis['noKIS'] ?>">
        <input type="hidden" name="nik" value="<?= $kis['nikWarga'] ?>">
        <button type="submit" class="btn btn-warning" name="editKIS">EDIT KIS</button>
      </div>
    </form>
  </div>
</body>

</html>