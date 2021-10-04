<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Название тарифа <input type='text' name='tariff_name'><br><br>
        Стоимость за 1 минуту <input type='text' name='per_minute'><br><br>
        Стоимость за одну минуту в роуминге <input type='text' name='per_minute_rouming'><br><br>
        <input type='submit' name='submit' value='Добавить'>
        </form>";

  if(isset($_POST['submit']))
  {
    $tariff_name = $_POST['tariff_name'];
    $per_minute = $_POST['per_minute'];
    $per_minute_rouming = $_POST['per_minute_rouming'];

    $query = "CALL add_tariff('$tariff_name', '$per_minute', '$per_minute_rouming')";
    $result = mysqli_query($link, $query);
    header("Location: main.php");
  }
?>