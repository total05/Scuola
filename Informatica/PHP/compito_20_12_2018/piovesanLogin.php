<!-- Matteo Piovesan 5-Ai -->
<html>
	<head>
		<?php
		
			$ban=fopen("piovesanIP.txt","r");
			$found=false;
			do
			{
				if(fgets($ban)==$_GET["user"]&&fgets($ban)==$_GET["pass"]) $found=true;
			}while(!feof($ban))
			fclose($ban);
			if($found==false)
			{
				
				$analize=true;
				if($_SERVER["QUERY_STRING"]=="") $analize=false;
				else
				{
					$file=fopen("utenti.php","r");
					fgets($file); //rimuove a prima riga del file
					$found=false;
					do
					{
						if(fgets($file)==$_GET["user"].",".PHP_EOL&&fgets($file)==$_GET["pass"].",".PHP_EOL) $found=true;
					}while(!feof($file))
					fclose($file);
					if($found)
					{
						session_start();
						$_SESSION["name"]=$_GET["user"];
						echo "<meta action=\"refresh\" content=\"0;URL=piovesanFine.php\">";
					}
						
					else
					{
						$analize=true;
						if($_SESSION["fail"]=="")
						{
							$_SESSION["fail"]==0;
						}
						$_SESSION["fail"]++;
						if($_SESSION["fail"]==3)
						{
							$black=fopen("piovesanIP.txt","a");
							fwrite($black,$_SERVER["REMOTE_ADDR"].PHP_EOL);
							fclose($black);
						}
					}
				}
			}
		?>
	</head>
	<body>
		<?php
		if($analize)
		{
			echo "<form action=\"piovesanLogin.php\">";
			echo "<input type=\"text\" name=\"user\" id=\"user\"> user</br>";
			echo "<input type=\"text\" name=\"pass\" id=\"pass\"> pass";
			echo "</form>";
		}
		?>
	</body>
</html>