<?php

session_start();

if (isset($_SESSION['login'])) {
  header("Location:home.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_5");

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

if (isset($_POST['login'])) {

  if (query("SELECT * FROM user") == []) {
    mysqli_query($link, "INSERT INTO user VALUES (NULL, 'admin', 'admin')");
  }

  $username = query("SELECT username FROM user")[0]['username'];
  $password = query("SELECT password FROM user")[0]['password'];

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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="refresh" content="1"> -->
  <title>Login</title>
  <style>
    form{
      width: 60%;
      border: 2px solid;
      border-radius: 24px;
      overflow: hidden;
      /* padding: 12p; */
    }
    .judul h1 {
      margin: 0;
      text-align: center;
      line-height: 32px;
      background-color: aqua;
    }
    .columns {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 12px;
    }
    .kolomBtn{
      width: 100%;
    }
    .kolomBtn button{
      width: 100%;
      font-size: 24px;
      border: 0;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <form action="" method="post">
    <div class="judul">
      <h1>Login User</h1>
    </div>
    <div class="columns">
      <div class="kolomUsername">
        <p>Username : </p>
        <input type="text" name="username">
      </div>
      <div class="kolomPassword">
        <p>Password : </p>
        <input type="password" name="password">
      </div>
    </div>
    <div class="kolomBtn">
      <button type="submit" name="login">Login</button>
    </div>
  </form>

</body>

</html>