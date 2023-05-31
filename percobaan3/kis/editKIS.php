<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit KIS</title>
</head>

<?php include "../koneksi.php";

// if (isset($_POST['editKis'])) {
//   mysqli_query($link, "UPDATE kis SET 
//     nikWarga = '$_POST[warga]',
//     idFaskes = '$_POST[faskes]'
//     WHERE noKIS = '$_POST[editKIS]'
//   ");

//   header("Location: kis.php");
// }


// Proses pengeditan data
if (isset($_POST['editKis'])) {
  $nikWarga = $_POST['warga'];
  $idFaskes = $_POST['faskes'];
  $idkis = $_GET['id'];

  // Perintah UPDATE untuk mengedit data
  $query = "UPDATE kis SET nikWarga = '$nikWarga', idFaskes = '$idFaskes' WHERE noKIS = '$idkis'";
  mysqli_query($link, $query);

  // Redirect atau arahkan ke halaman setelah pengeditan data
  header("Location: kis.php");
  exit;
}

$kis = query("SELECT * FROM kis WHERE noKIS = $_GET[id]")[0];

?>

<body>
  <form action="" method="post">
    NIK : <select name="warga">
      <?php foreach (query("SELECT * FROM warga") as $warga) : ?>
        <option value="<?= $warga['nikWarga'] ?>" <?= ($warga['nikWarga'] == $kis['nikWarga']) ? 'selected' : '' ?>>
          <?= $warga['nikWarga'] ?> - <?= $warga['namaWarga'] ?>
        </option>
      <?php endforeach ?>
    </select> <br>

    Faskes : <select name="faskes">
      <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
        <option value="<?= $faskes['idFaskes'] ?>" 
        <?= ($faskes['idFaskes'] == $kis['idFaskes']) ? 'selected' : '' ?> >
          <?= $faskes['namaFaskes'] ?>
        </option>
      <?php endforeach ?>
    </select> <br>

    <button type="submit" name="editKis" value="<?= $kis['noKIS'] ?>">Edit</button>
  </form>
</body>

</html>