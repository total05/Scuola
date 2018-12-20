<?php
//Faloppa Alessio 5Ai
if($_SERVER['QUERY_STRING']==''){
	echo 'Hai saltato il login, verrai reindirizzato a tale pagina';
	echo '<meta http-equiv="refresh" content="2,http://serverdebian/~lab02pc20/faloppaLogin.php">';
}else{
	session_start();
	if($_GET['nsessione']==$_SESSION['session_id']){
		echo 'Ciao'.$_SESSION['username'].', questa è la '.$_SESSION['numerologin'].'esima volta che ti logghi ecc...';
			echo '<meta http-equiv="refresh" content="5,http://serverdebian/~lab02pc20/faloppaLogin.php">';
	}else{
		echo '<meta http-equiv="refresh" content="0,http://serverdebian/~lab02pc20/faloppaLogin.php">';
	}
}
?>