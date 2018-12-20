<!--serafin andrea-->
<?php
session_start();
?>
<!doctype html>
<html>

	<head>
	
		<meta charset="utf-8">
		<?php
			function reindirizza(){
				echo'<meta http-equiv="refresh" content="20 url=serafinLogin.php">';
			}
		?>
	</head>
	
	<body>
	
		<?php
			echo'Ciao'.$_SESSION['username'].' questa è la '.$_SESSION['numlog'].'esima volta che ti logghi.
				Grazie per essere passato a salutarci. Ora verrai buttato fuori e reinderizzato alla pagina di login.';
				
			session_destroy();
			reindirizza();
		?>
	
	</body>
	
</html>