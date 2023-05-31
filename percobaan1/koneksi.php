<?php

session_start();

$link = mysqli_connect("localhost", "root", "", "db_ujikom");

function query($sql){

  global $link;
  $rows = [];
  $query = mysqli_query($link, $sql);

  while($row = mysqli_fetch_assoc($query)){
    $rows[] = $row;
  }
  return $rows;

}