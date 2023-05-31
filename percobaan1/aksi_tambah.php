<?php
include "koneksi.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$faskes = $_POST['faskes'];

var_dump($nik);

// $ping = "SELECT * FROM warga WHERE nik = '$nik'";
// $result = $link->query($ping);

// if ($result->num_rows > 0) {
//   echo "<script>
//     alert('NIK Sudah Terdaftar !!');
//     document.location.href = 'tambah.php';
//     </script>";
// } else {

  $sqlWarga = "INSERT INTO warga VALUES ($nik,'$nama','$alamat','$tanggal_lahir')";
  var_dump($nik);
  $query = mysqli_query($link, $sqlWarga);
  $sqlKIS = "INSERT INTO kis VALUES (NULL,'$nik','$faskes')";

  if (mysqli_query($link, $sqlKIS) === TRUE) {
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
// }
