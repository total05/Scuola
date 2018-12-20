<!--Codognotto Federico-->

<?php
	$loggato=false;
	if ($_SERVER["QUERY_STRING"]!='')
		{
		/*if ($cont==3)
			{
			
			}
		else
			{
			$cont++;
			}*/
		$file=fopen ("utenti.php", "r");
		while (($riga=fgets($file))!=false)
			{
			$elemento=explode ($riga, ",");
			if ($elemento[0]==$_GET["user"])
				{
				$riga=fgets ($file);
				$elemento[0]=explode ($riga, ",");
				if ($elemento[0]==$_GET["pass"])
					{
					$loggato=true;
					$_SESSION["user"]=$_GET["user"];
					}
				}
			}
		fclose ($file);
		}
?>


<!DOCTYPE html>
<html lang="it">
	<head>
		<title> codognottoLogin </title>
			<?php
				if ($loggato)
					{
					echo '<meta http-equiv content=0.1, URL="codognottoFine.php">';
					session_start ();
					}
			?>
	</head>
	<body>
		<form method="get" action="codognottoLogin.php">
			Username: <input type="text" name="user">
			Password: <input type="text" name="pass"> <br>
			<input type="submit" value="send">
		</form>
	</body>
</html>