<?php //Pallaro Marco
	if($_SERVER['QUERY_STRING']==''){
		
	}else{
		$file=fopen("utenti.php","r");
			$seiLoggato=false;
			while(($stringa=fgets($file))!=false){
				$stringa=trim($stringa);
				if($stringa!="<?php /*"|| $stringa!="*/ ?>" ){
					$vettore = explode(',',$stringa);
					if($vettore[0]==$_GET['username']){
						$stringa1=fgets($file);
						$vettore1=explode(",",$stringa1);
						if($vettore[0]==$_GET['password']){
							$seiLoggato=true;
							session_start();
							$_SESSION['username']='$_GET['username']';
							$_SESSION['numeroLoginEffettuato']++;
						}
					}
			}
			fclose($file);
	}
?>
<!doctype HTML>
<html>
	<head>
	<?php 
	function visualizzaForm(){
		echo '<form type="get" action="pallaroLogin.php">';
		echo '<input type="text" name="username"> <br>';
		echo '<input type="text" name="password"> <br>';
		echo '<button type="submit"> login </button> <br> </form>';
	};
	function reindirizza(){
		//reindirizza
	}
	?>

	</head>
<body>
	<?php
	$cognomeIp=fopen("cognomeIP.txt","r");
		$ListaNera=false;
		while(($stringa=fgets($file))!=false){
			if(($_SERVER['REMOTE_ADDR'])==(trim($stringa)){
				$ListaNera=true;
			}
		}
	fclose($cognomeIp);
	
	if($ListaNera!=true){
		if($_SERVER['QUERY_STRING']==''){
			visualizzaForm();
			loginErrato=0;
		}else{
				if($seiLoggato==true){
					reindirizza();
				}else{
					loginErrato++;
					if(loginErrato==3){
						$cognomeIp=fopen("cognomeIP.txt","a"){
							$stringa='$_SERVER['REMOTE_ADDR']."\r\n"';
							fread($cognomeIP,$stringa);
							fclose($cognomeIp);
					}
				}
					
			
			
			
			}
		}
	}else{
		echo 'sei stato bloccato';
	}	
	?>
</body>
</html>