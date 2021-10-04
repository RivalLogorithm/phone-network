<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";

  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Владелец <input type='text' name='owner_name'><br><br>
        Тип <input type='radio' name='face' value='физическое'>физическое
        <input type='radio' name='face' value='юридическое'>юридическое<br><br>
        Город <input type='text' name='city'><br><br>
        Адрес <input type='text' name='address'><br><br>
        <input type='submit' name='submit' value='Добавить'>
        </form>";

  if(isset($_POST['submit']))
  {
    $owner_name = $_POST['owner_name'];
    $face = $_POST['face'];
    $city =$_POST['city'];
    $address =$_POST['address'];

    $query = "INSERT INTO owner (owner_name, face, city, address)
              VALUES ('$owner_name', '$face', '$city', '$address')";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
 ?>