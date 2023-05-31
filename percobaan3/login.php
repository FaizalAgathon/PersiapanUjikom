<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<?php session_start();

$_SESSION['username'] = 'admin';
if (!isset($_SESSION['password'])){
  $_SESSION['password'] = '123';
}

if (isset($_SESSION['login'])){
  header("Location: index.php");
}

if (isset($_POST['login'])){
  if ($_POST['username'] != $_SESSION['username']){ ?>
    <script>
      alert("Username Salah!")
    </script>
  <?php } else if ($_POST['password'] != $_SESSION['password']){ ?>
    <script>
      alert("Password Salah!")
    </script>
  <?php } else {
    $_SESSION['login'] = true;
    header("Location: index.php");
  }
}

?>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <th colspan="2">Login</th>
      </tr>
      <tr>
        <td>Username : </td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password : </td>
        <td><input type="text" name="password"></td>
      </tr>
      <tr>
        <th><button type="submit" name="login">Login</button></th>
      </tr>
    </table>
  </form>
</body>

</html>