<?php session_start();

if (isset($_SESSION['login'])){
  header("Location: kis/kis.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_7");

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

if (query("SELECT * FROM user") == []) {
  mysqli_query($link, "INSERT INTO user VALUES(NULL, 'admin', 'admin')");
}

if (isset($_POST['login'])) {
  $cekUserName = query("SELECT * FROM user WHERE userName = '$_POST[userName]'");
  $cekUserPass = query("SELECT * FROM user WHERE userPass = '$_POST[userPass]'");
  if ($cekUserName == []) { ?>

    <div class="alert alert-dismissible alert-danger fade show">
      Username Salah!
    </div>

  <?php } else if ($cekUserPass == []) { ?>

    <div class="alert alert-dismissible alert-danger fade show">
      Password Salah!
    </div>

<?php } else {

    $_SESSION['login'] = [
      'userId' => $cekUserName[0]['userId'],
      'userName' => $cekUserName[0]['userName'],
      'userPass' => $cekUserPass[0]['userPass'],
    ];
    header("Location: kis/kis.php");

  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <style>
    body{
      position: relative;
    }
    .alert{
      position: absolute;
      width: 50%;
      top: 100px;
    }
  </style>
</head>

<body>
  <form action="" method="post" class="w-50 mx-auto d-flex flex-column border border-3 rounded rounded-5 overflow-hidden" style="margin-top: 15%;">
    <div class="mb-3 bg-dark text-light text-center">
      <h1>Login Page</h1>
    </div>
    <div class="mb-3 px-3">
      <label for="userName" class="form-label">Username</label>
      <input type="text" name="userName" class="form-control" id="userName" autofocus>
    </div>
    <div class="mb-3 px-3">
      <label for="userPass" class="form-label">Password</label>
      <input type="text" name="userPass" class="form-control" id="userPass">
    </div>
    <button type="submit" name="login" class="btn btn-success" style="font-size: 18px;">Login</button>
  </form>

  <script>
    const alert = document.querySelector('.alert')
    setInterval(function(){
      alert.classList.remove('show')
    }, 3000)
  </script>
</body>

</html>