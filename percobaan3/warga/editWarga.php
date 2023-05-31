<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Warga</title>
</head>

<?php include "../koneksi.php";

$warga = query("SELECT * FROM warga WHERE nikWarga = $_GET[id]")[0];

if (isset($_POST['editWarga'])){
  mysqli_query($link, "UPDATE warga SET 
  namaWarga = '$_POST[nama]',
  tglLahirWarga = '$_POST[tglLahir]',
  alamatWarga = '$_POST[alamat]'
  WHERE nikWarga = '$_POST[editWarga]'");

  header("Location: warga.php");
}

?>

<body>
  <form action="" method="post">
    NIK : <?= $warga['nikWarga'] ?> <br>
    Nama : <input type="text" name="nama" value="<?= $warga['namaWarga'] ?>"> <br>
    Tanggal Lahir : <input type="date" name="tglLahir" value="<?= $warga['tglLahirWarga'] ?>"> <br>
    Alamat : <input type="text" name="alamat" value="<?= $warga['alamatWarga'] ?>"> <br>

    <input type="hidden" name="editWarga" value="<?= $warga['nikWarga'] ?>">

    <button type="submit">Edit</button>
  </form>
</body>

</html>