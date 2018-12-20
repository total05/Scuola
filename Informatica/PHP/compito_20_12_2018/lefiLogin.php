<?php
/*Lefi Alberto


<DOCTYPE html><html>
<head></head>
<body></body>
</html>*/
session.start();
function stampaForm()
{
	echo '<form method="GET">';
	echo '<input type="text" name="Utente">';
	echo '<input type="text" name="Password">';
}

fopen("r", "lefiIP.txt")
while($ip=fgets())
{
	if($_SERVER["remote_address"]==$ip)
	{
		echo "ip bloccato";
		$blocco=true;
	}
}
if($blocco==false)
{
if($_SERVER["QUERY_STRING"]=="")
{
	
	$_SESSION["contaErrori"]=0;
	echo "<DOCTYPE html><html><head>";
	stampaForm();
	echo "</head><body></body></html>";
	
}
else
{
	if($_SESSION["contaErrori"]<3)
	{
		fopen("r", "utenti.php");
		for($i=0;$i<;$i++;)
		{
			$riga=fread();
			list($var1, explode(",", $riga))
			
			if($_GET("Utente")==$var1)
			{
				$_SESSION["verifica"]=true;
			}
			else
			{
				if($_SESSION["verifica"]==true)
				{
					if($_GET("Password")==$var1)
					{
						echo "<DOCTYPE html><html><head>";
						echo '<meta http-equiv="refresh" content="0,http://serverdebian/~lab02pc09/lefiFine.php">';
					}
					else
					{
						$_SESSION["contaErrori"]+=1;
					}
					
				}
				
			}
			
			
			
		}
		fclose();
		
	}
	else
	{
		echo "<DOCTYPE html><html><head></head>";
		echo "il tuo ip sara bloccato.";
		
		fopen("w", "lefiIP.txt");
		fwrite($_SERVER["remote_address"]);
		fclose();
	}
}
}
else
{
	echo "sei bloccato";
}


?>