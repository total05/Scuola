<!--tesolin davide !-->
<?php
	if($_SERVER["QUERY_STRING"]==""){
		$accesso=false;
		$_SESSION["cont"]=0;
	}
	else{
		$accesso=false;
			$file=fopen("utenti.php","r");
			while(($riga=fgets($file))==true&&accesso=false){
				$i=0; //per vedere se la riga è il nome utente o la password
				$i++;
				$v=explode(",",$riga);
				if($i%2==0){
					if(($_GET["username"]==$v[0])){
						$nome=true;
					}
				}else{
					if(($_GET["password"]==$v[0])){
						$password=true;
					}
				}
					
			}
			if(($nome==true)&&(password==true))accesso=true;
			if($accesso=true){
				
				session_start();
				$_SESSION["nomeUtente"]=$_GET["username"];
				$_SESSION["accesso"]="true";
			}
			
			
	}
	
?>
<html>
	<head>
		<meta charset="UTF-8">
			<?php
				if($accesso==true)echo '<meta http-requiv="refresh" content="1;tesolinFine.php>';
				function form(){
					echo '<form method="GET" action="tesolinLogin.php">';
						echo '<input type="text" name="username" >';
						echo '<input type="text" name="password" >';
						echo '<input type="submit" value="accedi">';
					echo "</form>";
				}
			?>	
	</head>
		
		<body lang="it">
			<?php
				if($_SERVER["QUERY_STRING"]==""){
					form();
					
				}else{
					if($accesso==true) echo "sei loggato";
					else{
						echo "non sei loggato";
						form();
					}
				}
				
			?>
		</body>
</html>