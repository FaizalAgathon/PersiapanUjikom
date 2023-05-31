<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<?php 

if (!isset($_SESSION['login'])){
  header("Location: login.php");
}

?>

<body>
  <a href="kis/kis.php">Daftar KIS</a>
  <a href="faskes/faskes.php">Daftar Faskes</a>
  <a href="warga/warga.php">Daftar Warga</a>
  <a href="ubahPassword.php">Ubah Password</a>
  <a href="logout.php">Keluar</a>
</body>

</html>