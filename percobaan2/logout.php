<?php 
include "koneksi.php";

session_destroy(); /* Ngehapus semua session termasuk login */
header("Location: login.php");
?>