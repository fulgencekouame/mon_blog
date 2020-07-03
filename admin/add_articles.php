<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread1_three();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Article (Testing Function Only)</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="save_articles.php" enctype="multipart/form-data">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">name:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="nom" id="focusedInput" type="text" placeholder="name">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Desciption:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="Description" id="focusedInput" type="text" placeholder="description">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">photo:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="photo" id="focusedInput" type="file" placeholder="photo">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">prix:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="prix" id="focusedInput" type="text" placeholder="prix">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">statut:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="statut" id="focusedInput" type="text" placeholder="statut">
								</div>
							  </div>

							  <!-- <div class="control-group">
								<label class="control-label" for="focusedInput">Lastname:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtlastname" id="focusedInput" type="text" placeholder="Lastname">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Email:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtemail" id="focusedInput" type="text" placeholder="Email">
								</div>
							  </div> -->
							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary">Add New Article</button>
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