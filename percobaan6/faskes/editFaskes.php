<?php

include "../koneksi.php";

if (isset($_POST['editFaskes'])){

  mysqli_query($link, "UPDATE faskes SET 
    namaFaskes = '$_POST[nama]'
    WHERE idFaskes = '$_POST[idFaskes]'
  ");

  $_SESSION['edit'] = "Berhasil Mengedit Data";
  header("Location: faskes.php");
}

$faskes = query("SELECT * FROM faskes WHERE idFaskes = '$_GET[idFaskes]'")

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDIT FASKES</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>
  <div class="container">
    <form action="" method="post">
      <div class="input-group mb-3">
        <label for="nama" class="form-control">NAMA</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= $faskes['namaFaskes'] ?>">
      </div>
      <div class="input-group">
        <input type="hidden" name="idFaskes" value="<?= $faskes['idFaskes'] ?>">
        <button type="submit" class="btn btn-success" name="editFaskes">ADD FASKES</button>
      </div>
    </form>
  </div>
</body>

</html>