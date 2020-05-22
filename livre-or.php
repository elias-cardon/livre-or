<?php
    session_start();
    $bdd = mysqli_connect("localhost", "root", "", "livreor");
    $requete = "SELECT utilisateurs.*, commentaire.*, DATE_FORMAT(date,'%d/%m/%y') as test FROM commentaire INNER JOIN utilisateurs ON commentaire.id_utilisateur = utilisateurs.id";
    $query = mysqli_query($bdd, $requete);
    $commentaire= mysqli_fetch_all($query);
?>


<style>

/* entête début */
* {
  padding: 0;
  margin: 0; 
  box-sizing: 
  border-box;
}

header {
	background: url('https://www.macabann.com/images/arts/book018.jpg');
	text-align: center;
	width: 100%;
	height: auto;
	background-size: cover;
	background-attachment: fixed;
	position: relative;
	overflow: hidden;
	border-radius: 0 0 85% 85% / 30%;
}

header .overlay{
	width: 100%;
	height: 50%;
	padding: 50px;
	color: #FFF;
	text-shadow: 1px 1px 1px #333;
  background-image: linear-gradient( 135deg, #9f05af69 10%, #fd5e086b 100%);
	
}

h1 {
	font-family: 'Dancing Script', cursive;
	font-size: 80px;
	margin-bottom: 30px;
}

h3, p {
	font-family: 'Open Sans', sans-serif;
	margin-bottom: 30px;
}

button {
	border: none;
	outline: none;
	padding: 10px 20px;
	border-radius: 50px;
	color: #333;
	background: #fff;
	margin-bottom: 50px;
	box-shadow: 0 3px 20px 0 #0000003b;
}

button:hover{
	cursor: pointer;
} /* entête fin */

body{
    text-align: center;
    font-size:30px;
    background-color: #E9B2DB;
}

</style>


<html>
    <header>
        <div class="overlay">
            <h1>Livre d'Or</h1>
            <h3>"Avis membres/clients"</h3>
            <p></p>
            <br>
            <button><a href="index.php">Accueil</a></button>
            <button><a href="inscription.php">Inscription</a></button>
            <button><a href="connexion.php">Connexion</a></button>
        </div>
    </header>

    <body>
        <ul> 
</br>
        <?php foreach ($commentaire as $commentaire){?>
        <li><B>Posté le</B> <?= $commentaire[7] ?> <B>Par</B> <?= $commentaire[1] ?> <B>:</B> <?= $commentaire[4] ?></li>
        <?php } ?>
        </ul>
    </body>
</html>

