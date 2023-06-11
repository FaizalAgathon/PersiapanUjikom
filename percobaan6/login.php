<?php

session_start();

if (isset($_SESSION['login'])) {
  header("Location: home.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_6");

function query($sql)
{
  global $link;
  $query = mysqli_query($link, $sql);
  $rows = [];

  while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
  }

  return $rows;
}

if (query("SELECT * FROM user") == []) {
  mysqli_query($link, "INSERT INTO user VALUES(NULL, 'admin', 'admin')");
}

$username = query("SELECT username FROM user")[0]['username'];
$password = query("SELECT password FROM user")[0]['password'];

if (isset($_POST['login'])) :
  if ($_POST['username'] != $username) { ?>
    <script>
      alert("Username Salah")
    </script>
  <?php } else if ($_POST['password'] != $password) { ?>
    <script>
      alert("Password Salah")
    </script>
  <?php } else {
    $_SESSION['login'] = true;
    header("Location: home.php");
  } ?>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
  <div class="container">
    <form action="" method="post" class="d-block card w-25 h-50 mx-auto mt-5 rounded-4 overflow-hidden">
      <h1 class="text-center bg-secondary text-light py-2">Login Page</h1>
      <div class="content p-5">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>