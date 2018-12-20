<?php
/*Lefi Alberto

<DOCTYPE html><html><head>

</head>
<body></body>
</html>*/

if($_SERVER["QUERY_STRING"]=="")
{
	echo '<DOCTYPE html><html><head><meta http-equiv="refresh" content="0,http://serverdebian/~lab02pc09/lefiLogin.php"></head><body></body></html>';
}
else
{
	session.start();
	echo '<DOCTYPE html><html><head></head><body>';
	echo 'Ciao '.$_SESSION["Utente"].', questa e la Nesima volta che ti logghi. Grazie per essere passato a salutarci.
		  Ora verrai buttato fuori e reindirizzato alla pagina di Login.';
	
	echo '</body></html>';
}


?>