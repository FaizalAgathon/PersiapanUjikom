<?php

global $link;

function query($sql)
{

  global $link;
  $rows = [];

  $query = $link->query($sql);

  while ($row = $query->fetch_assoc()) {
    $rows[] = $row;
  }

  return $rows;
}
