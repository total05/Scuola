<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leggi file</title>
    <?php 
        $filePath = fopen("utenti.txt", "r");
        while(($buffer = fgets($filePath)) != false){
            echo $buffer;
        }
        
        fclose($filePath);
    ?>
</head>
<body>
    
</body>
</html>