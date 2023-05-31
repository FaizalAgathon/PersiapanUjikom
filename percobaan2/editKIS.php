<!DOCTYPE html>
<html lang="en">

<?php
include "koneksi.php";

$data = query("SELECT * FROM kis 
INNER JOIN warga ON kis.nikWarga = warga.nikWarga 
INNER JOIN faskes ON kis.idFaskes = faskes.idFaskes
WHERE noKIS = $_GET[no]")[0]; /* Ini aku pake [0] di akhir functioon query supaya langsung dapet index pertama nya */
// Kenapa harus pake [0] karena ini aku cuma mau ngambil 1 data / 1 baris, karena pake WHERE

// Kalo tanpa [0]
// 0 => ['noKIS' => '...'],
//      ['nikWarga' => '...'],
//      ['namaWarga' => '...'],
//      ['idFaskes' => '...']

// Kalo pake [0]
// ['noKIS' => '...'],
// ['nikWarga' => '...'],
// ['namaWarga' => '...'],
// ['idFaskes' => '...']

// Ngecek kalo ada nik yg dikirim dari form
if (isset($_POST['nik'])) {
  // Pertama update tabel warga
  mysqli_query($link, "UPDATE warga SET 
    namaWarga = '$_POST[nama]',
    tglLahirWarga = '$_POST[tglLahir]',
    alamatWarga = '$_POST[alamat]'
    WHERE nikWarga = '$_POST[nik]'");
  // kedua update tabel kis
  mysqli_query($link, "UPDATE kis SET 
    idFaskes = '$_POST[faskes]'
    WHERE noKIS = '$_POST[noKIS]'");
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
  <a href="home.php">
    << Kembali</a>
      <form action="" method="post">
        No Kartu : <?= $data['noKIS'] ?> <input type="hidden" name="noKIS" value="<?= $data['noKIS'] ?>"> <br>

        NIK : <?= $data['nikWarga'] ?> <input type="hidden" name="nik" value="<?= $data['nikWarga'] ?>"> <br>

        Nama : <input type="text" name="nama" value="<?= $data['namaWarga'] ?>"> <br>

        Tanggal Lahir : <input type="date" name="tglLahir" value="<?= $data['tglLahirWarga'] ?>"> <br>

        Alamat : <input type="text" name="alamat" value="<?= $data['alamatWarga'] ?>"> <br>

        Faskes :
        <select name="faskes">
          <option selected>Pilih...</option>
          <?php foreach (query("SELECT * FROM faskes") as $faskes) : ?>
            <!-- Ini untuk mengecek kalo idFaskes dari db sama dengan idFaskes yg di ambil dari sql query yg diatas -->
            <option <?= ($faskes['idFaskes'] == $data['idFaskes']) ? 'selected' : '' ?>
            value="<?= $faskes['idFaskes'] ?>">
              <!-- Ini  -->

              <?= $faskes['namaFaskes'] ?>
            </option>
          <?php endforeach ?>
        </select>

        <button type="submit">Edit</button>
      </form>
</body>

</html>