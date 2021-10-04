<?php
  header("Content-Type: text/html; charset=utf-8");
  $owner_id = $_POST['owner_id'];
  $owner_name = $_POST['owner_name'];
  $face = $_POST['face'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  if(isset($_POST['change']))
  {
    $query = "UPDATE owner
              SET owner_name = '$owner_name',
                  face = '$face',
                  city = '$city',
                  address = '$address'
              WHERE owner_id = '$owner_id'";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
  elseif (isset($_POST['delete']))
  {
    $query = "DELETE FROM owner
              WHERE owner_id ='$owner_id'";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
?>