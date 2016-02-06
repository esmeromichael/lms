	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit Student Basic Information</strong></div>
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
			<label class="control-label" for="inputPassword">Course:</label>
			<div class="controls">
			<select name="course_id">
				<?php $query = mysql_query("select * from course where course_id != '$course_id'")or die(mysql_error());
				while($row = mysql_fetch_array($query)){
				$course=$row['course_name'];
				?>
				<?php
				echo $course; 
				 } ?>
				<?php $query1 = mysql_query("select * from course where course_id != '$course_id'")or die(mysql_error());
				while($row1 = mysql_fetch_array($query1)){
				?>
				<option value="<?php echo $row1['course_id']; ?>"><?php echo $row1['course_name']; ?></option>
				<?php } ?>
			</select>
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
	$course_id=$_POST['course_id'];
	
	mysql_query("update student set id='$id_number', fname='$fname' , lname = '$lname' , crs_id = '$course_id'  where id='$id_number'")or die(mysql_error()); ?>
	<script>
	window.location="student.php";
	</script>
	<?php
	}
	?>