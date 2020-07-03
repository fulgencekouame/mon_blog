<?php 
session_start();
include "../config.php";
//requete pour afficher les users dans le menu deroulant des destinataires
$dest = "SELECT * FROM users WHERE status <>'1'";
$destquery = mysqli_query($con, $dest) or die(mysqli_error($con));

//Affichage des infos de l'administrateur
$admin = "SELECT * FROM users WHERE status ='1'";
$adminquery = mysqli_query($con, $admin) or die(mysqli_error($con));
$adminrow = mysqli_fetch_array($adminquery);
$id = $adminrow['id'];

//Envoie de message
if (isset($_POST['envoyer'])) {
    $expediteur = $adminrow['id'];
    $destinataire = $_POST['destinataire'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");
    $etat = "non lu";
    
    $sms = "INSERT INTO msg (id_expediteur, id_destinataire, date, titre, message, etat) VALUES ('$expediteur', '$destinataire', '$date', '$titre', '$message', '$etat')";
    $smsquery = mysqli_query($con, $sms) or die(mysqli_error($con));
}

//requete pour afficher les messages non lus de l'admin
$message = "SELECT * FROM msg WHERE etat ='non lu' AND id_destinataire = '$id'";
$messagequery = mysqli_query($con, $message) or die(mysqli_error($con));
$messagerow = mysqli_fetch_array($messagequery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="default/style.css">
    <title>Send_admin</title>
</head>
<body>

<div class="container">
    <div class="row">
		<form action="" method="post" class="col-md-12 go-right"> 

       <form class="box" action="" method="post" enctype = "multipart/form-data"> 
          <div class="content" text-align="center">
            <h1>Nouveau message</h1>
             <select name="destinataire" class="form-control">
                <option value="" selected disabled>Destinataire</option>
                <?php while ($destinataire = mysqli_fetch_array($destquery)) {?>
                <option value="<?php echo ($destinataire['id']); ?>"><?php echo ($destinataire['username']); ?></option>
                <?php } ?>
             </select>
			<!-- </div> -->
		   <div class="form-group">
            <label for="titre">Titre</label>
			<input id="titre" name="titre" type="text" class="form-control" required>
			
		    </div>
		    <div class="form-group">
            <label for="message">Message</label>
			<textarea id="message" name="message" class="form-control" required></textarea>
		    </div>
            <input type="submit" value="ENVOYER" class="btn btn-success" name="envoyer">
        </div>
	 </form>
     </form>
    </form>
    </div>
</div>

	<br><br>
   
    <!-- Affichage des message non lus reçus par l'administrateur -->
    <h1>Messages non-lus</h1>
    <form class="box" action="" method="post" enctype = "multipart/form-data"> 
        <table class="table table-striped">
            <tr>
                <thead class="thead-light">
                    <th>Expediteur</th>
                    <th>date</th>
                    <th>Titre</th>
                    <th>Action</th>
                </thead>
            </tr>
            <?php while ($mesadmin = mysqli_fetch_array($messagequery)) {
                $idexp = $mesadmin['id_expediteur'];
                $nomexp = "SELECT * FROM users WHERE id = '$idexp'";
                $nomquery = mysqli_query($con, $nomexp);
                $nomrow = mysqli_fetch_array($nomquery);
                $nom = $nomrow['username'];
                ?>
            <tr>
                <tbody>
                    <td> <?php echo($nom); ?></td>
                    <td><?php echo($mesadmin['date']); ?></td>
                    <td><?php echo($mesadmin['titre']); ?></td>
                    <td><a href="read_messages.php?id=<?php echo($mesadmin['id']); ?>">Lire</a></td>
                </tbody>
            </tr>
            <?php } ?>
        </table>
        </form>
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>