<?php
include "koneksi.php";

$sqlInsertWarga = "INSERT INTO warga VALUES 
  ($_POST[nik],'$_POST[nama]','$_POST[alamat]','$_POST[tanggal_lahir]')";
mysqli_query($link, $sqlInsertWarga);

// $formatNoKartu = 

$sqlInsertKIS = "INSERT INTO kis VALUES (NULL, $_POST[nik], $_POST[faskes])";

if (mysqli_query($link, $sqlInsertKIS) === TRUE) {
  echo "<script>
      alert('Data Berhasil Ditambahkan');
      document.location.href = 'index.php';
      </script>";
} else {
  echo "<script>
      alert('Data Gagal Ditambahkan');
      document.location.href = 'index.php';
  </script>";
}