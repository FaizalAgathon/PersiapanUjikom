<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Kartu</title>
  <style>
    .card{
      width: 600px;
      height: 300px;
      border: 1px solid;
      overflow: hidden;
      border-radius: 24px;
    }
    .card p{
      margin: 0;
    }
    .card header{
      text-align: center;
      margin-bottom: 16px;
      background-color: #036C43;
    }
    .card header h3{
      font-size: 18px;
      margin: 0;
      height: 50px;
      line-height: 50px;
      color: #fff;
    }
    .card main{
      display: flex;
      margin: 0 40px;
    }
    .card main .columnName, .columnValue{
      width: 100%;
    }
    .card footer{
      margin: 0 40px;
    }
    .card ol{
      margin: 0;
      padding-left: 18px;
    }
  </style>
</head>

<?php include "../koneksi.php";

$kis = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes WHERE noKIS = $_GET[id]")[0];

?>

<body>

  <div class="card">
    <header>
      <h3>
        KARTU INDONESIA SEHAT
      </h3>
    </header>
    <main>
      <div class="columnName">
        <p>Nomor Kartu</p>
        <p>Nama</p>
        <p>Alamat</p>
        <p>Tanggal Lahir</p>
        <p>NIK</p>
        <p>Faskes Tingkat 1</p>
      </div>
      <div class="columnValue">
        <p>: <?= $kis['noKIS'] ?></p>
        <p>: <?= $kis['namaWarga'] ?></p>
        <p>: <?= $kis['alamatWarga'] ?></p>
        <p>: <?= $kis['tglLahirWarga'] ?></p>
        <p>: <?= $kis['nikWarga'] ?></p>
        <p>: <?= $kis['namaFaskes'] ?></p>
      </div>
    </main>
    <footer>
      <p>Syarat dan Ketentuan :</p>
      <ol type="1">
        <li>Kartu Peserta harap dibawa ketika berobat</li>
        <li>Apabila kartu ini dissalahgunakan akan dikenakan sanksi</li>
        <li>Apabila ada perubahan atau kehilangan Kartu, segera lapor ke kantor BPJS Kesehatan setempat.</li>
      </ol>
      <p>Pusat Layanan Informasi BPJS Kesehatan 500400</p>
      <p>www.bpjs-kesehatan.go.id</p>
    </footer>
  </div>

  <!-- <script>
    window.print();
  </script> -->

</body>

</html>