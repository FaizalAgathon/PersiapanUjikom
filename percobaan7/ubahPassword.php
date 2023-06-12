<?php include "koneksi.php";

if (isset($_POST['ubahPassword'])) {
  mysqli_query($link, "UPDATE user SET 
  userPass = '$_POST[userPass]'
  WHERE userId = $_POST[userId]");

  unset($_SESSION['login']);
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Password</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
  <form action="" method="post" class="w-50 mx-auto mt-5 d-flex flex-column border border-3 rounded rounded-5 overflow-hidden">
    <div class="mb-3 bg-dark text-light text-center">
      <h1>Ubah Password</h1>
    </div>
    <div class="mb-3 px-3">
      <label for="userName" class="form-label">Password Sebelumnya</label>
      <input type="text" class="form-control" id="userName" value="<?= $_SESSION['login']['userPass'] ?>" disabled>
    </div>
    <div class="mb-3 px-3">
      <label for="userPass" class="form-label">Password Baru</label>
      <input type="text" name="userPass" class="form-control" id="userPass" autofocus>
    </div>
    <input type="hidden" name="userId" value="<?= $_SESSION['login']['userId'] ?>">
    <button type="submit" name="ubahPassword" class="btn btn-warning" style="font-size: 18px;">Ubah</button>
  </form>
</body>

</html>