<?php
	$address=$_SERVER["ADDR_IP"];
	$status=false;
	$fine=false;
	$ban=false;
	if(file_exists("chenIP.txt") || (!status) || (!fine)){		//incompleto
		while(!fine)
		{
			$temp=fopen("chenIP.txt","r");
			$check=fgets($temp);
			if($address==$check.PHP_EOL) $status=true;
			if(feof($check)) $fine=true; 	//questo check per controllo ip
			if(status){
				$check=fgets($temp);		//questo check per controllo tentativi
				if($check==3) {ban=true; }
			}
		}
	}else{
		$temp=fopen("chenIP.txt","w");
		fwrite($temp,$address.PHP_EOL);
		fwrite($temp,"0".PHP_EOL);
		fclose($temp);
		
	}
	
	
	
	$strname="";
	$strpw="";
	$right=false;
	$eof=false;
	$handle=fopen("utenti.php","r");
	$strname=fgets($handle); //per non contare la prima riga
	while(!($right) && !($eof)){
		if(!feof($handle)){
			$strname=fgets($handle);
			if($_GET["user"].",".PHP_EOL==$strname){
				$strpw=fgets($handle);
				if($_GET["pass"].",".PHP_EOL==$strpw)
				{
					$right=true; //se user e pw corretti;
				}
			}
		}else $eof=true;
		
	}
	fclose($handle);
	if($right) session_start();
?>
<!DOCTYPE html>
<!--ChenDalong 20/12/2018 Verifica 5AITT-->
	<html>
	
		<head>
		
		<meta charset="utf-8">
		<?php
			if(ban) echo '<meta http-equiv="refresh" content="10;URL=chenLogin.php">';
		?>
		</head>
		
		<body lang="it">
		<?php
			if(ban) echo "Hai utilizzato i massimi 3 tentativi per loggarti. Ora non puoi piu' avere altri tentaviti";
		?>
		<p>Login</p>
		</br>
		<form method="get" action="chenFine.php">
		USER : <input type="text" name="user" value="user"></br>
		PW : <input type="text" name="pass" value="pass"></br>
		<input type="submit" name="Login" value="Login">
		
		</body>
	
	</html>
		