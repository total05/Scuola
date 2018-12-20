<!-- Zanutto Davide -->
<?php
	session_start();
?>
<html>
	<head>
	<meta http-equiv="refresh" content="3; url=zanuttoLogin.php">
	</head>
	<body lang="it">
	<?php
		if($_SESSION['username']=="roberto")											//Controllo chi si è loggato
		{
			$_SESSION['contatoreRob']++;
			echo "Ciao ".$_SESSION['username'].", questa è la ".$_SESSION['contatoreRob'];	//la prima volta che si accede è possibile dia errore di compilazione
		}
		
		if($_SESSION['username']=="luca")
		{
			$_SESSION['contatoreLuca']++;
			echo "Ciao ".$_SESSION['username'].", questa è la ".$_SESSION['contatoreLuca'];
		}
		
		if($_SESSION['username']=="paolo")
		{
			$_SESSION['contatorePaolo']++;
			echo "Ciao ".$_SESSION['username'].", questa è la ".$_SESSION['contatorePaolo'];
		}
		
		echo ' volta che ti logghi. 													
			Grazie per essere passato a salutarci. 
			Ora verrai buttato fuori e reindirizzato alla pagina di login';				//parte in comune
	?>
	</body>
</html>