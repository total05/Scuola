<!--Luigi Parcianello-->
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Fine</title>
		
		<?php
			echo 'Ciao '.$_SESSION['user'].' questa è la '$_SESSION['cont'].' volta che ti logghi. Grazie per essere passato salutarci.
				  Ora verrai buttato fuori e reindirizzato alla pagina di login.';
			
			echo '<meta http-equiv="refresh" content="3, parcianelloLogin.php">';
			session_destroy();
		?>
	</head>

	<body>
	
	</body>
</html>