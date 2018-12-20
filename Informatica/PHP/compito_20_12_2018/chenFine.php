<?php
	$verify=true;
	$completed=false;
	if(isset($_GET["user"]) && isset($_GET["pass"])){
		session_start();
	}else $verify=false;
?>
<!DOCTYPE html>
<!--ChenDalong 20/12/2018 Verifica 5AITT-->
	<html>
	
		<head>
		
		<meta charset="utf-8">
		
		<?php
		
		if(!$verify){
			echo '<meta http-equiv="refresh" content="0;URL=chenLogin.php">';
		}
		
		if(completed)	echo '<meta http-equiv="refresh" content="5;URL=chenLogin.php">';
		
		function parole(){			//incompleto
			if($_SESSION["times"]==1){
				return "prima";
			}else if($_SESSION["times"]==2){
				return "seconda";
			}else if($_SESSION["times"]==3){
				return "terza";
			}
		}
		?>
		
		</head>
		
		<body lang="it">
		
		<?php
			if($verify==true){
				echo 'Ciao '.$_GET["user"].", questa e' la ".echo parole().' volta che ti logghi. </br>Grazie per essere passato a salutarci. </br>Ora verrai buttato fuori e reindirizzato alla pagina di login.';
				
				$completed=true;
			}
			
		?>
		</body>
	
	</html>
		