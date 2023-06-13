<?php 

$link = new mysqli("localhost", "root", "", "db_ujikom_7");

function query($sql){
  global $link;
  $query = $link->query($sql);
  $rows = [];

  while ($row = $query->fetch_assoc()){
    $rows[] = $row;
  }

  return $rows;
}

$sql = "CALL searchNamaFaskes(:paramNamaFaskes)";
$stmt = $link->prepare($sql);
$pencarian = 'talun';
$stmt->bind_param(":paramNamaFaskes", $pencarian);
$stmt->execute();
$faskes = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($faskes);

// print_r(query("SELECT * FROM faskes"));


?>