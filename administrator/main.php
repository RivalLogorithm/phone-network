<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');

  echo "<form action='#' method='post'>
        <center><font size='14' color='black' face='Sans-Serif'>СПРАВОЧНИК</font><br><br>
        <a href='tariffs.php' class='button'>Тарифы</a>
        <a href='owners.php' class='button'>Владельцы</a>
        <a href='accounts.php' class='button'>Номера</a>
        <a href='debtors.php' class='button'>Должники</a>
        <a href='add_directory.php' class='button'>Связать номер с владельцем</a>
        <a href='change_directory.php' class='button'>Редактировать связи</a>
        <a href='charge.php' class='button'>Списать средства</a>
        <a href='logs.php' class='button'>Посмотреть логи</a>
        <a href='exit.php' class='button'>Выйти</a><br><br><br>
        <a href='having.php' class='button'>Топ тарифы</a>
        <a href='all.php' class='button'>Самый богатый пользователь</a>
        <a href='maxperminute.php' class='button'>Пользователи с самым дорогим тарифом</a>
        </center>
        <right><font size='4' color='black' face='Sans-Serif'>Вход под пользователем: administrator<br><br>
        Сортировать по <select name = 'ord'>
        <option value='owner_name'>Владелец</option>
        <option value='phone_number'>Номер телефона</option>
        <option value='city'>Город</option>
        <option value='address'>Адрес</option>
        <option value='face'>Лицо</option>
        <option value='tariff_name'>Тариф</option>
        <option value='status_case'>Статус</option>
        </select>
        <input type='submit' name='submit' value='Сортировать'>
        </right>";
  echo "</font><center><br><br>
        <table width = '100%>'
        <tr>
            <th>Владелец</th>
            <th>Номер телефона</th>
            <th>Город</th>
            <th>Адрес</th>
            <th>Лицо</th>
            <th>Тариф</th>
            <th>Статус</th>
        </tr></form>";
  if(isset($_POST['submit']))
  {
    $ord = $_POST['ord'];
    $query = "SELECT * FROM view_directory
              ORDER BY $ord";
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
                <td>'.$assoc['status_case'].'</td>
            </tr>';
    }
    echo '</center>
    </table>';
  }
  mysqli_close($link);
 ?>