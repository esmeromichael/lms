	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit Faculty Basic Information</strong></div>
	<form class="form-horizontal" method="post">
	
			<div class="control-group">
				<label class="control-label" for="inputEmail">ID Number</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
				<input type="text" id="inputEmail" name="id_number" value="<?php echo $row['id']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Firstname</label>
				<div class="controls">	
				<input type="text" id="inputEmail" name="fname" value="<?php echo $row['fname']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Lastname</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="lname" value="<?php echo $row['lname']; ?>" required>
				</div>
			</div>
					
			
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['edit'])){
	

	$id_number=$_POST['id_number'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	
	mysql_query("update faculty set id='$id_number', fname='$fname' , lname = '$lname'   where id='$id_number'")or die(mysql_error()); ?>
	<script>
	window.location="faculty.php";
	</script>
	<?php
	}
	?>