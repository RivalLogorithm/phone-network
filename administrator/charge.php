<?php
  header("Content-Type: text/html; charset=utf-8");
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  $query = "CALL charge_money()";
  $result = mysqli_query($link, $query);
  header("Location: main.php");
 ?>