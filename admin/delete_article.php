<?php
$id = $_GET['delID'];

include('includes/connection.php');

$sql = "DELETE FROM articles WHERE id=$id";
if(mysqli_query($con,$sql))
{
	header('location:articles.php');
}
else
{
	die('Could not delete article:' .mysql_error());
}
?>
