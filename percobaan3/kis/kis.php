<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar KIS</title>
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

if (isset($_GET['hapusKIS'])){
  mysqli_query($link, "DELETE FROM kis WHERE noKIS = $_GET[hapusKIS]");
}

$dataKIS = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga 
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes");

?>

<body>
  <table border="2">
    <tr class="PDFhapus">
      <th colspan="5"><a href="tambahKIS.php">Tambah Data KIS</a></th>
    </tr>
    <tr>
      <th>No Kartu</th>
      <th>NIK</th>
      <th>Faskes</th>
      <th class="PDFhapus">AKSI</th>
    </tr>
    <?php foreach ($dataKIS as $kis) : ?>
    <tr>
      <td><?= $kis['noKIS'] ?></td>
      <td><?= $kis['nikWarga'] ?></td>
      <td><?= $kis['namaFaskes'] ?></td>
      <td class="PDFhapus">
        <a href="editKIS.php?id=<?= $kis['noKIS'] ?>">Edit</a> || 
        <a href="?hapusKIS=<?= $kis['noKIS'] ?>">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</body>

</html>