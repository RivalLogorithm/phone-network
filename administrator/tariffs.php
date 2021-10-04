<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "<center><font size='14' color='black' face='Sans-Serif'>ТАРИФЫ</font><br><br>
        <a href='add_tariffs.php' class='button'>Добавить тариф</a>
        <a href='change_tariffs.php' class='button'>Редактировать тарифы</a>";
  echo "</font><center><br><br>
        <table width = '100%'
        <tr>
            <th>№ тарифа</th>
            <th>Название</th>
            <th>Стоимость за минуту</th>
            <th>Стоимость за минуту в роуминге</th>
        </tr>";

  $query = "SELECT * FROM tariff";
  $result = mysqli_query($link, $query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['tariff_id'].'</td>
              <td>'.$assoc['tariff_name'].'</td>
              <td>'.$assoc['per_minute'].'</td>
              <td>'.$assoc['per_minute_rouming'].'</td>
          </tr>';
        }
  echo '</center>
        </table>';
?>