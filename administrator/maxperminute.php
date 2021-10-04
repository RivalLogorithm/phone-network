<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "</font><center><br><br>
        <table width = '100%>'
        <tr>
            <th>Пользователь</th>
        </tr>";

  $query = "SELECT o.owner_name
            FROM owner o
            JOIN directory d ON d.owner_id = o.owner_id
            JOIN account a ON a.account_id = d.account_id
            WHERE a.tariff_id = (SELECT t.tariff_id
                                 FROM tariff t
                                 WHERE per_minute = (SELECT MAX(per_minute)
                                                     FROM tariff))";
  $result = mysqli_query($link,$query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['owner_name'].'</td>
          </tr>';
  }
  echo '</center>
        </table>';
?>