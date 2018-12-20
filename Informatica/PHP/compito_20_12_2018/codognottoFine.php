<!--Codognotto Federico-->

<?php
	/*if (empty($_SESSION['user']))
		{
		header ('location: codognottoLogin.php');
		break();
		}
	*/
	session_start();
	
	
?>

<html lang="it">
	<head>
		<?php
			echo '<meta http-equiv content=5, URL="codognottoLogin.php">';
		?>
		<title>codognottoFine</title>
	</head>
	<body>
	<?php
		$_SESSION['cont']++;
		echo 'Ciao '.$_SESSION['user'].', questa &egrave la '.$_SESSION['cont'].'esima volta che ti logghi. ';
		echo 'Grazie per essere passato a salutarci. ';
		echo 'Ora verrai buttato fuori e reindirizzato alla pagina di login.';
		
		session_destroy ();
	?>
	</body>
</html>