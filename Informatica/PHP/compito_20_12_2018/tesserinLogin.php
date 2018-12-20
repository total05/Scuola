<?php
//Tesserin David 5Ai
function form(){ //funzione per stampare il form
	echo '<!doctype html>';
		echo '<html lang="it">';
			echo '<head>';
			echo '<meta charset="utf-8">';
			echo '</head>';
			echo '<body>';
				echo '<form action="tesserinLogin.php>';
					echo '<input type="text" name="username">';
					echo '<input type="password" name="password">';
					echo '<input type="submit" value="Login">';
				echo '</form>';
			echo '</body>';
		echo '</html>';
}
$file=fopen("utenti.php", "r"); //apro il file
if($_SERVER['QUERY_STRING']==''){
	$fileIPleggi=fopen("tesserinIP.txt","r");
	while(!feof($file)){ //ciclo che legge il file degli ip
		$riga=fgets($file);
		if($riga==$_SERVER['REMOTE_IP'){ //se l'ip nel file equivale a quello dell'utente allora non lo fa loggare
			echo "Non puoi più loggarti su questo sito";
		}
		else { //altrimenti gli fa visualizzare il form per loggare 
			form();
		}
	
}
else{
		$cont=0;
		while(!feof($file)){ //ciclo che legge il file
			if(cont==0){
				$riga=fgets($file);
			}
			$riga=fgets($file);
			$cont++;
			$riga=substr($riga, 0, strlen($riga)-1);//tolgo la virgola alla fine della riga
			}
			$loginCounter=0;
			$maxLogin=0;
			if(/*username_nel_file==$_GET['username'] && password_nel_file==$_GET['password']*/){
				$loginCounter++;
				session_start();
				$_SESSION['username']=$_GET['username'];
				$_SESSION['loginCounter']=$loginCounter;
				echo '<!doctype html>';
					echo '<html lang="it">';
						echo '<head>';
							echo '<meta charset="utf-8">';
							echo '<meta http-equiv="refresh" content="0;tesserinFine.php">';
						echo '</head>';
						echo '<body>';
						echo '</body>';
					echo '</html>';
			}
			else{
				$maxLogin++;
				if($maxLogin>=3){//aggiungo l'ip che devo poi bloccare sul file quando l'utente sbaglia il login 3 volte
					$ip=$_SERVER['REMOTE_IP'];
					$fileIPscrivi=fopen("tesserinIP.txt","a");
					fputs($fileIPscrivi,$ip);
				}
			}
			
		}
	

?>