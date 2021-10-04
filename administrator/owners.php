<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "<center><font size='14' color='black' face='Sans-Serif'>ВЛАДЕЛЬЦЫ</font><br><br>
        <a href='add_owners.php' class='button'>Добавить владельца</a>
        <a href='change_owners.php' class='button'>Редактировать вледельцев</a>
        <a href='delete_owner.php' class='button'>Удалить непривязанных пользователей</a>";
  echo "</font><center><br><br>
        <table width = '100%'
        <tr>
            <th>№ владельца</th>
            <th>Владелец</th>
            <th>Лицо</th>
            <th>Город</th>
            <th>Адрес</th>
        </tr>";
  $query = "SELECT * FROM owner";
  $result = mysqli_query($link, $query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['owner_id'].'</td>
              <td>'.$assoc['owner_name'].'</td>
              <td>'.$assoc['face'].'</td>
              <td>'.$assoc['city'].'</td>
              <td>'.$assoc['address'].'</td>
          </tr>';
        }
  echo '</center>
        </table>';
?>