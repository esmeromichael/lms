<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php $id = $_GET['id']; ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		<?php 
	$query=mysql_query("select * from narrative
			LEFT JOIN narrative_info ON narrative.narrative_acc_num = narrative_info.narrative_acc_num
			LEFT JOIN course ON narrative.course=course.course_id where narrative.narrative_acc_num='$id'")or die(mysql_error());
			$row=mysql_fetch_array($query);
			
		?>
             <div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Edit </div>
			<p><a class="btn btn-info" href="narrative.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>	
	<form class="form-horizontal" method="POST" action="edit_narrative_save.php" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Firstname :</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="fname" value="<?php echo $row['fname']; ?>" placeholder="Firstname" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $id;  ?>" placeholder="Firstname" required>
			<span class="error">* <?php echo $fnameErr;?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">MI :</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="mi" value="<?php echo $row['mi']; ?>" placeholder="Middle Initial" required>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputPassword">Lastname :</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="lname" value="<?php echo $row['lname']; ?>" placeholder="Middle Initial" required>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputPassword">Course:</label>
			<div class="controls">
				<select name="crs_id" required>			
					<option><?php echo $row['course_name']; ?></option>
					<option> </option>
					<?php		
					$cat_query = mysql_query("select * from course");
					while($cat_row = mysql_fetch_array($cat_query)){
					?>
						<option value="<?php echo $cat_row['course_id']; ?>"><?php echo $cat_row['course_name']; ?></option>
							<span class="error">* <?php echo $crsErr;?></span>
					<?php  } ?>
				</select>
									
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputPassword">School Year :</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="sy" value="<?php echo $row['sy']; ?>" placeholder="School  Year" required>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
			</div>
		</div>
		
		
    </form>				
			</div>		
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>