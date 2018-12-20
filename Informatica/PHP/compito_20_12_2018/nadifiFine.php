<?php session_start();  //nadifi yassin ?>
<html>
	<head>
		<meta charset="utf-8">    
		<?php//uso le variabili di sessione per reindirizzarlo
			echo 'Ciao '.$_SESSION['username'].' , questa è la '.$_SESSION['cont'].' esimna volta che ti logghi. Grazie per essere passato a salutarci. Ora verrai
			buttato fuori e reindirizzato alla pagina di login';
			echo ' <meta http-equiv="refresh" content="1;URL=nadifiLogin.php>"';
			session_destroy();
		?>
	</head>

	<body>
	</body>
</html>