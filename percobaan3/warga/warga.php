<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Warga</title>
  <style>
    @media print {
      table{
        width: 100%;
      }
      table th,td{
        padding: 6px;
      }
      .PDFhapus{
        display: none;
      }
    }
  </style>
</head>

<?php include "../koneksi.php";

if (isset($_GET['hapusWarga'])){
  mysqli_query($link, "DELETE FROM warga WHERE nikWarga = $_GET[hapusWarga]");
}

$dataWarga = query("SELECT * FROM warga");

?>

<body>
  <table border="2">
    <tr class="PDFhapus">
      <th colspan="5">
        <a href="tambahWarga.php">Tambah Data Warga</a>
      </th>
    </tr>
    <tr>
      <th>NIK</th>
      <th>Nama</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th class="PDFhapus">AKSI</th>
    </tr>
    <?php foreach ($dataWarga as $warga) : ?>
    <tr>
      <td><?= $warga['nikWarga'] ?></td>
      <td><?= $warga['namaWarga'] ?></td>
      <td><?= $warga['tglLahirWarga'] ?></td>
      <td><?= $warga['alamatWarga'] ?></td>
      <td class="PDFhapus">
        <a href="editWarga.php?id=<?= $warga['nikWarga'] ?>">Edit</a> || 
        <a href="?hapusWarga=<?= $warga['nikWarga'] ?>">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</body>

</html>