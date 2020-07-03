<?php
session_start();
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="default/style.css">
        <title>Nouveau sms</title>
    </head>
    <body>
  
  <?php
    //recuper l'id de l'users
    $req ="SELECT * FROM users WHERE status = 1";
    $usereq = mysqli_query($con, $req) or die(mysqli_error($con));
    $affich = mysqli_fetch_array($usereq);
    
    if(isset($_POST['envoyer'])){
       if($_POST['titre']!='' && $_POST['message']!=''){
         $id = $_SESSION['id'];
         $dest = $_POST['destinataire'];
         $titr = $_POST['titre'];
         $msg = $_POST['message'];
         $status = '0';
         $reqet = "INSERT INTO msg (id_expediteur, id_destinataire, titre, message, status) VALUES ('$id', '$dest', '$titr', '$msg', '$status')";
         $reponse = mysqli_query($con,$reqet) or die (mysli_error($con));
         if($reponse){
          echo "<div class='sucess'>
                <h3>Votre message a bien été envoyé avec succès.</h3>
                </div>";
       }
        }
        else{
        
          echo "veuillez remplir tout les champs";
            }
       }
    
     ?>

    
	
	  
      
  
<form class="box" action="" method="post" enctype = "multipart/form-data">
<div class="content" text-align="center">
	<h1>Nouveau message</h1>
    <form action="sms_users.php" method="post">
		
        <label for="dest">Destinataire</label><input type="text"  id="dest" name="destinataire" placeholder="Destinataire" required/><br /><br />
        <label for="titr">Titre</label><input type="text" id="titr" name="titre" placeholder="Titre" required/><br /><br />
        <label for="msg">Message</label><textarea cols="40" rows="5" id="msg" name="message"></textarea><br /><br />
        <input type="submit" value="Envoyer" name="envoyer" />
	</form>

</div>
</form>
  



		<div class="foot"><a href="list_pm.php">Retour &agrave; mes messages</a>
	</body>
</html>
