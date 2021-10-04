<?php
  header("Content-Type: text/html; charset=utf-8");
  $query = "CALL delete_owners()";
  $result = mysqli_query($link, $query);
  header("Location: main.php");
?>