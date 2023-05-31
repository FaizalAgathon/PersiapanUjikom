<!DOCTYPE html>
<html lang="en">

<?php 
include "koneksi.php";

if(isset($_POST['nik'])){
  mysqli_query($link, "INSERT INTO warga VALUES ('$_POST[nik]', '$_POST[nama]','$_POST[tglLahir]', '$_POST[alamat]')");
  $noKIS = rand(100000000000,999999999999);
  mysqli_query($link, "INSERT INTO kis VALUES ('$noKIS', '$_POST[nik]', '$_POST[faskes]')");
  header("Location: home.php");
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>

<body>
  <a href="home.php"><< Kembali</a>
  <form action="" method="post">
    NIK : <input type="number" name="nik"> <br>
    Nama : <input type="text" name="nama"> <br>
    Tanggal Lahir : <input type="date" name="tglLahir"> <br>
    Alamat : <input type="text" name="alamat"> <br>
    Faskes :
    <select name="faskes">
      <option selected>Pilih...</option>
      <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
        <option value="<?= $faskes['idFaskes'] ?>"><?= $faskes['namaFaskes'] ?></option>
      <?php endforeach ?>
    </select>
    <button type="submit">Tambah</button>
  </form>
</body>

</html>