<?php include "../koneksi.php";

if(isset($_POST['editFaskes'])){
  mysqli_query($link, "UPDATE faskes SET 
  namaFaskes = '$_POST[nama]'
  WHERE idFaskes = $_GET[id]
  ");
  $_SESSION['edit'] = "Berhasil Mengedit Data Faskes";
  header("Location: faskes.php");
}

$faskes = query("SELECT * FROM faskes WHERE idFaskes = $_GET[id]")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Faskes</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>

<div class="container">
  <h1 class="text-center mb-3">Edit Data Faskes</h1>
  <form action="" method="post">
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="nama" value="<?= $faskes['namaFaskes'] ?>">
      <label for="floatingInput">Nama Faskes</label>
    </div>
    <button type="submit" class="btn btn-warning" name="editFaskes">Edit Faskes</button>
  </form>
</div>

<script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>