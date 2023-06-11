<?php

include "../koneksi.php";

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
  <title>Cetak KIS</title>
  <style>
    .card{
      border: 1px solid;
      border-radius: 18px;
      overflow: hidden;
      width: 500px;
    }
    .card-header h1{
      text-align: center;
      background-color: aqua;
      margin: 0;
      padding: 12px;
    }
    .card-content{
      display: flex;
      padding: 12px;
    }
    .kolomJudul{
      width: 50%;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="card-header">
      <h1>KARTU INDONESIA SEHAT</h1>
    </div>
    <div class="card-content">
      <div class="kolomJudul">
        <h5>No Kartu : </h5>
        <h5>NIK : </h5>
        <h5>Nama : </h5>
        <h5>Tanggal Lahir : </h5>
        <h5>Alamat : </h5>
      </div>
      <div class="kolomIsi">
        <h5><?= $kis['noKIS'] ?></h5>
        <h5><?= $kis['nikWarga'] ?></h5>
        <h5><?= $kis['namaWarga'] ?></h5>
        <h5><?= $kis['tglLahirWarga'] ?></h5>
        <h5><?= $kis['alamatWarga'] ?></h5>
      </div>
    </div>
  </div>

  <script>
    window.print();

    // window.addEventListener('afterprint', () => {
    //   window.location = 'kis.php';
    // })

    // window.onafterprint = () => {
    //   window.location = 'kis.php';
    // }
  </script>

</body>

</html>