<?php
  header("Content-Type: text/html; charset=utf-8");
  echo "<body background='fon.jpg'>";

  echo "<form action='#' method='post'>
        <center><font size='4' color='black' face='Sans-Serif'>Авторизация<br><br>
        Логин <input type='text' name='login'><br><br>
        Пароль <input type='password' name='password'><br><br>
        <input type='submit' name='submit' value='Войти'>
        </form>";

  if(isset($_POST['submit']))
  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $link = mysqli_connect('localhost', $login, $password, 'directoryDB');
    if(!$link)
    {
      echo "<script type='text/javascript'>
              alert('Неправильное имя пользователя или пароль!');
              window.location = 'index.php';
            </script>";
    }
    else
    {
      if($login == 'administrator')
      {
        header("Location: administrator/main.php");
      }
      else
      {
        header("Location: user/main.php");
      }
    }
  }
 ?>