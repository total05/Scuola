
<!--Canal Davide-->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>canalLogin.php</title>
    <?php
        $message = "";
        $tentativi;
        if($_SERVER["QUERY_STRING"] != ""){
            /*Controlla che l'ip non sia bannato*/
            $buffer = fopen("canalIP.txt", "r");
            while(($Str = fgets($buffer)) != false){
                $Str = explode("|", $Str);
                if($_SERVER["REMOTE_ADDR"] == $Str){
                    $message = "<p>il tuo IP &egrave registrato nella blacklist, quindi non puoi accedere</p>";
                    die();
                }
            }

            /*Controlla le credenziali*/
            if($_GET["user"] != "" && $_GET["psw"] != ""){
                $tentativi ++;
                $buffer = fopen("utenti.php", "r");
                while(($user = fgets($buffer)) != false){
                    if($user == "<?php /*"){
                        $user = fgets($buffer);
                    }else if($user == "*/ ?>"){
                        die();
                    }

                    $all = $user + ($psw = fgets($buffer));
                    $all = trim($all);
                    $explode = explode(",", $all);
                    echo $all;
                }
            }
           
        }

        if($tentativi == 3){
            file_put_contents("canalIP.txt", $_SERVER["REMOTE_ADDR"]."|"."\n", FILE_APPEND | LOCK_EX);
        }
        
    ?>
</head>
<body>
    <form action="./canalLogin.php" method="get">
        <input type="text" placeholder="username" name="user">
        <input type="password" placeholder="password" name="psw">
       <?php echo ($message) ?>
        <input type="submit" value="login">
    </form>
</body>
</html>