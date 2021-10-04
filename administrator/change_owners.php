<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  $query = "SELECT * FROM owner";
  $result = mysqli_query($link, $query);
  echo "<center><font size='4' color='black' face='Sans-Serif'>
        <form action='#' method='post'>
        Выбрать владельца <select name = 'owner_id'>";
  while($obj = mysqli_fetch_object($result))
  {
    echo "<option value = '$obj->owner_id' > $obj->owner_name </option>";
  }
  echo "</select>
        <input type='submit' name='submit' value ='Редактировать'><br><br>
        </form>";

  if(isset($_POST['submit']))
  {
    $owner_id = $_POST['owner_id'];
    $query = "SELECT * FROM owner
              WHERE owner_id = '$owner_id'";
    $result = mysqli_query($link, $query);
    $obj = mysqli_fetch_object($result);

    if($obj->face == 'физическое')
    {
      $v_face = 'юридическое';
    }
    else
    {
      $v_face = 'физическое';
    }
    echo "<form action='form_owner.php' method='post'>
    <input type='hidden' name='owner_id' value='$obj->owner_id'>
    Владелец <input type='text' name='owner_name' value='$obj->owner_name'><br><br>
    Лицо <input type='radio' name='face' value='$obj->face' checked>$obj->face
    <input type='radio' name='face' value='$v_face'>$v_face<br><br>
    Город <input type='text' name='city' value='$obj->city'><br><br>
    Адрес <input type='text' name='address' value='$obj->address'><br><br>
    <input type='submit' name='change' value='Изменить'>
    <input type='submit' name='delete' value='Удалить'>
    </form>";
  }
?>