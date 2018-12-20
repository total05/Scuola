<?php
	session_start();
?>
<html>
<head>
<meta charset="utf-8">
<?php
	function vform()
	{
		echo"
		<form method=\"GET\" action=\"codenlogin.php\">
		<input type=\"text\" name=\"username\">
		<input type=\"text\" name=\"password\">
		<input type=\"submit\">
		</form>
		";
	}
function meta()
{
	echo'<meta http-equiv="refresh" content="0;URL="codenFine.php"">';
}	
?>
</head>
<body lang="it">
<?php
if($_SERVER['QUERY_STRING']=="")
{
	vform();
	$_SESSION['cont']=0;
}
else
{
	if(isset($_GET['username']) && isset($_GET['password']))
	{
		//apro il file mod. lettura
		$fo=fopen('utenti.php','r');
		$riga_si_riga_no=true;
		//controllo se il file c'è e lo legge
		if($fo)
		{
		//salta la prima riga
		fgets($fo);
		//scorro le righe del file 1 per una finchè non trovo quella giusta
		while($riga=fgets($fo))
		{
			if($riga_si_riga_no==true)
			{
				$username=explode(',',$riga);
				$riga_si_riga_no=false;
			}
			else
			{
				$riga_si_riga_no=true;
				$password=explode(',',$riga);
				if($username==$_GET['username'] && $password==$_GET['password'])
				{
				$_SESSION['username']=$_GET['username'];
				meta();
				}
				else
				{
					if($_SESSION['cont']==3)
					{
					//blocco l'ip
					echo'sei stato bloccato';
					break;
					}
					else
					{
						$_SESSION['cont']++;
					}
				}
			}
		}
		vform();
		}
		else
		{
			echo'file non trovato';
		}
	}
}
?>
</body>
</html>