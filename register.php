<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con, $username);
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con, $password);
	 
	//avatar
	$nomphoto=$_FILES['photo']['name'];
	$fichierTemporaire=$_FILES['photo']['tmp_name'];
	move_uploaded_file($fichierTemporaire,'./image/'.$nomphoto);
	$status = '0';

	$query = "INSERT into `users` (username, email, type, password, avatar, status)
				VALUES ('$username', '$email', 'user', '".hash('sha256', $password)."', '$nomphoto', '$status' )";
	$res = mysqli_query($con, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post" enctype = "multipart/form-data">
	
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
	<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
	<label for="avatar">Image perso<span class="small">(facultatif)</span></label><br>
	<input type="file"  name="photo"/><br>
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>
