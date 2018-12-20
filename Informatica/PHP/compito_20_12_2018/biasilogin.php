<!--biasi francesco -->
<?php session_start(); //la sessione viene aperta subito perchè devo controllare gli errori ?>
<!DOCTYPE HTML>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<?php
	function form()
	{
		echo '<form action="biasilogin.php">';
		echo 'USERNAME:<input type="text" name="username">';
		echo 'PASSWORD<input type="text" name="password">';
		echo '<input type="submit" name="premi">';
		echo '<form>';
	}
	if(!isset($_SESSION['contatore']))
	{
		$_SESSION['contatore']=0;
		form();
	}
	else
	{
		if($_SESSION['contatore']<3)
		{
				//mi calcolo quante righe ci sono nel file
				$file=fopen("utenti.php","r"); //apertura in lettura
				$lunriga=0;
				while(!feof($file))
				{
					$riga=fgets($file); //leggo la riga
					$lunriga++; //incremento il contatore
				}
				fclose($file);
				
				//ora effettuo il controllo delle credenziali
				
				$file=fopen("utenti.php","r"); //apertura in lettura
				$contatore=0;

				while(!feof($file))
				{
					if($contatore>0 || $contatore<$lunriga) //se è la prima o l ultima riga non faccio nulla
					{
						$riga=fgets($file); //leggo la riga
						$contatore++;
						$riga=trim($riga); //pulisco la riga
						$riga=explode(",",$riga);
						if($riga[0]==$_GET['username'])
						{
							$riga=fgets($file);
							$riga=trim($riga); //pulisco la riga
							$riga=explode(",",$riga);
							if($riga[0]==$_GET['password'])
							{
								$_SESSION['username']=$_GET['username']; //solo se è corretto lo memorizzo nella variabile di sessione
								echo '<meta http-equiv="refresh" content="2;biasiFine.php">'; //reinderizzo alla pagine fine.php
							}
							
						}
					}
					else
					{
						// non faccio nulla
					}
				}
				
				fclose($file);
				echo 'utente /password errati '; //se esce da while vuol dire che ha sbagliato username o password
				$_SESSION['contatore']++;
				form();
				
		}
		else
		{
			//devo inserire l indirizzo ip in un file
			if(!file_exists('biasiIP.txt'))
			{
				touch('biasiIP.txt'); //se il file non eiste lo creo
			}
			$file=fopen('biasiIP.txt','a'); //apro il file in append
			fputs($file,$_SERVER['SERVER_ADDR']);
			echo 'il tuo indirizzo ip e stato bloccato';
			$_SESSION['contatore']=0;
			form();
			
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	?>
</head>
<body>
</body>
</html>