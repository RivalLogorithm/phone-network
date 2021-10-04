<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'user', 'qwerty', 'directoryDB');
  echo "<center><font size='14' color='black' face='Sans-Serif'>СПРАВОЧНИК</font><br><br>
        <a href='exit.php' name='exit' class='button'>Выйти</a>
        </form>
        <br><br></center>
        <right><font size='4' color='black' face='Sans-Serif'>Вход под пользователем: user</right>";
  echo "</font><center><br><br>
        <table width = '100%>'
        <tr>
            <th>Владелец</th>
            <th>Номер телефона</th>
            <th>Город</th>
            <th>Адрес</th>
            <th>Лицо</th>
            <th>Тариф</th>
        </tr>";

  $query = "SELECT * FROM view_directory";
  $result = mysqli_query($link,$query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['owner_name'].'</td>
              <td>'.$assoc['phone_number'].'</td>
              <td>'.$assoc['city'].'</td>
              <td>'.$assoc['address'].'</td>
              <td>'.$assoc['face'].'</td>
              <td>'.$assoc['tariff_name'].'</td>
          </tr>';
  }
  echo '</center>
  </table>';
  mysqli_close($link);
 ?>