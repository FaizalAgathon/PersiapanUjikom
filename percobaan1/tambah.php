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
    <div class="border border-2 border-dark p-3 mt-3 rounded-3 ">
      <h2 align="center" class="border-bottom border-1 border-dark pb-3 ">Tambah Data KIS</h2>
      <form action="aksi_tambah2.php" method="post">

        <div class="form-group">
          <label for="nik" class="form-label">Nik :</label>
          <input type="number" class="form-control" name="nik" placeholder="Masukan nik " required>
        </div>
        <br>

        <div class="form-group">
          <label for="nama" class="form-label">Nama :</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama " required>
        </div>
        <br>

        <div class="form-group">
          <label for="alamat" class="form-label">Alamat :</label>
          <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required>
        </div>
        <br>

        <div class="form-group">
          <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
          <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan tanggal_lahir" required>
        </div>
        <br>

        <div class="form-group">
          <label for="faskes" class="form-label">Faskes :</label>
          <select class="form-select" aria-label="Default select example" name="faskes" id="faskes">
            <option selected>Open this select menu</option>
            <?php foreach (query("SELECT * FROM faskes") as $item) : ?>
              <option value="<?= $item['id_faskes'] ?>"><?= $item['nama_faskes'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <br>

        <a href="index.php" class="btn btn-dm btn-danger">Batal</a>
        <button type="submit" class="btn btn-dm btn-primary">Simpan</button>
      </form>

    </div>
  </div>

</body>

</html>