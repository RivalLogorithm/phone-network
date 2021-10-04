<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "<center><font size='14' color='black' face='Sans-Serif'>АККАУНТЫ</font><br><br>
        <a href='add_accounts.php' class='button'>Добавить аккаунт</a>
        <a href='change_accounts.php' class='button'>Редактировать аккаунты</a>";
  echo "</font><center><br><br>
        <table width = '100%'
        <tr>
            <th>№ аккаунта</th>
            <th>Номер телефона</th>
            <th>Тариф</th>
            <th>Баланс</th>
            <th>Минуты</th>
        </tr>";

  $query = "SELECT a.account_id, a.phone_number, t.tariff_name, a.balance, a.minutes
            FROM account a
            JOIN tariff t ON a.tariff_id = t.tariff_id
            ORDER BY a.account_id";
  $result = mysqli_query($link, $query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['account_id'].'</td>
              <td>'.$assoc['phone_number'].'</td>
              <td>'.$assoc['tariff_name'].'</td>
              <td>'.$assoc['balance'].'</td>
              <td>'.$assoc['minutes'].'</td>
          </tr>';
        }
  echo '</center>
        </table>';
?>