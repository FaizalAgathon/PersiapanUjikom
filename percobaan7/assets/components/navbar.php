<nav class="navbar container-fluid justify-content-between align-content-center column-gap-5 p-2 bg-dark text-light">
  <div class="section1 d-flex justify-content-start align-content-center column-gap-5 text-center">
    <h1 class="nav-brand">Sistem Informasi Pengelolaan KIS</h1>
    <a href="../kis/kis.php" class="nav-link 
  <?= (basename($_SERVER['REQUEST_URI']) == 'kis.php' ||
    basename($_SERVER['REQUEST_URI']) == 'editKIS.php' ||
    basename($_SERVER['REQUEST_URI']) == 'tambahKIS.php'
  ) ? 'fw-bold text-decoration-underline' : '' ?>">Data KIS</a>
    <a href="../faskes/faskes.php" class="nav-link 
    <?= (basename($_SERVER['REQUEST_URI']) == 'faskes.php' ||
      basename($_SERVER['REQUEST_URI']) == 'editFaskes.php' ||
      basename($_SERVER['REQUEST_URI']) == 'tambahFaskes.php'
    ) ? 'fw-bold text-decoration-underline' : '' ?> ">Data Faskes</a>
  </div>
  <div class="section2 d-flex justify-content-start align-content-center column-gap-5 text-center">
    <a href="../ubahPassword.php" class="nav-link">Ubah Password</a>
    <a href="../logout.php" class="nav-link">Log out</a>
  </div>
</nav>