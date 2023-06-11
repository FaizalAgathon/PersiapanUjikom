<?php 

session_start();

if (!isset($_SESSION['login'])){
  header("Location: login.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_6");

function query($sql){
  global $link;
  $query = mysqli_query($link, $sql);
  $rows = [];

  while ($row = mysqli_fetch_assoc($query)){
    $rows[] = $row;
  }

  return $rows;
}
