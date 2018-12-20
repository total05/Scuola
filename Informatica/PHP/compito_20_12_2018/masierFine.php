<!-- Masier Michele -->
<?php
session_start();

		echo '<!DOCTYPE html>';
		echo '<html lang="it">';
		echo '<head>';
		echo '<meta chartset="utf-8" http-equiv="refresh" content="3 URL=masierLogin.php">';
		echo '</head>';
		echo '<body>';
		echo "ciao ".$_SESSION['username']." questa e la ".$_SESSION['contatore']." volta che ti logghi. Grazie per essere passato a salutarci.Ora verrai buttato fuori e reindirizzato alla pagina di login ";
		echo '</body>';
		echo '</html>';
		?>