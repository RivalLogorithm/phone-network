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
            <th>Номер телефона</th>
            <th>Баланс</th>
        </tr>";

  $query = "SELECT o.owner_name, a.phone_number, a.balance
            FROM directory d
            JOIN account a ON a.account_id=d.account_id
            JOIN owner o ON o.owner_id=d.owner_id
            WHERE a.balance >= ALL(SELECT balance FROM account)";
  $result = mysqli_query($link,$query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['owner_name'].'</td>
              <td>'.$assoc['phone_number'].'</td>
              <td>'.$assoc['balance'].'</td>
          </tr>';
  }
  echo '</center>
        </table>';
?>