<?php 

// Untuk ngebuat $_SESSION 
// Pokoknya kalo engga ada ini session engga bisa di aktifin
session_start();

// Koneksi seperti biasa
$link = mysqli_connect("localhost", "root", "", "db_ujikom_2");

// Function query seperti biasa
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
