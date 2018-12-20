<?php session_start(); ?>
<!doctype html>
<!-- Bellomo Giorgia -->
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		//visualizza il nome utente e quante volte si è loggato
			echo 'Ciao'.$SESSION['username'].' questa è '.$SESSION['cont'].' che ti logghi.';
			echo 'Grazie per essere passato a salutarci. Ora verrai buttato fuori e reindirizza alla pagina login';
			echo '</head></body></html>';
			echo '<html><head><meta http-equiv="refresh" content="2, url=bellomoLogin.php"></head>'; //mando l'utente nuovamente a bellomoLogin.php
			echo '</html>';
		?>
	</body>
</html>