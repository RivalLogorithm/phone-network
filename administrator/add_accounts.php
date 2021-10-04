<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  $query = "SELECT * FROM tariff";
  $result = mysqli_query($link, $query);
  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Номер телефона <input type='text' name='phone_number'><br><br>
        Тариф <select name ='tariff_id'>";
  while($obj = mysqli_fetch_object($result))
  {
    echo "<option value = '$obj->tariff_id' > $obj->tariff_name </option>";
  }
  echo "</select><br><br>
        <input type='submit' name='submit' value ='Добавить'>
        </form>";

  if(isset($_POST['submit']))
  {
    $phone_number = $_POST['phone_number'];
    $tariff = $_POST['tariff_id'];
    $query = "INSERT INTO account(phone_number, tariff_id)
              VALUES ('$phone_number', '$tariff')";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
?>