<?php

include "../koneksi.php";

if (isset($_POST['tambahFaskes'])){

  mysqli_query($link, "INSERT INTO faskes VALUES (
    NULL, '$_POST[nama]'
  )");

  $_SESSION['add'] = "Berhasil Menambah Data";
  header("Location: faskes.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAMBAH FASKES</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
  <div class="container">
    <form action="" method="post" class="d-block card w-50 h-50 mx-auto mt-5 rounded-4 overflow-hidden">
    <h1 class="text-center bg-success text-light py-2">Tambah Data Faskes</h1>
      <div class="content p-5">
        <div class="mb-3">
          <label for="nama" class="form-label">NAMA</label>
          <input type="text" name="nama" id="nama" class="form-control" autofocus>
        </div>
        <div class="d-flex w-100 justify-content-between">
          <a href="faskes.php" class="btn btn-secondary" name="tambahFaskes"> <span style="font-size: 18px;">&laquo;</span> Kembali</a>
          <button type="submit" class="btn btn-success" name="tambahFaskes">ADD FASKES</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>