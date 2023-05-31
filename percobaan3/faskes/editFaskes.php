<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Faskes</title>
</head>

<?php include "../koneksi.php";

$faskes = query("SELECT * FROM faskes WHERE idFaskes = $_GET[id]")[0];

if (isset($_POST['editFaskes'])){
  mysqli_query($link, "UPDATE faskes SET 
  namaFaskes = '$_POST[nama]'
  WHERE idFaskes = $_POST[editFaskes]");

  header("Location: faskes.php");
}

?>

<body>
  <form action="" method="post">
    Nama : <input type="text" name="nama" value="<?= $faskes['namaFaskes'] ?>"> <br>

    <input type="hidden" name="editFaskes" value="<?= $faskes['idFaskes'] ?>">
    
    <button type="submit">Edit</button>
  </form>
</body>

</html>