<?php
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
	{
		header("codenlogin.php");
	}
	else
	{
		if(!isset($_SESSION['nvolte']))
		{
			$_SESSION['nvolte']=0;
		}
	}
?>
<html>
<head>
<meta charset="utf-8">
<?php
	function mex()
	{
		$username=$_SESSION['username'];
		$nvolte=$_SESSION['nvolte'];
		echo"
			ciao $username questa e la $nvolte"."esima volta che ti logghi. Grazie per essere passato a salutarci. Ora verrai buttato fuori e reinderizato alla pagina login
		";
	}	
?>
</head>
<body lang="it">
<?php
if($_SERVER['QUERY_STRING']=="")
{
	mex();
	session_destroy();
	echo'<meta http-equiv="refresh" content="3;URL="codenFine.php"">';
}
?>
</body>
</html>