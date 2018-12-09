<?php session_start() ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riepilogo Partita</title>
    <?php 
        //Controllo dei bottoni nella pagina
        if($_GET['end'] == "Rigioca"){
            header("Location: ./gioca.php");
        }else if($_GET['end'] == "Fine"){
            header("Location: ./login.php");
        }

        //Controllo se l'utente accede senza giocare
        if($_SESSION['tentativi'] == 0){
            header("Location: ./login.php");
        }
    ?>
</head>
<body>
    <h3>Hai Vinto 1 Milione di €uri</h3>
    <div>
        <p style="margin: 0px">Bravo <?php echo $_SESSION['username']?>,</p> 
        <p style="margin: 0px">hai completato la partita con <?php echo $_SESSION['tentativi'] ?> tentativi!</p>
    </div>
    <div style="margin-top: 10px;">
        <form action="./riepilogo.php" method="get">
            <input type="submit" value="Rigioca" name="end">
            <input type="submit" value="Fine" name="end">
        </form>
    </div>
</body>
</html>
