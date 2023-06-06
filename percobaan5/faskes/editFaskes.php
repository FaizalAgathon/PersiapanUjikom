<?php

include "../koneksi.php";

$faskes = query("SELECT * FROM faskes WHERE idFaskes = '$_GET[idFaskes]'")[0];

if (isset($_POST['editFaskes'])) {
  mysqli_query($link, "UPDATE faskes SET 
  namaFaskes = '$_POST[nama]'
  WHERE idFaskes = '$_POST[editFaskes]'
  -- WHERE idFaskes = '$_GET[idFaskes]'
  ");

  header("Location: faskes.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Faskes</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <th>
          <h3>Edit Faskes</h3>
        </th>
      </tr>
      <tr>
        <td>Nama : </td>
        <td><input type="text" name="nama" value="<?= $faskes['namaFaskes'] ?>"></td>
      </tr>
      <tr>
        <td><button type="submit" name="editFaskes" value="<?= $faskes['idFaskes'] ?>">Edit Faskes</button></td>
      </tr>
    </table>
  </form>
</body>

</html>