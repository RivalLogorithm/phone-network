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
        Выбрать тарифа <select name = 'tariff_id'>";
    while($obj = mysqli_fetch_object($result))
    {
      echo "<option value = '$obj->tariff_id' > $obj->tariff_name </option>";
    }
    echo "</select>
          <input type='submit' name='submit' value ='Редактировать'><br><br>
          </form>";
  if(isset($_POST['submit']))
  {
    $tariff_id = $_POST['tariff_id'];
    $query = "SELECT * FROM tariff
              WHERE tariff_id = '$tariff_id'";
    $result = mysqli_query($link,$query);
    $obj = mysqli_fetch_object($result);

    echo "<form action='form_tariff.php' method='post'>
    <input type='hidden' name='tariff_id' value='$obj->tariff_id'>
    Название <input type='text' name='tariff_name' value='$obj->tariff_name'><br><br>
    Стоимость за минуту <input type='text' name='per_minute' value='$obj->per_minute'><br><br>
    Стоимость за минуту в роуминге <input type='text' name='per_minute_rouming' value='$obj->per_minute_rouming'><br><br>
    <input type='submit' name='change' value='Изменить'>
    <input type='submit' name='delete' value='Удалить'>
    </form>";
  }
?>