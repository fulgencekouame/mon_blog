<?php
if (isset($_POST['save'])) {
	$autoid = $_POST['id'];
	$nom = $_POST['nom'];
	$Description = $_POST['Description'];
	$photo = $_POST['photo'];
	$prix = $_POST['prix'];
	$statut = $_POST['statut'];

	include('includes/connection.php');

	$sql = "UPDATE articles SET nom='$nom', Description='$Description', photo='$photo', prix='$prix', statut='$statut' WHERE id='$autoid'";

	mysqli_query($con, $sql) or die('Unable to update record: ' .mysqli_error($con));

		header('location:articles.php');
}

?>
