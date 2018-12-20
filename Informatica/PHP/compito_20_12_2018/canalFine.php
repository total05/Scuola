<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
        if(isset($_SESSION['user'])){
            echo "<meta http-equiv=\"refresh\" content=\"5; url=canalLogin.php\">";
        }
    ?>
</head>
<body>
    <p>Ciao <?php $_SESSION["user"] ?>, adesso verrai rediretto alla pagina di login.</p>
</body>
</html>