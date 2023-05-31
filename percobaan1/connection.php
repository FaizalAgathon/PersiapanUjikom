<?php

try {

  $link = new mysqli("localhost", "root", "", "belajar-laravel-9");

  include "functions.php";

  $_SESSION['cekDB'] = true;
} catch (mysqli_sql_exception $e) { ?>

  <div class="alert alert-danger" role="alert">
    <strong>ALERT!</strong><?= $e->getMessage() ?>
  </div>

  <?php

  $_SESSION['cekDB'] = false

  ?>

<?php } ?>