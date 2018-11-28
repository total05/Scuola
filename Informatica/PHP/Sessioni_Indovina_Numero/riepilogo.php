<?php session_start() ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riepilogo Partita</title>
</head>
<body>
    <h3>Hai Vinto 1 Milione di €uri</h3>
    <div>
        <p style="margin: 0px">Bravo <?php echo $_SESSION['username']?>,</p> 
        <p style="margin: 0px">hai completato la partita con <?php echo $_SESSION['tentativi'] ?> tentativi!</p>
    </div>
</body>
</html>
