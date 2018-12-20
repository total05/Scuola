<?php
	// Cescon Francesco
	
	// Ho semplicemente creato il file e ci ho lavorato in Z:
	// non ho mai provato a caricarlo sul server, quindi non 
	// sono nemmeno sicuro sia a posto dal punto di vista della
	// interpretazione.
	// Grazie della sua comprensione.
	
	$mostraErrore = false;
	$loggato = false;
	
	// Controllo che l'utente non abbia l'IP bannato
	$conteggio_tentativo_IP = 0;
	
	$handle_IP = fopen("./cesconIP.txt", "r");
	
	// Scorro il file alla ricerca di una riga in cui compare l'IP dell'utente
	while (($riga = fgets($handle_IP)) !== false) {
		$riga = explode(",", $riga);
		
		if ($riga[0] == $_SERVER["REMOTE_ADDR"]) {
			$conteggio_tentativo_IP ++;
		}
		else {
			// Resetto così cerca solo 3 volte consecutive
			$conteggio_tentativo_IP = 0;
		}
		
		// Se il valore è o supera 3, significa che almeno una volta l'utente
		// con questo indirizzo IP ha provato a loggarsi non riuscendoci per 3
		// volte consecutive
		if ($conteggio_tentativo_IP >= 3) {
			$mostraErrore = "Il tuo indirizzo IP è stato bannato";
			$loggato = "bannato";
			break;
		}
	}
	fclose($handle_IP);
	
	if ($_SERVER["QUERY_STRING"] != "" && $loggato != "bannato") {
		if (isset($_GET["u"] && isset($_GET["p"])) {
			$handle = fopen("./utenti.php", "r");
			
			$username_file = false;
			$password_file = false;
			
			// Scorro il file degli utenti, inserendo in maniera alternata la riga
			// sulla variabili username_file e password_file
			while (($riga = fgets($handle) !== false) {
				$riga = explode(",", $riga);
			
				if ($username_file == false) {
					$username_file = $riga[0];
				}
				else {
					$password_file = $riga[0];
					
					// Trovo una corrispondenza con la riga precendente (salvata su username)
					// dopo aver salvato la relativa password
					if ($username_file == $_GET["u"]) {
						
						// Controllo che la password appena salvata coincida con
						// quella inserita dall'utente
						if ($password_file == $_GET["p"]) {
							$loggato = true;
						}
						else {
							// Altrimenti la imposto a false, così che una successiva
							// coppia username - password più recente possa comunque avere
							// una valenza, sia questa positiva o negativa
							$loggato = false;
						}
					}
					
					// Resetto le variabili, pronte per una nuova coppia
					$username_file = false;
					$password_file = false;
				}
			}
			
			fclose($handle);
		
		
			// Se l'utente riesce ad accedere, faccio partire la sessione, salvo
			// che l'utente è entrato nel log e lo reindirizzo alla pagina finale
			if ($loggato) {
				session_start();
				$_SESSION["username"] = $_GET["u"];
				
				$handle_log = fopen("./log.txt", "a");
				fwrite($handle_log, $_GET["u"].",\n");
				fclose($handle_log);
				
				header("Location: cesconFine.php");
				die();
			}
			else {
				// In caso contrario aggiungo l'IP alla lista di quelli che hanno sbagliato
				
				$handle_IP = fopen("./cesconIP.txt", "a");
				fwrite($handle_IP, $_SERVER["REMOTE_ADDR"].",\n");
				fclose($handle_IP);
				
				$mostraErrore = "Username o password non corretta.";
			}
			
		else {
			$mostraErrore = "Campo mancante";
		}
	}
?>
<html>
	<!-- Cescon Francesco -->
	<head>
		<meta charset="UTF-8">
	</head>
	<body lang="it">
		<form action="cesconLogin.php" method="GET">
			<input type="text" name="u" autofocus> <br />
			<input type="password" name="p"> <br />
			<button type="Submit"></button>
		</form>
		
		<b>
			<?php
				if ($mostraErrore != false) {
					echo $mostraErrore;
				}
			?>
		</b>
	</body>
</html>