<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  $query = "SELECT o.owner_name, a.phone_number, d.directory_id
            FROM directory d
            JOIN owner o ON d.owner_id = o.owner_id
            JOIN account a ON d.account_id = a.account_id";
  $result = mysqli_query($link, $query);
  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Выбрать абонента <select name = 'directory_id'>";
  while($obj = mysqli_fetch_object($result))
  {
    echo "<option value = '$obj->directory_id' > $obj->owner_name </option>";
  }
  echo "</select>
        <input type='submit' name='submit' value ='Редактировать'><br><br>
        </form>";
  if(isset($_POST['submit']))
  {
    $directory_id = $_POST['directory_id'];
    $query = "SELECT o.owner_name, a.phone_number, d.owner_id, d.directory_id
              FROM directory d
              JOIN owner o ON d.owner_id = o.owner_id
              JOIN account a ON d.account_id = a.account_id
              WHERE d.directory_id = $directory_id";
    $result = mysqli_query($link, $query);
    $obj = mysqli_fetch_object($result);
    echo "<form action='form_directory.php' method='post'>
          <input type='hidden' name='directory_id' value='$obj->directory_id'>
          <input type='hidden' name='owner_id' value='$obj->owner_id'>
          Номер телефона $obj->phone_number<br><br>
          Выбрать другой доступный <select name='account_id'>";

    $query2 = "SELECT a.phone_number, a.account_id
              FROM account a
              WHERE NOT EXISTS(
                SELECT * FROM directory d
                WHERE a.account_id = d.account_id)";
    $result2 = mysqli_query($link, $query2);
    while($obj2 = mysqli_fetch_object($result2))
    {
      echo "<option value = '$obj2->account_id' > $obj2->phone_number </option>";
    }
    echo "</select><br><br>
          <input type='submit' name='change' value='Изменить'>
          <input type='submit' name='delete' value='Удалить'>
          </form>";
  }
?>