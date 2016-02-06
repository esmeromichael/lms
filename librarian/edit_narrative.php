	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit Student Basic Information</strong></div>
	<form class="form-horizontal" method="post">
	
			<div class="control-group">
				<label class="control-label" for="inputEmail">First Name :</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
				<input type="text" id="inputEmail" name="fname" value="<?php echo $row['fname']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">MI :</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="mi" value="<?php echo $row['mi']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Last Name :</label>
				<div class="controls">	
				<input type="text" id="inputEmail" name="lname" value="<?php echo $row['lname']; ?>" required>
				</div>
			</div>			
			
			<div class="control-group">
			
			<label class="control-label" for="cat">Category :</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
					<select name="course" id='cat'>
												
					<?php
					$cat_query = mysql_query("select * from course");
					while($cat_row = mysql_fetch_array($cat_query)){
					if($cat_row['course_id']==$_POST['crs_id'])
					{
					?>
						<option value="<?php echo $cat_row['course_id']; ?>" selected='selected'><?php echo $cat_row['course_name']; ?></option>
					<?php
					}
					?>
						<option value="<?php echo $cat_row['course_id']; ?>"><?php echo $cat_row['course_name']; ?></option>
					<?php  } ?>
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