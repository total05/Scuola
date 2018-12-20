<?php session_start(); ?>
<!doctype html>
<!-- Bellomo Giorgia -->
<html>
	<head>
		<meta charset="utf-8">
		<?php
			$miofile=fopen("utenti.php", "r");	//apro il file in modalità lettura
			function visualizzaForm(){
				echo '<form action="bellomoLogin.php" method="get">';
				echo 'Nome utente <input type="text" name="username">';
				echo 'Password <input type="text" name="password">';
				echo '<input type="submit" name="invia">';
			}
		?>
	</head>
	<body>
		<?php
			while(($buffer=fgets($miofile))==TRUE){		//leggo il file fino alla fine
				$pezzi=explode(",",$buffer);			//variabile in cui salvo le righe lette dal file
				
			}
			if($_SERVER['QUERY_STRING']==''){		//controllo se è la prima volta che entro
				visualizzaForm();
				$SESSION['cont']=0;		//contatore per contare quante volte faccio all'accesso
			}else {
				$SESSION['cont']++;
				if($SESSION['cont']==3){	//controllo se il contatore è uguale a 3
					echo '</head></body></html>';
					echo '<html><head><meta http-equiv="refresh" content="2, url=bellomoIP.txt"></head>';		//reindirizzo l'utente alla pagina bellomoIP.php
					echo '</html>';
				}
				if($pezzi[1]==$_GET['username']&&$pezzi[3]==$_GET['password']){	//controllo se la username letta dal file corrisponde con quella inserita dall'utente
																				//controllo se la password letta da file corrisponde con quella inserita
					$SESSION['username']=$_GET['username'];						//salvo il nome utente sulla variabile
					echo '</head></body></html>';
					echo '<html><head><meta http-equiv="refresh", content="2, url=bellomoFine.php"></head>';	//se è loggato mando a bellomoFile.php
					echo '</html>';
				}else{
					echo 'Non sei loggato';		//Login sbagliato 
					visualizzaForm();			//mostro nuovamente il form
				}
			}
		?>
	</body>
