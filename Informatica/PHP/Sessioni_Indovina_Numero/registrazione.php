<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrazione</title>
</head>
<body>
    <h2>Effettua la registrazione</h2>
    <div>
        <form action="./registrazione.php">
            <label for="username">Nome utente</label>
            <input type="text" name="username" placeholder="Username">
            <br>
            <label for="password">Inserisci la password</label>
            <input type="password" name="password" placeholder="Password">
            <br>
            <label for="repass"></label>
            <input tpye="password" name="repass" placeholder="Conferma la password">
            <br>
            <input type="submit" value="Registra">
        </form>
    </div>
</body>
</html>