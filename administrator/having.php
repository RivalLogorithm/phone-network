<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "</font><center><br><br>
        <table width = '100%>'
        <tr>
            <th>Тариф</th>
            <th>Кол-во аккаунтов</th>
        </tr>";

  $query = "SELECT t.tariff_name, COUNT(a.tariff_id) as tariff_count
            FROM tariff t
            JOIN account a ON a.tariff_id = t.tariff_id
            GROUP BY (t.tariff_name)
            HAVING COUNT(tariff_count) > 2
            ORDER BY (t.tariff_name)";
  $result = mysqli_query($link,$query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['tariff_name'].'</td>
              <td>'.$assoc['tariff_count'].'</td>
          </tr>';
  }
  echo '</center>
        </table>';
?>