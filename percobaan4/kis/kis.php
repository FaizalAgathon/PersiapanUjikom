<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar KIS</title>
</head>

<?php include "../koneksi.php";

if (isset($_GET['hapusKIS'])){
  mysqli_query($link, "DELETE FROM kis WHERE noKIS = $_GET[hapusKIS]");
  mysqli_query($link, "DELETE FROM warga WHERE nikWarga = $_GET[nikWarga]");

  header("Location: kis.php");
}

?>

<body>

  <table border="1">
    <tr style="text-align: center;">
      <td colspan="10"><a href="tambahKIS.php">Tambah KIS</a></td>
    </tr>
    <tr>
      <th>NO KARTU</th>
      <th>NIK</th>
      <th>NAMA</th>
      <th>FASKES</th>
      <th>AKSI</th>
    </tr>
    <?php foreach (query("SELECT * FROM kis 
    INNER JOIN warga ON kis.nikWarga = warga.nikWarga
    INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes") as $kis) : ?>
      <tr>
        <td><?= $kis['noKIS'] ?></td>
        <td><?= $kis['nikWarga'] ?></td>
        <td><?= $kis['namaWarga'] ?></td>
        <td><?= $kis['namaFaskes'] ?></td>
        <td>
          <a href="cetakKartu.php?id=<?= $kis['noKIS'] ?>">Export PDF</a> ||
          <a href="editKIS.php?id=<?= $kis['noKIS'] ?>">Edit</a> ||
          <a href="?hapusKIS=<?= $kis['noKIS'] ?>&nikWarga=<?= $kis['nikWarga'] ?>">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

</body>

</html>