<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  $query = "SELECT o.owner_id, o.owner_name
            FROM owner o
            WHERE NOT EXISTS (
              SELECT * FROM directory d
              WHERE d.owner_id = o.owner_id)";
  $result = mysqli_query($link, $query);
  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Владелец <select name='owner_id'>";
  while($obj = mysqli_fetch_object($result))
  {
    echo "<option value='$obj->owner_id' > $obj->owner_name";
  }
  echo "</select><br><br>
        Номер телефона <select name='account_id'>";
  $query = "SELECT a.account_id, a.phone_number
            FROM account a
            WHERE NOT EXISTS(
              SELECT * FROM directory d
              WHERE d.account_id = a.account_id)";
  $result = mysqli_query($link, $query);
  while($obj = mysqli_fetch_object($result))
  {
    echo "<option value='$obj->account_id' > $obj->phone_number";
  }
  echo "</select><br><br>
        <input type='submit' name='submit' value='Добавить'>
        </form>";

  if(isset($_POST['submit']))
  {
    $owner_id = $_POST['owner_id'];
    $account_id = $_POST['account_id'];
    $query = "INSERT INTO directory (owner_id, account_id)
              VALUES ('$owner_id', '$account_id')";
  }
?>