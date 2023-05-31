<!DOCTYPE html>
<html lang="en">

<?php

include "koneksi.php";

if (isset($_POST['username'])) {
  // Ngecek kalo username bukan 'admin'
  if ($_POST['username'] != 'admin') { ?>

    <script>
      alert("Username Salah!");
    </script>

    <!-- Ngecek kalo password bukan 'letmein' -->
  <?php } else if ($_POST['password'] != 'letmein') { ?>

    <script>
      alert("Password Salah!");
    </script>

<?php } else {
    $_SESSION['login'] = true;/* Ngaktifin session login */
    header("Location: home.php");
  }
}

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <form action="" method="post">
    Username : <input type="text" name="username"> <br>
    Password : <input type="password" name="password"> <br>
    <button type="submit">Login</button>
  </form>
</body>

</html>