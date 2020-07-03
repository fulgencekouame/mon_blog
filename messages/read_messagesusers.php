<?php
session_start(); 
$id = $_GET['id'];
include "../config.php";
//affichage du message
$read = "SELECT * FROM msg WHERE id ='$id'";
$readquery = mysqli_query($con, $read) or die(mysqli_error($con));
$readmessage = mysqli_fetch_array($readquery);
$idexp = $readmessage['id_expediteur'];

//affichage du destinataire dont le message est lu
$dest = "SELECT * FROM users WHERE id = '$idexp'";
$destquery = mysqli_query($con, $dest) or die(mysqli_error($con));
$destrow = mysqli_fetch_array($destquery);

//Affichage des infos de l'user
$user = "SELECT * FROM users WHERE status ='0'";
$userquery = mysqli_query($con, $user) or die(mysqli_error($con));
$userow = mysqli_fetch_array($userquery);
$id = $userow['id'];

//Envoie de message
if (isset($_POST['envoyer'])) {
    $expediteur = $userow['id'];
    $destinataire = $_POST['destinataire'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");
    $etat = "non lu";
    
    $sms = "INSERT INTO msg (id_expediteur, id_destinataire, date, titre, message, etat) VALUES ('$expediteur', '$destinataire', '$date', '$titre', '$message', '$etat')";
    $smsquery = mysqli_query($con, $sms) or (mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="default/style.css">
    <title>Read</title>
</head>
<body>  

<div class="container">
    <div class="row">
        <center>
            <h4>MESSAGE DE <?php echo ($destrow['username']); ?></h4><br><br>
            <?php echo ($readmessage['message']); ?>
        </center>
    </div>

    <div class="row"> 
       
		<form class="box" action="" method="post" enctype = "multipart/form-data">
          <div class="content" text-align="center">
			<h2>Repondre</h2>
            <!-- <p>To see how it works, you clink in a input field.</p> -->
			<div class="form-group">
            <label for="name">Destinataire</label>
            <input type="text" name="destinataire" id="" class="form-control" readonly value ="<?php echo ($destrow['username']); ?>">
		</div>
		<div class="form-group">
            <label for="titre">Titre</label>
			<input id="titre" name="titre" type="text" class="form-control" required>
			
		</div>
		<div class="form-group">
            <label for="message">Message</label>
			<textarea id="message" name="message" class="form-control" required></textarea>
		</div>
        <input type="submit" value="ENVOYER" class="btn btn-success" name="envoyer">
		</form>
	</div>
    
    <div class="foot"><a href="send.php">Mes messages non-lus</a>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>

<?php

//Mise a jour du message (passage de non lu à lu)
$update = "UPDATE msg SET etat ='lu' WHERE id = '$id'";
$updatequery = mysqli_query($con, $update) or die(mysqli_error($con));
?>