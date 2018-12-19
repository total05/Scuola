<?php
	// Cescon Francesco

	// logged_in true means successfully logged in
	if (isset($_SESSION["username"])) {
		header("Location: ./gioca.php");
		die();
	}

	$errorMessage = "";

	if ($_SERVER['QUERY_STRING'] != "") {
		if (isset($_GET["username"]) && isset($_GET["password"])) {
			// Open the users list file
			$handle = fopen("users.php", "r");
			while (($line = fgets($handle)) != false) {
				$line = explode("|", $line);
				echo $line[0]." ".$line[1]."<br>";
				if ($line[0] == $_GET["username"] && $line[1] == $_GET["password"]) {
					session_start();
					$_SESSION["username"] = $_GET["username"];
					$_SESSION["registrato"] = true;
					header("Location: ./gioca.php");
					die();
				}
			}
			fclose($handle);
		}

		$errorMessage = "Login fallito<br/>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>

	<link rel="stylesheet" href="./style.css">
</head>
<body>

	<div class="container">
      <div class="row title">
         Login
      </div>

		<?php
			echo $errorMessage;
		?>

		<div class="row">
			<form class="" action="login.php" method="get">
				<input type="text" name="username" value="<?php echo (isset($_GET["username"]) ? $_GET["username"] : ""); ?>" placeholder="Username" autofocus><br />
				<input type="password" name="password" value="" placeholder="Password"><br />
					<button type="submit" name="button">Invia</button>
			</form>
			<p>o <a href="./registrazione.php">registrati</a></p>
		</div>
	</div>

</body>
</html>
