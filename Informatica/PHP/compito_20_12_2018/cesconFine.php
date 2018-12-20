<?php
	// Cescon Francesco
	
	// Ho semplicemente creato il file e ci ho lavorato in Z:
	// non ho mai provato a caricarlo sul server, quindi non 
	// sono nemmeno sicuro sia a posto dal punto di vista della
	// interpretazione.
	// Grazie della sua comprensione.
	
	session_start();
	
	if (!isset($_SESSION("username")) {
		header("Location: cesconLogin.php");
		die();
	}
	else {
		// Se l'utente è invece loggato, conto quante volte prima di questa
		// lui si è riuscito ad autenticare sul sito, in modo da mostrarlo
		// a schermo
		
		$conteggio_login = 0;
	
		$handle_log = fopen("./cesconLog.txt", "r");
		while (($riga = fgets($handle_log)) !== false) {
			$riga = explode(",", $riga);
			
			if ($riga[0] == $_SESSION["username"]) {
				$conteggio_login ++;
			}
		}
		fclose($handle_log);
	}
?>
<html>
	<!-- Cescon Francesco -->
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="refresh" value="5; url=cesconLogin.php">
	</head>
	<body lang="it">
		<b>
			Ciao <?php echo $_SESSION["username"]; ?>, questa &egrave; la <?php echo $conteggio_login; ?>a volta che ti logghi. Grazie per essere passato a salutarci. Ora verrai buttato fuori e reindirizzato alla pagina di login.
		</b>
	</body>
</html>
<?php
	// Chiudo la sessione
	session_destroy();
?>