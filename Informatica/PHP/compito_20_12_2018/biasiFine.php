<!--biasi francesco -->
<?php session_start(); ?> 
<!DOCTYPE HTML>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<?php
	if(!isset($_SESSION['username']))
	{
		//furbetto non si è loggato
		echo '<meta http-equiv="refresh" content="3;biasilogin.php">';
		
		
	}
	else
	{
		echo 'Ciao'.$_SESSION['username'].'Questa e la' .$_SESSION['contatore'].'che ti logghi. Grazie per aver essere passato a salutarci.Ora verrai buttato fuori e reinderizzato alla pagina di login';
		session_destroy(); //distruggo la sessione
		echo '<meta http-equiv="refresh" content="3;biasilogin.php">';
		
	}
	
	?>
</head>
<body>
</body>
</html>