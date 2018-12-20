<?php
session_start();
?>

<!--serafin andrea-->
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<?php
			$miofile=fopen("utenti.php","r");
			$file_bloccati=fopen("serafinIP.txt","r");
			function visualizzaform(){
				echo'<form method="get" action="serafinLogin.php">';
				echo'Inserisci il tuo username <input type="text" name"username"></br>';
				echo'Inserisci la password <input type="text" name"password"></br>';
				echo'<input type="submit" name"confirm" value="conferma"></br>';
				echo'</form>';
			}
			
			function loggato(){
				echo'<meta http-equiv="refresh" content="5 url=serafinFine.php">';
			}
		?>
	</head>
	
	<body>
		<?php
			
			if($_SERVER['QUERY_STRING']==''){
				visualizzaform();
			}
			else{			
				while((($buffer=fgets($file_bloccati))==true)==$_SERVER['REMOTE_ADDR']){
				
						echo"Il tuo Indirizzo IP è stato bloccato.";
				}
				while(($bufferUsers=fgets($moifile))==true){
					$tentativi=1;
					
					$numeroLogin==0;
					
					
					$pezzi=explode(',',$bufferUsers);
					
					if($pezzi[0]==$_GET['username']){
						$_SESSION['username']==$_GET['username'];
						$numeroLogin==$_SESSION['numlog'];
						$numeroLogin=$numeroLogin+1;
						$_SESSION['numlog']==$numeroLogin;
						loggato();
					}
					else{
						$tentativi=$tentativi+1;
					}
					
				}
			}
			
		?>
	</body>

</html>
