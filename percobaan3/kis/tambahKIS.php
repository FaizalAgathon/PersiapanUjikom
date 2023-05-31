<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah KIS</title>
</head>

<?php include "../koneksi.php";

if (isset($_POST['tambahKis'])) {
  $noKIS = rand(100000000000, 999999999999);
  mysqli_query($link, "INSERT INTO kis VALUES (
    '$noKIS', 
    '$_POST[nik]', 
    '$_POST[faskes]'
  )");

  header("Location: kis.php");
}

?>

<body>
<?php var_dump(query("SELECT * FROM faskes")) ?>
<?php foreach(query("SELECT * FROM faskes") as $faskes) {
  var_dump($faskes);
} ?>

  <form action="" method="post">
    NIK : <select name="nik">
      <?php foreach (query("SELECT * FROM warga") as $warga) : ?>
        <option value="<?= $warga['nikWarga'] ?>">
          <?= $warga['nikWarga'] ?> - <?= $warga['namaWarga'] ?>
        </option>
      <?php endforeach ?>
    </select> <br>
    Faskes : <select name="faskes">
      
      <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
        <option value="<?= $faskes['idFaskes'] ?>">
        <?= $faskes['namaFaskes'] ?>
        </option>
      <?php endforeach ?>
    </select> <br>

    <input type="hidden" name="tambahKis">

    <button type="submit">Tambah</button>
  </form>
</body>

</html>