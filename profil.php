<?php
session_start();
 $id = $_SESSION['username'];
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'registration');
$user = "SELECT * FROM users WHERE id = '$id'";
$userquery = mysqli_query($con, $user) or die('ERREUR SQL !'.$user.'<br>'.mysqli_error($con));
$rowuser = mysqli_fetch_array($userquery);
?>
<html>
   <head>
      <title></title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="profil.css">
   </head>
   <body>

      <div class="content">
         <div class "row" align="center">
            <div class = "col-lg-offset-3 col-lg-6 col-lg-offset-3 well">

                 <p>Bienvenue dans votre Espace <b><?php echo $rowuser['username'];?></b> voici vos informations</p>
                 <br /><br />
                 Pseudo = <?php echo $rowuser['username']; ?>
                 <br />
                 <br />
                 Mail = <?php echo $rowuser['email']; ?>
                 <br />
                 <br />
                 Password = <?php echo $rowuser['password']; ?>
                 <br /><br />
                 Photo = <?php echo $rowuser['avatar']; ?>
                 <br /><br />



              <?php
                 if(isset($_SESSION['username']) AND $rowuser['username'] == $_SESSION['username']) {
                    // on prépare une requete SQL cherchant tous les titres, les dates ainsi que l'auteur des messages pour le membre connecté
$sql = 'SELECT id, id_expediteur, Objet, date, Message FROM msg WHERE id_destinataire="'.$_SESSION['id'].'"';
// lancement de la requete SQL
$req = mysqli_query($con, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($con));
$nb = mysqli_num_rows($req);

if ($nb == 0) {
	echo 'Vous n\'avez aucun message.';
}
else {
	// si on a des messages, on affiche la date, un lien vers la page lire.php ainsi que le titre et l'auteur du message
	while ($data = mysqli_fetch_array($req)) {
	echo $data['date'] , ' - <a href="lire.php?id_message=' , $data['id_message'] , '">' , stripslashes(htmlentities(trim($data['objet']))) , '</a> [ Message de ' , stripslashes(htmlentities(trim($data['expediteur']))) , ' ]<br />';
	}
}
mysqli_free_result($req);
mysqli_close($con);
?>
<br /><a href="message.php">Envoyer un message</a>
<br /><br /><a href="commande.php">Voir mes commandes</a>
<br /><br /><a href="editprofil.php">Editer mon profil</a>
<br /><br /><a href="logout.php">Déconnexion</a>
<br /><br /><a href="index.php">Retour a l'accueil</a>


                <?php
                   }
                 ?>
            </div>
         </div>
      </div>
   </body>
</html>
