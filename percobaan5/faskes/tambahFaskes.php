<?php

include "../koneksi.php";

if (isset($_POST['tambahFaskes'])) {
  mysqli_query($link, "INSERT INTO faskes VALUES (NULL,'$_POST[nama]')");


  header("Location: faskes.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Faskes</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <th>
          <h3>Tambah Faskes</h3>
        </th>
      </tr>
      <tr>
        <td>Nama : </td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td><button type="submit" name="tambahFaskes">Tambah Faskes</button></td>
      </tr>
    </table>
  </form>
</body>

</html>