<?php
  header("Content-Type: text/html; charset=utf-8");
  $directory_id =$_POST['directory_id'];
  $owner_id = $_POST['owner_id'];
  $account_id = $_POST['account_id'];
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  if(isset($_POST['change']))
  {
    $query = "UPDATE directory
              SET owner_id ='$owner_id',
                  account_id = '$account_id',
              WHERE directory_id = '$directory_id'";
    $result = mysqli_query($link,$query);
    header("Location: main.php");
  }
  elseif(isset($_POST['delete']))
  {
    $query = "DELETE FROM directory
              WHERE directory_id = '$directory_id'";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
?>