<?php

include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="datatables.css"> -->
  <style>
    @media print {
      .btn {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="container border border-3 mt-3">
    <h2 align="center">Data Siswa</h2>
    <hr>
    <div class="mb-3" align="center">
      <a href="tambah2.php"><button class="btn btn-success">Tambah Data</button></a>
    </div>
    <table align="center" class="table table-striped table-white" id="myTable">
      <thead align="center">
        <tr class="text-center">
          <th>No Kartu</th>
          <th>NIK</th>
          <th>Nama Warga</th>
          <th>Faskes</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $sql = "SELECT * FROM warga 
          INNER JOIN kis ON warga.nik = kis.nik 
          INNER JOIN faskes ON faskes.id_faskes = kis.id_faskes";
        $query = mysqli_query($link, $sql);
        while ($data = mysqli_fetch_array($query)) : ?>
          <tr class="text-center">
            <td><?= "$data[no_kartu]"; ?></td>
            <td><?= "$data[nik]"; ?></td>
            <td><?= "$data[nama]"; ?></td>
            <td><?= "$data[nama_faskes]"; ?></td>
            <td style="width : 20%;">
              <a href="detail.php?id=<?= $data['no_kartu'] ?>" class="btn btn-primary">
                Detail
              </a>
              <a href="edit.php?id=<?= "$data[no_kartu]"; ?>" class="btn btn-warning" onclick="return confirm('Apakah Yakin?')">
                Edit
              </a>
              <a href="hapus.php?id=<?= "$data[no_kartu]"; ?>" class="btn btn-danger ">
                Hapus
              </a>
            </td>
          </tr>
        <?php
        endwhile
        ?>
      </tbody>
    </table>

  </div>

  <!-- <script src="jQuery-3.6.0/jquery-3.6.0.js"></script>
  <script src="datatables.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script> -->
</body>

</html>