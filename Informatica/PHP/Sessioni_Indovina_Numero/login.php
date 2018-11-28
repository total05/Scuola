<!--Davide Canal-->
<?php session_start() ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
    $users = array('root' => 'password');
      if($_SERVER['QUERY_STRING'] != "" && array_key_exists($_GET['username'], $users)){
        $_SESSION['registrato'] = true;
        $_SESSION['username'] = $_GET['username'];
        header("Location: ./gioca.php");
      }else{
        echo ("<p>Login fallito, ritenta</p>");
      }
    ?>
    <div>
      <h3 style="margin-bottom: 15px">Login</h3>
      <form action="./login.php" method="GET">
        <label for="username">Username</label>
        <input type="text" name="username" style="margin-bottom: 15px"> <br/>
        <label for="password">Password</label>
        <input type="password" name="password" style="margin-bottom: 15px"> <br/>
        <input type="submit" value="Login">
      </form>
    </div>
  </body>
</html>
