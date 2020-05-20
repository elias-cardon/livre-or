<?php
session_start();
if ($_SESSION['login']) {
	echo "Bienvenue ".$_SESSION['login']. " ! <br/><a href='logout.php'>Se déconnecter</a><br/>

	<a href='changement.php'>Changer de mot de passe</a>";
}
else
{
	header("Location:connexion.php");
}
?>