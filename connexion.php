<?php
session_start();
if (isset($_POST['submit'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	if ($login && $password) {
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db, 'livreor');

		$query = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$login' && password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows==1) {
			$_SESSION['login'] = $login;
			header('Location:profil.php');
		}
		else
		{
			echo "Login ou password incorrect";
		}
	}

	else
	{
		echo "Veuillez saisir tous les champs.";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
	</head>
	<body>
		<main>
			<h1>Connexion</h1>
				<form method="post" action="connexion.php">
        			<p>Login</p>
        			<input type="text" name="login">
        			<p>Mot de passe</p>
        			<input type="password" name="password"><br/><br/>
        			<input type="submit" name="submit" value="Valider">
				</form>
		</main>
	</body> 
</html>