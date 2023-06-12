<?php include "../koneksi.php";

if(isset($_POST['tambahFaskes'])){
  mysqli_query($link, "INSERT INTO faskes VALUES(NULL, '$_POST[nama]')");
  $_SESSION['add'] = "Berhasil Menambah Data Faskes";
  header("Location: faskes.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Faskes</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>

<?php include "../assets/components/navbar.php" ?>

<div class="container">
  <h1 class="text-center mb-3">Tambah Data Faskes</h1>
  <form action="" method="post">
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="nama" autofocus>
      <label for="floatingInput">Nama Faskes</label>
    </div>
    <button type="submit" class="btn btn-success" name="tambahFaskes">Tambah Faskes</button>
  </form>
</div>


</body>

</html>