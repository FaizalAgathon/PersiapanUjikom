<?php include "koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>

  <nav class="d-flex">
    <ul class="d-flex text-decoration-none column-gap-5">
      <li><a href="home.php">HOME</a></li>
      <li><a href="kis/kis.php">Daftar KIS</a></li>
      <li><a href="faskes/faskes.php">Daftar Fasilitas Kesehatan</a></li>
    </ul>
    <a href="logout.php" class="btn btn-danger">Log Out</a>
  </nav>

</body>

</html>