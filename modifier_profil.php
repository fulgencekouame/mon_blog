<?php
session_start();
include 'config.php';
?>
<?php
if(isset($_SESSION['username'])){
  ?>
  <?php
if(isset($_GET['id']))
{
// On place dans une variable l'id transmit dans l'url
$id = (int)$_GET['id']; //anti-injections !

//On sélectionne tout dans la table correspondant à l'id
$result = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
$affiche_data  = mysqli_fetch_assoc($result);
?>
<form class="box" action="modifier_profil.php?id=<?php echo $id;?>" method="post" enctype = "multipart/form-data">

      <!-- <h1 class="box-title">S'inscrire</h1> -->
  	<input type="text" class="box-input" value ="<?php echo($affiche_data['username']);?>" name="username" placeholder="Nom d'utilisateur" required /><br><br>
      <input type="text" class="box-input" value ="<?php echo($affiche_data['email']);?>" name="email" placeholder="Email" required /><br><br>
  	<input type="password" class="box-input" value ="<?php echo($affiche_data['password']);?>" name="password" placeholder="Mot de passe" required /><br><br>
  	<label for="avatar">Image perso <span class="small"></span></label><br><br>
  	<input type="file" value ="<?php echo($affiche_data['avatar']);?>" name="avatar"/><br><br>
    <img src="image/<?php echo($affiche_data['avatar']);?>" width='40px' height='35px'/>

    <button type="submit"name="Modifier" class="btn btn-primary">Save Changes</button>

    </div>
</form>
<?php
}
//Si l'action de Modifier à été faite (bouton "Modifier" du formulaire)
if(isset($_POST['Modifier']))
{

//On attribue une variable pour chaque champ du formulaire
//commentaire
 $username = mysqli_real_escape_string($con,$_POST['username']);
 $email = mysqli_real_escape_string($con,$_POST['email']);
 $password = mysqli_real_escape_string($con,$_POST['password']);
 $avatar = $_FILES['avatar']['name'];
  if ($avatar == "") {
    mysqli_query($con,"UPDATE users SET username='$username', email='$email' , password='$password' WHERE id=$id") or die('Requête invalide : ' . mysql_error());
    // //Si il y a une erreur, on crie ^^
    //Si tout va bien, on informe que la modification est faite
    echo 'La modification à été effectué avec succès.';
  }
  else {
    // //On enregistre les données modifiées
    $fichierTemporaire = $_FILES['avatar']['tmp_name'];
    move_uploaded_file($fichierTemporaire,'./image/'.$avatar);
    mysqli_query($con,"UPDATE users SET username='$username', email='$email' , password='$password' , avatar='$avatar' WHERE id=$id") or die('Requête invalide : ' . mysql_error());
    // //Si il y a une erreur, on crie ^^
    //Si tout va bien, on informe que la modification est faite
    echo 'La modification à été effectué avec succès.';
  }

}

//Fermeture de la connexion à la base de données

?>
<?php }?>
