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
      
      
      
      if(isset($_GET['login'])){
        $buffer = fopen("users.php","r");
        $username = $_GET['username'];
        $password = $_GET['password'];
        while(($str = fgets($buffer)) != false){
              $explode = explode(",", $str);
              if($username == $explode[0] && $password == $explode[1]){
                session_start();
                $_SESSION['registrato'] = true;
                $_SESSION['username'] = $_GET['username'];
                echo "<meta http-equiv=\"refresh\" content=\"0;url=gioca.php\" />";
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
