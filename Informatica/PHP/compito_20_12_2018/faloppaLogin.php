<?php
error_reporting(0);
//Faloppa Alessio 5Ai
/*Stampa form*/
function visForm(){
	echo '<form method="get" action="faloppaLogin.php">';
		echo 'Username: <input type="text" name="usnm"><br>';
		echo 'Password: <input type="text" name="psw"><br>';
			echo '<input type="submit">';
	echo '</form>';
}
/*Funzioni apertura e chiusura html*/
function aperHtml(){
	echo '<!DOCTYPE html>';
		echo '<html>';
			echo '<head></head>';
				echo '<body>';
}
function chiusHtml(){
	echo '</body>';
}
/*Funzioni per il controllo su file*/
function controlloFile($file,$usnmpassata,$pswdpassata){
	$miofile=fopen($file,"r");
		while(!feof($miofile)){
			$riga=fgets($miofile);
				if($riga!='/*' || $riga!='*/ ?>'){
					$utente=explode(",",$riga);
					if($utente[0]==$usnmpassata && $utente[1]==$pswdpassata){
						fclose($miofile);
						return true;	
					}
				}
		}
		fclose($miofile);
			return false;
}
/**/
function controllosebloccato($file,$iputente){
	$miofile=fopen($file,"r");
		while(!feof($miofile)){
			$riga=fgets($miofile);
			if($riga==$iputente){
					fclose($miofile);
					return true;
			}
		}	
		fclose($miofile);
			return false;
}
/*Esecuzione*/
//Controllo se l'ip è bloccato e in caso lo blocco
if(controllosebloccato("faloppaIP.txt",$_SERVER['REMOTE_ADDR'])==true){
	aperHtml();
		echo 'Non ti è consentito effettuare altri login';
	chiusHtml();
}else{
	//Controllo se è il primo accesso
	if($_SERVER['QUERY_STRING']==''){
		aperHtml();
			visForm();
			controlloFile('utenti.php',$_GET['usnm'],$_GET['psw']);
		chiusHtml();
	}else{
		//Controllo se le credenziali inserite sono corrette
		if(controlloFile('utenti.php',$_GET['usnm'],$_GET['psw'])==true){
			session_start();
				aperHtml();
					echo '<meta http-equiv="refresh" content="0,http://serverdebian/~lab02pc20/faloppaFine.php?nsessione="'.$_SESSION['session_id'].'"">';
						$_SESSION['username']=$_GET['usnm'];
						$_SESSION['numerologin']=$_SESSION['numerologin']+1;
				chiusHtml();
		}else{
			aperHtml();
				echo 'hai sbagliato le credenziali';
			chiusHtml();
		}
	}
}
?>