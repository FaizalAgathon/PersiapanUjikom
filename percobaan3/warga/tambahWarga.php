<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Warga</title>
</head>

<?php include "../koneksi.php";

if (isset($_POST['tambahWarga'])){
  mysqli_query($link, "INSERT INTO warga VALUES (
    '$_POST[nik]', 
    '$_POST[nama]', 
    '$_POST[tglLahir]', 
    '$_POST[alamat]'
  )");

  header("Location: warga.php");
}

?>

<body>
  <form action="" method="post">
    NIK : <input type="text" name="nik"> <br>
    Nama : <input type="text" name="nama"> <br>
    Tanggal Lahir : <input type="date" name="tglLahir"> <br>
    Alamat : <input type="text" name="alamat"> <br>

    <input type="hidden" name="tambahWarga">

    <button type="submit">Tambah</button>
  </form>
</body>

</html>