<?php include "../koneksi.php";

if (isset($_POST['editKIS'])) {
  mysqli_query($link, "UPDATE kis SET 
  idFaskes = '$_POST[faskes]'
  WHERE noKIS = $_GET[id]
  ");
  mysqli_query($link, "UPDATE warga SET
  namaWarga = '$_POST[nama]',
  tglLahirWarga = '$_POST[tglLahir]',
  alamatWarga = '$_POST[alamat]'
  WHERE nikWarga = '$_POST[nik]'");
  $_SESSION['edit'] = "Berhasil Mengedit Data KIS";
  header("Location: kis.php");
}

// $kis = query("SELECT * FROM kis 
// INNER JOIN warga ON kis.nikWarga = warga.nikWarga
// INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes 
// WHERE noKIS = $_GET[id]")[0];

$query = mysqli_query($link, "SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes 
WHERE noKIS = $_GET[id]");
$result = mysqli_fetch_assoc($query);
var_dump($result);
exit;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit KIS</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>

<?php include "../assets/components/navbar.php" ?>

  <div class="container">
    <h1 class="text-center mb-3">Edit Data KIS</h1>
    <form action="" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" value="<?= $kis['noKIS'] ?>" disabled>
        <label for="floatingInput">No KIS</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" value="<?= $kis['nikWarga'] ?>" disabled>
        <label for="floatingInput">NIK Warga</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="nama" value="<?= $kis['namaWarga'] ?>">
        <label for="floatingInput">Nama Warga</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput" name="tglLahir" value="<?= $kis['tglLahirWarga'] ?>">
        <label for="floatingInput">Tanggal Lahir</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="alamat" value="<?= $kis['alamatWarga'] ?>">
        <label for="floatingInput">Alamat Warga</label>
      </div>
      <div class="form-floating mb-3">
        <select name="faskes" id="floatingInput" class="form-control">
          <?php foreach (query("SELECT * FROM faskes ORDER BY namaFaskes ASC") as $faskes) : ?>
            <option value="<?= $faskes['idFaskes'] ?>" <?= ($kis['idFaskes'] == $faskes['idFaskes']) ? 'selected' : '' ?>><?= $faskes['namaFaskes'] ?></option>
          <?php endforeach ?>
        </select>
        <label for="floatingInput">Faskes</label>
      </div>
      <input type="hidden" name="nik" value="<?= $kis['nikWarga'] ?>">
      <button type="submit" class="btn btn-warning" name="editKIS">Edit KIS</button>
    </form>
  </div>

  <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>