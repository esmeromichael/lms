	<div id="myModal1<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>CHANGE PASSWORD</strong></div>
	<form class="form-horizontal" method="post">
			
			
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Password</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $id; ?>" required>
				<input type="text" id="inputEmail" name="password" value="<?php echo $row['password']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">New Password</label>
				<div class="controls">
				<input type="password" name="newpassword" id="id" placeholder="New_Password" required>
				<?php if (isset($_POST['edit'])){?> 	<span class="label label-important"><?php echo $a; ?> </span><?php }?>
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Change Password</button>
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
	$password=$_POST['password'];
	$newpassword=$_POST['newpassword'];

	
	mysql_query("update accounts set  password='$newpassword' where id_number='$id'")or die(mysql_error()); 
	?>
	<script>
	window.location="s_acc.php";
	</script>
	<?php
	}
	
	?>