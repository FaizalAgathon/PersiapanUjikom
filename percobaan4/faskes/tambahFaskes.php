<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faskes</title>
</head>

<?php include "../koneksi.php";

if (isset($_POST['tambahFaskes'])){
  mysqli_query($link, "INSERT INTO faskes VALUES (NULL, '$_POST[nama]')");
  header("Location: faskes.php");
}

?>

<body>
  <form action="" method="post">
    <table border="1">
      <tr>
        <th>Tambah Faskes</th>
      </tr>
      <tr>
        <td>Nama : </td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="tambahFaskes">Tambah</button>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>