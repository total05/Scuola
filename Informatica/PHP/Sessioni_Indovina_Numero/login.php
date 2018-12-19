<!--Davide Canal-->
<?php
      
      //Login con vettore associativo
      /*
      $users = array('root' => 'password');
      if($_GET['username'] != "" && $_GET['password'] != "" && $users[$_GET['username']] == $_GET['password']){
        $_SESSION['registrato'] = true;
        $_SESSION['username'] = $_GET['username'];
        header("Location: ./gioca.php");
      }
      */
      //Login con controllo sui file
      $err = '<p style="margin-bottom: 0 0 0 5">Login Errato</p>';
      if($_SERVER["QUERY_STRING"] != ""){ 
        $buffer = fopen("users.php","r");
        while(($str = fgets($buffer)) != false){
              $explode = explode(",", $str);
              if($_GET['username'] == $explode[0] && $_GET['password'] == $explode[1]){
                session_start();
                $_SESSION['registrato'] = true;
                $_SESSION['username'] = $_GET['username'];
                echo "<meta http-equiv=\"refresh\" content=\"0;url=gioca.php\" />";
                fclose($buffer);
              }
        }
        fclose($buffer);
      }
    
    ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    
    <div>
      <h3 style="margin-bottom: 15px">Login</h3>
      <form action="./login.php" method="GET">
        <label for="username">Username</label>
        <input type="text" name="username" style="margin-bottom: 15px" value=<?php if(isset($_GET['username'])) echo $_GET['username']?>> <br/>
        <label for="password">Password</label>
        <input type="password" name="password" style="margin-bottom: 15px"> <br/>
        <input type="submit" value="Login" name="login">
        <input type="submit" value="Registrati" name="new">
      </form>
    </div>
  </body>
</html>
