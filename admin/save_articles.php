<?php
$nom = $_POST['nom'];
$Description = $_POST['Description'];
$photo = $_FILES['photo']['name'];
$fichierTemporaire = $_FILES['photo']['tmp_name'];
move_uploaded_file($fichierTemporaire,'./image/'.$photo);
$prix = $_POST['prix'];
$statut = $_POST['statut'];

include('includes/connection.php');

$sql = "INSERT INTO articles VALUES(NULL,'$nom','$Description','$photo','$prix','$statut')";

if (mysqli_query($con,$sql))
{
	header('location:articles.php');
}
else
{
	die('Unable to insert data:' .mysqli_error());
}

?>