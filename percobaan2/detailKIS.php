<!DOCTYPE html>
<html lang="en">

<?php
include "koneksi.php";
$data = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga 
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
WHERE noKIS = $_GET[no]")[0];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
</head>

<body>

<a href="home.php"><< Kembali</a> <br>

  No Kartu : <?= $data['noKIS'] ?> <br>
  NIK : <?= $data['nikWarga'] ?> <br>
  Nama : <?= $data['namaWarga'] ?> <br>
  Tanggal Lahir : <?= $data['tglLahirWarga'] ?> <br>
  Alamat : <?= $data['alamatWarga'] ?> <br>
  Faskes : <?= $data['namaFaskes'] ?>

</body>

</html>