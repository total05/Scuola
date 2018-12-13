<!--Davide Canal-->
<?php session_start();
    if(!$_SESSION['registrato']){
        header("Location: ./login.php");
    };
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indovina Numero</title>
    <?php
        $messaggio = "";
       if($_SERVER['QUERY_STRING'] == ""){
            $_SESSION['ndi'] = rand(0,100);
            $_SESSION['tentativi'] = 0;
       }else{
           if($_GET['nUtente'] == $_SESSION['ndi']){
                header("Location: ./riepilogo.php");
           }else{
                if($_GET['nUtente'] != $_SESSION['ndi']){
                    $_SESSION['tentativi']++;
                    if($_GET['nUtente'] > $_SESSION['ndi']){
                        $messaggio = '<p style="margin: 0">Il numero è troppo grande</p>';
                    }else{
                        $messaggio = '<p style="margin: 0">Il numero è troppo piccolo</p>';
                    }
                }else{
                    header("Location: ./riepilogo.php");
                }
            }
                    

        }
            

       
    ?>
</head>
<body>
    <h3 style="margin-bottom: 15px">Indovina il numero</h3>
    <p style="margin: 0px">Username: <?php echo $_SESSION['username']?></p>
    <div>
        <form action="gioca.php" method="GET">
            <label for="nUtente">Inserisci un numero</label>
            <input type="text" name="nUtente"> 
            <?php
            echo $messaggio."<br>";
            ?>
            <input type="submit" value="Indovina">
        </form>

        
    </div>
</body>
</html> 