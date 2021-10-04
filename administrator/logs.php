<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>
        <link rel='stylesheet' href='table_style.css'>
        <link rel='stylesheet' href='button_style.css'>";
  $link = mysqli_connect('localhost', 'administrator', 'password', 'directoryDB');
  echo "<center><font size='14' color='black' face='Sans-Serif'>ЛОГИ</font><br><br></font><center><br><br>
        <table width = '100%>'
        <tr>
            <th>№ записи</th>
            <th>Номер телефона</th>
            <th>Баланс</th>
            <th>Дата</th>
        </tr>";
  $query = "SELECT l.log_id, a.phone_number, l.new_balance, l.log_date
            FROM log l
            JOIN account a ON a.account_id = l.account_id
            ORDER BY l.log_id";
  $result = mysqli_query($link, $query);
  $nrows = mysqli_num_rows($result);
  for ($i=0; $i < $nrows; $i++) {
    $assoc = $result -> fetch_assoc();
    echo '<tr>
              <td>'.$assoc['log_id'].'</td>
              <td>'.$assoc['phone_number'].'</td>
              <td>'.$assoc['new_balance'].'</td>
              <td>'.$assoc['log_date'].'</td>
          </tr>';
  }
  echo '</center>
  </table>';
?>