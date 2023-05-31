<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data KIS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<?php
include "koneksi.php";
?>

<body>

  <div class="container" style="margin-top: 20px">
    <form action="aksi_tambah2.php" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">NIK</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nik">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_lahir">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Faskes</label>
        <select class="form-select" aria-label="Default select example" name="faskes" id="faskes">
          <option selected>Open this select menu</option>
          <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
            <option value="<?= $faskes['id_faskes'] ?>"><?= $faskes['nama_faskes'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="mb-3">
        <button type="submit">Kirim</button>
      </div>
    </form>
  </div>

</body>

</html>