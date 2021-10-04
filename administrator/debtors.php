<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "</font><center><br><br>
        <table width = '100%>'
        <tr>
            <th>Владелец</th>
            <th>Номер</th>
            <th>Баланс</th>
            <th>Статус</th>
        </tr>";

  $query = "SELECT o.owner_name, a.phone_number, a.balance, d.status
            FROM directory d
            JOIN owner o ON o.owner_id = d.owner_id
            JOIN account a ON a.account_id = d.account_id
            WHERE status='Должник'
            ORDER BY o.owner_name";
  $result = mysqli_query($link,$query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['owner_name'].'</td>
              <td>'.$assoc['phone_number'].'</td>
              <td>'.$assoc['balance'].'</td>
              <td>'.$assoc['status'].'</td>
          </tr>';
  }
  echo '</center>
        </table>';
?>