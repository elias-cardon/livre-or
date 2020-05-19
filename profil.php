<?php
session_start();
if ($_SESSION['login']) {
	echo "Bienvenue ".$_SESSION['login']. " ! <br/><a href='logout.php'>Se déconnecter</a>";
}
else
{
	header("Location:connexion.php");
}

?>