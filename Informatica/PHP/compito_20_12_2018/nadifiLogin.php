<?php								//nadifi yassin
	function form(){
		echo '<form method="GET" action="nadifiLogin.php"';
		echo 'user: <input type="text" name="username" value="username"> <br>';
		echo 'pass: <input type="text" name="password" value="password"> <br>';	
		echo '<input type="submit" value="accedi"';
		echo '</form>';
	}

	if($_SERVER['QUERY_STRING']==''){
		form();
	}else{
		
		//dovrei controllare se ip è nella lista
		
		$file=fopen('utenti.php','r');
		$cont=0;
		$accesso=false;
		while(($riga=fgets($file))!=false){
			$user=explode(",",$riga);
			if($_GET['username']==$user[0]){	//controllo password se utente corretto
				$riga=fgets($file);
				$password=explode(",",$riga);
				if($_GET['password']==$password[0]){
					session_start();
					$accesso=true;
					$_SESSION['username']=$_GET['username'];
				} else {
					$_SESSION['cont']=$cont++;
				}if($cont==3){
					$ban=true;
				}
				fclose($file);
			}
		} fclose($file);
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<?php
			if($accesso==true){
				echo '<meta http-equiv="refresh" content="1,URL=nadifiFine.php"';
			}else {
				if($ban==true){
					$ip=$_SERVER['IP_ADDRESS'];
					$file=fopen("nadifiIP.txt","w");
					$riga="\n\r" + $ip + "/";
					fwrite($file,$riga);
					fclose($file);
				}
			}
		?>
	</head>

	<body>
	</body>
</html>