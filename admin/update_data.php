<?php
if (isset($_POST['saves'])) {
$autoid = $_POST['id'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];

include('includes/connection.php');

$sql = "UPDATE tblusers SET Username='$Username', Password='$Password', Firstname='$Firstname', Lastname='$Lastname', Email='$Email' WHERE id='$autoid'";

mysqli_query($con,$sql) or die('Unable to update record: ' .mysqli_error($con));

	header('location:users.php');




}
?>
