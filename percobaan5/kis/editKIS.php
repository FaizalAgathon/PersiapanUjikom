<?php

include "../koneksi.php";

$kis = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes WHERE noKIS = '$_GET[noKIS]'")[0];

if (isset($_POST['editKIS'])) {
  mysqli_query($link, "UPDATE warga SET 
  namaWarga = '$_POST[nama]',
  tglLahirWarga = '$_POST[tglLahir]',
  alamatWarga = '$_POST[alamat]'
  WHERE nikWarga = '$_POST[nikWarga]'
  ");

  mysqli_query($link, "UPDATE kis SET 
  idFaskes = '$_POST[faskes]'
  WHERE noKIS = '$_POST[noKIS]'");

  header("Location: kis.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit KIS</title>
</head>

<body>
  <?php var_dump($kis) ?>
  <form action="" method="post">
    <table>
      <tr>
        <th>
          <h3>Edit KIS</h3>
        </th>
      </tr>
      <tr>
        <td>NIK : </td>
        <td><?= $kis['nikWarga'] ?></td>
      </tr>
      <tr>
        <td>Nama : </td>
        <td>
          <input type="text" name="nama" value="<?= $kis['namaWarga'] ?>">
        </td>
      </tr>
      <tr>
        <td>Tanggal Lahir : </td>
        <td><input type="date" name="tglLahir" value="<?= $kis['tglLahirWarga'] ?>"></td>
      </tr>
      <tr>
        <td>Alamat : </td>
        <td><input type="text" name="alamat" value="<?= $kis['alamatWarga'] ?>"></td>
      </tr>
      <tr>
        <td>Faskes : </td>
        <td>
          <select name="faskes">
            <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
              <option value="<?= $faskes['idFaskes'] ?>"
              <?= ($kis['idFaskes'] == $faskes['idFaskes']) ? 'selected' : '' ?> ><?= $faskes['namaFaskes'] ?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <tr>
        <input type="hidden" name="nikWarga" value="<?= $kis['nikWarga'] ?>">
        <input type="hidden" name="noKIS" value="<?= $kis['noKIS'] ?>">
        <td><button type="submit" name="editKIS">Edit KIS</button></td>
      </tr>
    </table>
  </form>
</body>

</html>