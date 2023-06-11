<?php

include "../koneksi.php";

if (isset($_POST['tambahKIS'])) {
  mysqli_query($link, "INSERT INTO warga VALUES (
    '$_POST[nik]',
    '$_POST[nama]',
    '$_POST[tglLahir]',
    '$_POST[alamat]'
    )");

  if (query("SELECT * FROM kis") == []) {
    $noKIS = date("Y" + 1) . "0001";
  } else {
    $noKISTerakhir = query("SELECT MAX(noKIS) as kisTerakhir FROM kis")[0]['kisTerakhir'];
    $noKISDigitTerakhir = str_split($noKISTerakhir, 4)[1];
    $noKISDigitTerakhir = (int) $noKISDigitTerakhir + 1;
    $noKISDigitTerakhir = str_pad($noKISDigitTerakhir, 4, "0", STR_PAD_LEFT);
    $noKIS = date("Y") . $noKISDigitTerakhir;
  }

  mysqli_query($link, "INSERT INTO kis VALUES ('$noKIS','$_POST[nik]','$_POST[faskes]')");

  header("Location: kis.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah KIS</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <th>
          <h3>Tambah KIS</h3>
        </th>
      </tr>
      <tr>
        <td>NIK : </td>
        <td><input type="text" name="nik"></td>
      </tr>
      <tr>
        <td>Nama : </td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td>Tanggal Lahir : </td>
        <td><input type="date" name="tglLahir"></td>
      </tr>
      <tr>
        <td>Alamat : </td>
        <td><input type="text" name="alamat"></td>
      </tr>
      <tr>
        <td>Faskes : </td>
        <td>
          <select name="faskes">
            <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
              <option value="<?= $faskes['idFaskes'] ?>"><?= $faskes['namaFaskes'] ?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><button type="submit" name="tambahKIS">Tambah KIS</button></td>
      </tr>
    </table>
  </form>
</body>

</html>