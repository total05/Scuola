<?php
	session_start();
?>	
<html>
	<head>
		<?php
			if($_SESSION["accesso"]="true"){
				echo '<meta http-requiv="refresh" content="1;tesolinLogin.php>';
			}
				
			
	?>
	</head>
		<body>
			<?php
				if($_SESSION["accesso"]="true"){
					echo "ciao ".$_SESSION["nomeUtente"];
					echo "questa e' la ".$_SESSION["cont"]++."esima volta che ti logghi. Grazie per essere passato a salutarci. Ora verrai buttoto fuori e";
					echo "reindirizzato alla pagina di login";
				}
					
			?>
		</body>
</html>	
