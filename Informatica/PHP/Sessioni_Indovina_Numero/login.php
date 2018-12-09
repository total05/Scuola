<?php session_start() ?>
<!--Davide Canal-->
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
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
      
        $fpointer = fopen("users.php", "r");
        while(!feof($fpointer)){
          $str = fgets($fpointer);
          $remove = substr($str, 2);
          $remove = explode("\n", $remove);
          echo $remove[0]."Spazio usato computer: ".strlen($remove[0])."<br>";
          $prova = $_GET['username'].','.$_GET['password'];
          echo $prova."Spazio usato utente: ".strlen($prova)."<br>";
          if($prova == $remove[0]) echo "OK";
         
          
          
          
          unset($str);
        }
        fclose($fpointer);
      

    ?>
    <div>
      <h3 style="margin-bottom: 15px">Login</h3>
      <form action="./login.php" method="GET">
        <label for="username">Username</label>
        <input type="text" name="username" style="margin-bottom: 15px" value=<?php if(isset($_GET['username'])) echo $_GET['username']?>> <br/>
        <label for="password">Password</label>
        <input type="password" name="password" style="margin-bottom: 15px"> <br/>
        <input type="submit" value="Login" name="submit">
      </form>
    </div>
  </body>
</html>
