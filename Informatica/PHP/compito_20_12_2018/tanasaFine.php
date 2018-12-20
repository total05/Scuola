<?php
	session_start();
?>
<!-- Tanasa Valentin -->
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<?php
			echo '<meta http-equiv="refresh" content="2; URL=tanasaLogin.php">';
		?>
	</head>
	
	<body>
	<?php
		echo 'ciao' .$_SESSION['username']. 'questa è Nesima volta che ti logghi. Grazie per essere passato a salutarci. Ora verrai buttato fuori e reindirizzato alla pagina di login';
		session_destroy();
	?>
	</body>
	
</html>