<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  $query = "SELECT * FROM account";
  $result = mysqli_query($link, $query);
  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Выбрать аккаунт <select name = 'account_id'>";
  while($obj = mysqli_fetch_object($result))
  {
    echo "<option value = '$obj->account_id' > $obj->phone_number </option>";
  }
  echo "</select>
        <input type='submit' name='submit' value ='Редактировать'><br><br>
        </form>";

  if(isset($_POST['submit']))
  {
    $account_id = $_POST['account_id'];
    $query = "SELECT a.*, t.tariff_name
              FROM account a
              JOIN tariff t ON a.tariff_id = t.tariff_id
              WHERE a.account_id = $account_id";
    $result = mysqli_query($link, $query);
    $obj = mysqli_fetch_object($result);

    echo "<form action='form_account.php' method='post'>
    <input type='hidden' name='account_id' value='$obj->account_id'>
    Номер телефона <input type='text' name='phone_number' value='$obj->phone_number'><br><br>
    Тариф: $obj->tariff_name<br><br>
    Выбрать другой <select name='tariff_id'>";
    $query = "SELECT * FROM tariff";
    $result = mysqli_query($link, $query);
    while($obj = mysqli_fetch_object($result))
    {
      echo "<option value = '$obj->tariff_id' > $obj->tariff_name </option>";
    }

    echo "</select><br><br>
    Баланс <input type='text' name='balance' value='$obj->balance'><br><br>
    Кол-во минут <input type='text' name='minutes' value='$obj->minutes'><br><br>
    <input type='submit' name='change' value='Изменить'>
    <input type='submit' name='delete' value='Удалить'>
    </form>";
  }
?>