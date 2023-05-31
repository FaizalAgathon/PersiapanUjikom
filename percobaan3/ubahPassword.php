<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Password</title>
</head>

<?php session_start();

if (isset($_POST['ubahPassword'])) {
  $_SESSION['password'] = $_POST['password'];
  unset($_SESSION['login']);
  header("Location: login.php");
}

?>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <th colspan="2">Login</th>
      </tr>
      <tr>
        <td>Password Sebelumnya : </td>
        <td><?= $_SESSION['password'] ?></td>
      </tr>
      <tr>
        <td>Password Baru : </td>
        <td><input type="text" name="password"></td>
      </tr>
      <tr>
        <th><button type="submit" name="ubahPassword">Ubah</button></th>
      </tr>
    </table>
  </form>
</body>

</html>