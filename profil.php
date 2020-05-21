<?php
session_start();
if ($_SESSION['login']) {
	echo "<p>Bienvenue ".$_SESSION['login']. " ! <br/>

	<a href='changement_mdp.php'>Changer de mot de passe</a><br/>

	<a href='changement_login.php'>Changer de login</a><br/>
	<a href='logout.php'>Se déconnecter</a></p>";
}
else
{
	header("Location:connexion.php");
}
?>


<?php
echo '<style>
h1
{
	text-align : center;
	font-family: "Source Sans Pro", Helvetica, sans-serif;
	text-decoration : underline;
}

p
{
	text-align : center;
	font-family: "Source Sans Pro", Helvetica, sans-serif;
	font-size: 16pt;
	font-weight: 400;
	line-height: 1.75em;
	border : 4mm ridge rgba(170, 50, 220, .6);
}

a
{
	text-decoration : none;
	color : brown;
}

body
{
	background-color : cadetblue;
}

</style>';
?>