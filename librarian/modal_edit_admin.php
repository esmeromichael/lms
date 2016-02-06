	<div id="admin<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit....</strong></div>
			<form class="form-horizontal" method="post">
	
			<div class="control-group">
				<label class="control-label" for="inputEmail"><strong>Firstname : </strong></label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['user_id']; ?>" required>
				<input type="text" id="inputEmail" name="fname" value="<?php echo $row['firstname']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail"><strong>Lastname :</strong></label>
				<div class="controls">	
				<input type="text" id="inputEmail" name="lname" value="<?php echo $row['lastname']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail"><strong>Position :</strong></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="position" value="<?php echo $row['position']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail"><strong>Username :</strong></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="un" value="<?php echo $row['username']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail"><strong>Password :</strong></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="pw" value="<?php echo $row['password']; ?>" required>
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
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$position=$_POST['position'];
	$un=$_POST['un'];
	$pw=$_POST['pw'];
	mysql_query("update acc_admin set username='$un', password='$pw' , position = '$position' , firstname = '$fname', lastname='$lname'   where user_id='$id'")or die(mysql_error()); ?>
	<script>
	window.location="admin.php";
	</script>
	<?php
	}
	?>