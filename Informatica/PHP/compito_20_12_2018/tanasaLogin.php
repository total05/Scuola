<?php
	$loggato = false;

	$file = fopen('utenti.php', 'r');
	$riga = fgets($file);
	$riga = fgets($file);
	
	while (!feof($file)) {
		$vettore = explode($riga, ',');
		if($vettore[0] == $vettore[1]) {
			$loggato = true;
			session_start();
			$_SESSION['username'] = $_GET['username'];
		}
		else {
			$riga = fgets($file);
		}
	}

?>
<!-- Tanasa Valentin -->
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<?php
			if($loggato == true) {
				echo '<meta http-equiv="refresh" content="2; URL=tanasaFine.php">';
			}
		?>
	</head>
	
	<body>
	
	<?php
		function form() {
			echo '<form method="get" action="tanasaLogin.php">';
			echo 'user: <input type="text" name="username"> </p>';
			echo 'pass: <input type="text" name="password"> </p>';
			echo '<input type="button" name="login" value="Login">';
			echo '</form>';
		}
		
		$contatore = 0; //conattore dei login errati
		
		if($_SERVER['QUERY_STRING'] == '') {
			form();
		}
		else {
			if($loggato == true) {
				echo 'Login riuscito';
			}
			else {
				echo 'Login erratto';
				$contatore ++;
			}
		}
	?>
	</body>
	
</html>