<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Faskes</title>
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

if (isset($_GET['hapusFaskes'])) {
  mysqli_query($link, "DELETE FROM faskes WHERE idFaskes = $_GET[hapusFaskes]");
}

$dataFaskes = query("SELECT * FROM faskes");

?>

<body>
  <table border="2">
    <tr class="PDFhapus">
      <th colspan="2">
        <a href="tambahFaskes.php">Tambah Data Faskes</a>
      </th>
    </tr>
    <tr>
      <th>Nama</th>
      <th class="PDFhapus">AKSI</th>
    </tr>
    <?php foreach ($dataFaskes as $faskes) : ?>
      <tr>
        <td><?= $faskes['namaFaskes'] ?></td>
        <td class="PDFhapus">
          <a href="editFaskes.php?id=<?= $faskes['idFaskes'] ?>">Edit</a> ||
          <a href="?hapusFaskes=<?= $faskes['idFaskes'] ?>">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</body>


</html>