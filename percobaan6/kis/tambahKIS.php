<?php

include "../koneksi.php";

if (isset($_POST['tambahKIS'])) {
  if (query("SELECT noKIS FROM kis") == []) {
    $noKIS = date("Y") . '0001';
  } else {
    $noKISTerakhir = query("SELECT MAX(noKIS) as KISTerakhir FROM kis")[0]['KISTerakhir'];
    $noKISSplit = str_split($noKISTerakhir, 4)[1];
    $noKISInt = (int) $noKISSplit + 1;
    $noKISPad = str_pad($noKISInt, 4, "0", STR_PAD_LEFT);
    $noKIS = date("Y") . $noKISPad;
  }

  mysqli_query($link, "INSERT INTO warga VALUES (
    '$_POST[nik]', '$_POST[nama]', '$_POST[tglLahir]', '$_POST[alamat]'
  )");
  mysqli_query($link, "INSERT INTO kis VALUES (
    '$noKIS', '$_POST[nik]', '$_POST[faskes]'
  )");

  $_SESSION['add'] = "Berhasil Menambah Data";
  header("Location: kis.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAMBAH KIS</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
  <div class="container">
    <form action="" method="post" class="d-block card w-50 h-50 mx-auto mt-5 rounded-4 overflow-hidden">
      <h1 class="text-center bg-success text-light py-2">Tambah Data KIS</h1>
      <div class="content p-5">
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" name="nik" id="nik" class="form-control">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">NAMA</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="mb-3">
          <label for="tglLahir" class="form-label">TANGGAL LAHIR</label>
          <input type="date" name="tglLahir" id="tglLahir" class="form-control">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">ALAMAT</label>
          <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="mb-3">
          <label for="faskes" class="form-label">NAMA FASKES</label>
          <select name="faskes" id="faskes" class="form-control">
            <?php if (query("SELECT * FROM faskes") != []) : ?>
              <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
                <option value="<?= $faskes['idFaskes'] ?>"><?= $faskes['namaFaskes'] ?></option>
              <?php endforeach ?>
            <?php else : ?>
                <option selected >Tidak Ada Data Faskes</option>
            <?php endif ?>
          </select>
        </div>
        <div class="d-flex w-100 justify-content-between">
          <a href="kis.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-success" name="tambahKIS">ADD KIS</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>