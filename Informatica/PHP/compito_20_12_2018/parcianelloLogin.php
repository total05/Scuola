<!--Parcianello Luigi-->
<?php
	$loggato=false;
	$sbagli=0;
	if(($_SERVER['QUERY_STRING'])!=''){
		if(isset($_GET['username']) && isset($_GET['password'])){
			if($sbagli==3){
				$IP=$_SERVER['SERVER_ADDR'].',';
				$file=fopen($file, "a");
				fwrite("parcianelloIP.txt", $IP."\n");
				fclose($file);
				echo 'Hai sbagliato troppe volte';
			}
			else{
				$file=fopen("utenti.php", "r");
				while(($riga=fgets($file))!=false && !$loggato){
					$intro=explode("/*", $riga);
					$elementi=explode(",", $riga);
					if($_GET['username']==$elementi[0] && $_GET['password']==$elementi[1]){
						$loggato=true;
						session_start();
						$_SESSION['user']==$_GET['username'];
						$_SESSION['cont']++;
					}
					else{
						$sbagli++;
					}
				}
				fclose($file);
			}
			
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<?php
			if($loggato)
				echo '<meta http-equiv="refresh" content="0.1, parcianelloFine.php">';
		?>
	</head>
	
	<body>
		<form method="get" action="parcianelloLogin.php">
			Username:<input type="text" name="username"><br>
			Password:<input type="text" name="password"><br>
			<input type="submit" value="Send">
		</form>
	</body>
</html>