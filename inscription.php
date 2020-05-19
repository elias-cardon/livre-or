<?php
if(isset($_POST['submit']))
{
	$login = htmlentities(trim($_POST['login']));
	$password = htmlentities(trim($_POST['password']));
	$repeatpassword = htmlentities(trim($_POST['repeatpassword']));

	if($login && $password && $repeatpassword)
	{
		if($password == $repeatpassword)
		{
			$password = md5($password);
			$db = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($db, 'livreor');

			$query = mysqli_query($db, "INSERT INTO utilisateurs (login, password) VALUES('$login', '$password');");

			die("Inscription terminée. <a href='connexion.php'>Connectez-vous</a>.");
		}
		else
		{
			echo "Les mots de passes doivent être identiques";
		}
	}
	else
	{
		echo "Veuillez saisir tous les champs";
	}
}
?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
	</head>
	<body>
		<main>
			<h1>Inscription</h1>
				<form method="post" action="inscription.php">
        			<p>Login</p>
        			<input type="text" name="login">
        			<p>Mot de passe</p>
        			<input type="password" name="password">
        			<p>Répetez votre mot de passe</p>
        			<input type="password" name="repeatpassword"><br><br>
        			<input type="submit" name="submit" value="Valider">
				</form>
		</main>
	</body> 
</html>