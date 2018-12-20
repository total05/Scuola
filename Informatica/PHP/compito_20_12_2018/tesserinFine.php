<?php session_start() ?>
<!DOCTYPE HTML>
<html lang="it">
<head>
<meta charset="UTF-8">
<body>
<?php
if(!isset($_GET['username'])){//se la sessione non è impostata
	echo "Non sei loggato.";
}
echo "<div> Ciao ".$_SESSION['username'].", questa è la ". $_SESSION['loginCounter']." che ti logghi. Grazie per essere passato a salutarci. Ora verrai buttato fuori e reindirizzato alla pagina di login</div>";
echo '<!doctype html>';
		echo '<html lang="it">';
			echo '<head>';
				echo '<meta charset="utf-8">';
				echo '<meta http-equiv="refresh" content="10;tesserinLogin.php">';//reindirizzo alla pagina di login
			echo '</head>';
			echo '<body>';
			echo '</body>';
		echo '</html>';

?>
</body>
</html>