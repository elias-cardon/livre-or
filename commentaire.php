<meta charset="utf-8" />
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=livreor','root','');
$requete_uti = "SELECT id FROM utilisateurs WHERE login ='" .$_SESSION['login']. "'";
$requete_comm = $bdd->prepare($requete_uti);
$requete_comm->execute();
$utilisateurs = $requete_comm->fetch(PDO::FETCH_ASSOC);
if ($_SESSION['login']) {
  if(isset($_POST['commentaire']))
   {
       $commentaire = htmlspecialchars($_POST['commentaire']);

       $insert = $bdd->prepare('INSERT INTO commentaire(id_utilisateur, commentaire, date) VALUES (:id, :commentaire, CURTIME())');
       $insert->execute(array(
        "id"=>$utilisateurs['id'],
           "commentaire" => $commentaire
       ));
   }
}

?>

<h2>Commentaires:</h2>
<form action="commentaire.php" method="POST">

   <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br />
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />

</form>