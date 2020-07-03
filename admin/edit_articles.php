<?php
$userID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM articles where id = '$userID'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
?>



<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread1_four();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Update Article's Data</h2>
						<div class="box-icon">
							<a href="articles.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_articles.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">nom:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="nom" id="focusedInput" type="text" placeholder="name"
								  value="<?php echo $row['nom']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Description:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Description" id="focusedInput" type="text" placeholder="description"
								  value="<?php echo $row['Description']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">photo:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="photo" id="focusedInput" type="text" placeholder="photo"
								  value="<?php echo $row['photo']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">prix:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="prix" id="focusedInput" type="text" placeholder="prix"
								  value="<?php echo $row['prix']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">statut:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="statut" id="focusedInput" type="text" placeholder="statut"
								  value="<?php echo $row['statut']; ?>">
								</div>
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							  </div>

							  <div class="form-actions">
								<input type="submit"  class="btn btn-primary" value="Save Changes" name="save">

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
