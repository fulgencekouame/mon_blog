 <?php
$userID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM tblusers where id = '$userID'";
	$result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);


?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_four();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Update User's Data</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_data.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Username:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Username" id="focusedInput" type="text" placeholder=""
								  value="<?php echo $row['Username']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Password:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Password" id="focusedInput" type="password" placeholder=""
								  value="<?php echo $row['Password']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Firstname:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Firstname" id="focusedInput" type="text" placeholder=""
								  value="<?php echo $row['Firstname']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Lastname:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Lastname" id="focusedInput" type="text" placeholder=""
								  value="<?php echo $row['Lastname']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Email:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Email" id="focusedInput" type="text" placeholder=""
								  value="<?php echo $row['Email']; ?>">
								</div>
                <input type="hidd" name="id" value="<?php echo $row['id']; ?>">
							  </div>

                <div class="form-actions">
								<input type="submit"  class="btn btn-primary" value="Save Changes" name="saves">

							  </div>
							</fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
<?php
	get_footer();
?>


<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->
