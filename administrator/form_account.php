<?php
  header("Content-Type: text/html; charset=utf-8");
  $account_id = $_POST['account_id'];
  $phone_number = $_POST['phone_number'];
  $tariff_id = $_POST['tariff_id'];
  $balance = $_POST['balance'];
  $minutes = $_POST['minutes'];
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  if(isset($_POST['change']))
  {
    $query = "UPDATE account
              SET phone_number = '$phone_number',
                  tariff_id = '$tariff_id',
                  balance = '$balance',
                  minutes = '$minutes'
              WHERE account_id = '$account_id'";
    $result = mysqli_query($link, $query);

    $query = "SELECT balance
              FROM account";
    $result = mysqli_query($link, $query);
    $obj = mysqli_fetch_object($result);
    if($obj->balance >= 0)
    {
      $query = "UPDATE directory d
                SET status = null
                WHERE d.account_id = '$account_id'";
      $result = mysqli_query($link, $query);
    }
    header("Location: main.php");
  }
  elseif(isset($_POST['delete']))
  {
    $query = "DELETE FROM account
              WHERE account_id = '$account_id'";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
?>