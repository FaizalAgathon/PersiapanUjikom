<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit KIS</title>
</head>

<?php include "../koneksi.php";

$kis = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes WHERE noKIS = $_GET[id]")[0];

if (isset($_POST['editKIS'])) {
  mysqli_query($link, "UPDATE kis SET
  nikWarga = '$_POST[warga]',
  idFaskes = '$_POST[faskes]'
  WHERE noKIS = '$_GET[id]'");

  header("Location: kis.php");
}

?>

<body>
  <form action="" method="post">
    <table border="1">
      <tr>
        <th>Edit KIS</th>
      </tr>
      <tr>
        <td>NIK Warga : </td>
        <td>Faskes : </td>
      </tr>
      <tr>
        <td>
          <select name="warga">
            <?php foreach (query("SELECT * FROM warga") as $warga) : ?>
              <option value="<?= $kis['nikWarga'] ?>" <?= ($kis['nikWarga'] == $warga['nikWarga']) ? 'selected' : '' ?>><?= $kis['nikWarga'] ?> - <?= $kis['namaWarga'] ?></option>
            <?php endforeach ?>
          </select>
        </td>
        <td>
          <select name="faskes">
            <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
              <option value="<?= $kis['idFaskes'] ?>" <?= ($kis['idFaskes'] == $faskes['idFaskes']) ? 'selected' : '' ?> >
              <?= $faskes['namaFaskes'] ?>
            </option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <input type="hidden" name="editKIS" value="<?= $kis['noKIS'] ?>">
          <button type="submit">Edit</button>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>