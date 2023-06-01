<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<?php

session_start();

if (isset($_SESSION['login'])) {
  header("Location: home.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_4");

function query($sql)
{
  global $link;
  $rows = [];
  $query = mysqli_query($link, $sql);

  while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
  }

  return $rows;
}

$username = query("SELECT username FROM user")[0]['username'];
$password = query("SELECT password FROM user")[0]['password'];

if (isset($_POST['login'])) {
  if ($_POST['username'] != $username) { ?>

    <script>
      alert("Username Salah!")
    </script>

  <?php } else if ($_POST['password'] != $password) { ?>

    <script>
      alert("Password Salah!")
    </script>

<?php } else {
    $_SESSION['login'] = true;
    header("Location: home.php");
  }
}

?>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <th>LOGIN</th>
      </tr>
      <tr>
        <td>Username : </td>
        <td>Password : </td>
      </tr>
      <tr>
        <td><input type="text" name="username"></td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td><button type="submit" name="login">Login</button></td>
      </tr>
    </table>
  </form>
</body>

</html>