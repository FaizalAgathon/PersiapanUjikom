<!DOCTYPE html>
<html lang="en">

<?php 

include "koneksi.php";

if (isset($_POST['nama'])){
  $idFaskes = rand(100000000000,999999999999);
  mysqli_query($link, "INSERT INTO faskes VALUES ('$idFaskes', '$_POST[nama]')");
  header("Location: faskes.php");
}

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>

<body>
<a href="faskes.php"><< Kembali</a> <br>
  <form action="" method="post">
    Nama : <input type="text" name="nama"> <br>
    <button type="submit">Tambah</button>
  </form>
</body>

</html>