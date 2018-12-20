<!-- Matteo Piovesan 5-Ai -->
<?php 
	if($_SESSION["name"]!=null)
	{
		session_start();
		$f1=fopen("numbers.txt","r");
		$f2=fopen("numbers1.txt","w");
		$conn=0;
		while(!feof($f1))
		{
			$str=fgets($f1);
			fwrite($f2,$str);
			if($str==$_SESSION["name"])
			{
				$conn=fgets($f1)+1;
				fwrite($f2,$conn.PHP_EOL);
			}
			else fwrite($f2,fgets($f1));
		}
		fclose($f1);
		fclose($f2);
		$f3=fopen("numbers.txt","w");
		$f4=fopen("numbers1.txt","r");
		while(!feof($f4))
		{
			fwrite($f3,fgets($f4));
		}
		fclose($f3);
		fclose($f4);
	}
	
?>
<html>
<head>
<meta action="refresh" content="4;URL=piovesanLogin.php">
<charset="UTF-8">
</head>
<body>
	<?php
		echo "Ciao ".$_SESSION["name"]." questa è la ".$conn." volta che ti connetti";
	?>
</body>
</html>