<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Faskes</title>
</head>

<?php include "../koneksi.php";

if (isset($_POST['tambahFaskes'])) {
  mysqli_query($link, "INSERT INTO faskes VALUES (
    NULL, 
    '$_POST[nama]'
  )");

  header("Location: faskes.php");
}

?>

<body>
  <form action="" method="post">
    Nama : <input type="text" name="nama"> <br>

    <input type="hidden" name="tambahFaskes">

    <button type="submit">Tambah</button>
  </form>
</body>

</html>