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
	$query=mysql_query("select * from thesis
			LEFT JOIN thesis_info ON thesis.thesis_acc_num = thesis_info.thesis_acc_num
			LEFT JOIN course ON thesis_info.course=course.course_id where thesis.thesis_acc_num='$id'")or die(mysql_error());
			$row=mysql_fetch_array($query);
			
		?>
             <div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Edit </div>
			<p><a class="btn btn-info" href="thesis.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>	
	<form class="form-horizontal" method="POST" action="edit_thesis_save.php" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Title :</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="title" value="<?php echo $row['title']; ?>" placeholder="Title" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $id;  ?>" placeholder="Firstname" required>
			<span class="error">* <?php echo $titleErr;?></span>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Student's Name :</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="student_name" value="<?php echo $row['student_name']; ?>" placeholder="Firstname" required>
			<span class="error">* <?php echo $fnameErr;?></span>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputPassword">Course:</label>
			<div class="controls">
				<select name="crs_id" required>			
					<!--<option><?php //echo $row['course_name']; ?></option> -->
					<option value='<?php echo $row['course_name']?>'><?php echo $row['course_name']?></option>
					<option value='<?php echo $row['course_name']?>'>------</option>
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