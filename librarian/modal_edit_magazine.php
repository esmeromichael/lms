	<div id="edit<?php echo $access_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit............</strong></div>
	<form class="form-horizontal" method="post">
	
			<div class="control-group">
				<label class="control-label" for="inputEmail">Date Issue : </label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['access_id']; ?>" required>
				<input type="text" id="inputEmail" name="id_number" value="<?php echo $row['id']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Name : </label>
				<div class="controls">	
				<input type="text" id="inputEmail" name="title" value="<?php echo $row['title']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Publication : </label>
				<div class="controls">
				<input type="text" id="inputEmail" name="pub" value="<?php echo $row['pub_name']; ?>" required>
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
	$title=$_POST['title'];
	$pub=$_POST['pub'];

	
		$query=mysql_query("select * from thesis
		LEFT JOIN thesis_info ON thesis.thesis_acc_num = thesis_info.thesis_acc_num
		LEFT JOIN course ON thesis_info.course=course.course_id where thesis.thesis_acc_num='$id'")or die(mysql_error());
		$row=mysql_fetch_array($query);
		?>
		
		<script>
		window.location="faculty.php";
		</script>
	<?php
	}
	?>