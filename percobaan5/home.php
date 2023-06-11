<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="refresh" content="1"> -->
  <title>Home</title>
  <style>
    .links{
      display: flex;
      flex-direction: column;
      border: 1px solid;
      width: 50%;
      align-items: center;
      padding: 12px;
      row-gap: 12px;
      border-radius: 18px;
    }
    .links a{
      font-size: 24px;
      border: 1px solid;
      padding: 8px;
      text-decoration: none;
      border-radius: 12px;
      color: #000;
    }
  </style>
</head>

<body>

  <div class="links">
    <a href="kis/kis.php">Daftar KIS</a>
    <a href="faskes/faskes.php">Daftar Faskes</a>
    <a href="ubahPassword.php">Ubah Password</a>
    <a href="logout.php">Logout</a>
  </div>

</body>

</html>