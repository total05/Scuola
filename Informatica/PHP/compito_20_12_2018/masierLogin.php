<!-- Masier Michele -->
<?php 
$apertura=fopen("masierIP.txt","r");
	while($riga=fgets($apertura)!=false){
			$ip=explode(",",$riga);
			if($_SERVER['REMOTE_ADDR']==$riga){
				
			}
			
	}
fclose($apertura);	
	if($_SERVER['QUERY_STRING']==""){
		$contatorelogin=0;
		echo '<!DOCTYPE html>';
		echo '<html lang="it">';
		echo '<head>';
		echo '<meta chartset="utf-8" >';
		echo '</head>';
		echo '<body>';
		echo '<form method="get" action="masierLogin.php" >';
		echo 'nome utente<input type="text" name="username">';
		echo 'password<input type="text" name="password">';
		$contatorelogin=0;
		echo '<input type="submit">';
		echo '</body>';
		echo '</html>';
}
else{
	$aperturafile=fopen("utenti.php","r");
	while($riga=fgets($aperturafile)!=false){
			$utenti=explode(",",$riga);
				if($_GET['username']==$utenti[0]&&$_GET['password']==$utenti[1]){
					session_start();
					echo '<!DOCTYPE html>';
					echo '<html lang="it">';
					echo '<head>';
					$_SESSION['username']=$_GET['username'];
					$_SESSION['contatore']=$_SESSION['contatore']+1;
					echo '<meta chartset="utf-8" http-equiv="refresh" content="5 URL=masierFine.php">';
					echo 'funzionaaaaaa';
					echo '</head>';
					echo '<body>';
					echo '</body>';
					echo '</html>';					
			}
		
	}
	fclose($aperturafile);
		echo '<!DOCTYPE html>';
		echo '<html lang="it">';
		echo '<head>';
		echo '<meta chartset="utf-8" http-equiv="refresh" content="3 URL=masierLogin.php">';
		echo '</head>';
		echo '<body>';
		if($contatorelogin==3){
			echo 'ora ti blocco l ip';
			$aperturafile=fopen("masierIP.txt","a");
			$riga=$_SERVER['REMOTE_ADDR']."/"."\r\n";
			fwrite($aperturafile,riga);
		}
		$contatorelogin++;
		
		echo '<form method="get" action="masierLogin.php" >';
		echo 'nome utente<input type="text" name="username">';
		echo 'password<input type="text" name="password">';
		echo '<input type="submit">';
		echo '</body>';
		echo '</html>';
}

?>