<?php include "../koneksi.php";

if (isset($_POST['tambahKIS'])) {
  if (query("SELECT * FROM kis") == []) {
    $noKIS = date("Y") . '0001';
  } else {
    $noKISTerakhir = query("SELECT MAX(noKIS) as noKISTerakhir FROM kis")[0]['noKISTerakhir']; 
    // cari noKIS terbesar dari tabel kis, ambil index 0, ambil isi nya yg nama indexnya "noKISTerakhir"

    $noKIS_split = str_split($noKISTerakhir, 4)[1]; // ngebagi string jadi 2, 
    // jadinya dlm bentuk array dan ngambil isi dari array yg indexnya 1

    $noKIS_int = (int) $noKIS_split + 1; // ngubah string ke int dan di tambah 1
    
    $noKIS_pad = str_pad($noKIS_int, 4, "0", STR_PAD_LEFT); // nyimpen noKIS int yg udh di tambah 1, 
    // terus tambahin string "0" dikiri dengan total digit semuanya 4

    $noKIS = date("Y") . $noKIS_pad; // nyimpen tahun sekarang dan noKIS yg shd berformat
  }

  mysqli_query($link, "INSERT INTO warga VALUES(
    '$_POST[nik]', '$_POST[nama]', '$_POST[tglLahir]', '$_POST[alamat]'
    )");
  mysqli_query($link, "INSERT INTO kis VALUES(
    '$noKIS', '$_POST[nik]', '$_POST[faskes]'
  )");
  $_SESSION['add'] = "Berhasil Menambah Data KIS";
  header("Location: kis.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Faskes</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body>

<?php include "../assets/components/navbar.php" ?>

  <div class="container">
    <h1 class="text-center mb-3">Tambah Data KIS</h1>
    <form action="" method="post">
      <div class="form-floating mb-3">
        <select name="" id="">
          <?php foreach (query("SELECT * FROM warga WHERE kis.nikWarga != warga.nikWarga") as $warga) : ?>
          <option value="<?= $warga['nikWarga'] ?>"><?= $warga['nikWarga'] ?> - <?= $warga['namaWarga'] ?></option>
          <?php endforeach ?>
        </select>
        <label for="floatingInput">NIK Warga</label>
      </div>
      <!-- <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="nik" autofocus>
        <label for="floatingInput">NIK Warga</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="nama">
        <label for="floatingInput">Nama Warga</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput" name="tglLahir">
        <label for="floatingInput">Tanggal Lahir</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="alamat">
        <label for="floatingInput">Alamat Warga</label>
      </div>
      <div class="form-floating mb-3">
        <select name="faskes" id="floatingInput" class="form-control">
          <?php foreach (query("SELECT * FROM faskes ORDER BY namaFaskes ASC") as $faskes) : ?>
            <option value="<?= $faskes['idFaskes'] ?>"><?= $faskes['namaFaskes'] ?></option>
          <?php endforeach ?>
        </select>
        <label for="floatingInput">Faskes</label>
      </div> -->
      <button type="submit" class="btn btn-success" name="tambahKIS">Tambah KIS</button>
    </form>
  </div>


</body>

</html>