<?php

if (isset($_GET['alert'])) : ?>

  <div class="alert alert-warning alert-dismissible fade show">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php endif ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap-5.3.0-dist/css/bootstrap.css">
  <style>
    body {
      position: relative;
    }

    .alert {
      position: absolute;
      bottom: 20px;
      right: 20px;
    }
  </style>
</head>

<body>

  <a href="?alert" class="btn btn-primary w-100">Alert</a>

  <script src="../bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
  <script>
    const alert = document.querySelector('.alert')

    setInterval(function() {
      alert.classList.remove('show')
    }, 2000)
  </script>
</body>

</html>