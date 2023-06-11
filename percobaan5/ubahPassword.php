<?php include "koneksi.php";

$user = query("SELECT * FROM user")[0];

if (isset($_POST['ubahPassword'])) {
  mysqli_query($link, "UPDATE user SET 
  password = '$_POST[password]'
  WHERE idUser = 1");

  unset($_SESSION['login']);

  header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Password</title>
  <!-- <meta http-equiv="refresh" content="1"> -->
</head>

<body>

  <form action="" method="post">
    Username : <?= $user['username'] ?> <br>
    Password Sebelumnya : <?= $user['password'] ?> <br>
    Password Baru : <input type="text" name="password"> <br>
    <button type="submit" name="ubahPassword">Ubah</button>
  </form>

</body>

</html>