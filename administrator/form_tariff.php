<?php
  header("Content-Type: text/html; charset=utf-8");
  $tariff_id = $_POST['tariff_id'];
  $tariff_name = $_POST['tariff_name'];
  $per_minute = $_POST['per_minute'];
  $per_minute_rouming = $_POST['per_minute_rouming'];
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  if(isset($_POST['change']))
  {
    $query = "CALL update_tariff('$tariff_id', '$tariff_name', '$per_minute', '$per_minute_rouming')";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
  elseif(isset($_POST['delete']))
  {
    $query = "CALL delete_tariff('$tariff_id')";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
?>