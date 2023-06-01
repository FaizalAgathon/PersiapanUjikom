<?php 

session_start();

if (!isset($_SESSION['login'])){
  header("Location: ../login.php");
}

$link = mysqli_connect("localhost", "root", "", "db_ujikom_4");

function query($sql)
{
  global $link;
  $rows = [];
  $query = mysqli_query($link, $sql);

  while ($row = mysqli_fetch_assoc($query)){
    $rows[] = $row;
  }

  return $rows;
}