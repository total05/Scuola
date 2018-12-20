<!-- Zanutto Davide -->
<?php

	$accesso=false;
	$temp=false;
	$user="";
	//$ban=false;									//le parti commentate sono per il file zanuttoIP che non sono riuscito a fare
	$miofile=fopen("utenti.php","r");
	if($_SERVER['QUERY_STRING']=='')
	{
		
	}
	else
	{
		while(($riga=fgets($miofile))!=false)				//leggo una riga del file, se l'username è quello controllo la password
		{
			$vettore=explode(",",$riga);
			if($vettore[0]==$_GET['username'])
			{
				$riga=fgets($miofile);						//vado alla riga dopo
				$vettore1=explode(",",$riga);
				if($vettore[0]==$user&&$temp==true)			//Questo controllo è perchè sia valida solo l'ultima password di ogni utente
					{
						$accesso=false;
					}
					$temp=true;
				
				if($vettore1[0]==$_GET['password'])			//Controllo delle password
				{
					$user=$_GET['username'];
					$accesso=true;
				}
			}
		}
		if($accesso==true)									//Quando ha trovato l'username con l'ultima password inizia la sessione
		{
			session_start();
		}
	}

?>
<html>
	<head>
	<?php
		function form()												//creazione form
		{
			echo '<form method="GET" action="zanuttoLogin.php">';
			echo 'Username: <input type="text" name="username"> <br>';
			echo 'Password: <input type="password" name="password"> <br>';
			echo '<input type="submit" name="invia">';
			echo '</form>';
		}

		/*if($cont==3)
		{
			$fileip=fopen("zanuttoIP.txt","a");
			$nuovo=$_SERVER['GET_ADDR'];
			$ban=true;
			echo 'Non puoi più accedere da questo IP';
		}
		*/
		if($accesso==true)												//lo indirizzo all'altra pagina
		{
			$_SESSION['username']=$_GET['username'];
			echo '<meta http-equiv="refresh" content="0.01; url=zanuttoFine.php">';
		}
		
		
		echo '</head>';
		echo '<body lang="it">';
		form();
		
		if($accesso==false&&$_SERVER['QUERY_STRING']!='')				//se ha sbagliato a loggarsi
		{
			echo "Username o password errati";
			/*$cont++;
			echo "Errori: ".$cont; */
		}
		echo '</body>';
	?>
</html>