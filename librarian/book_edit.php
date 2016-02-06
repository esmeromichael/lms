<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); 
$acq=$_GET['acquisition_id'];?>
</br>
</br>
<div class="addstudent">
		<div class="details">Please Enter Details Below</div>		
		<form class="form-horizontal" method="POST" enctype="multipart/form-data">			

			<div class="control-group">
				<label class="control-label" for="inputEmail">Book Title</label>
				<div class="controls">
				<!--<input type="hidden" id="inputEmail" name="id" value="<?php //echo $row['id']; ?>" required> -->
				<input type="text" id="inputEmail" name="id_number" value="<?php echo $row['book_title']; ?>" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="cat">Category</label>
				<div class="controls">
				<select name="category_id" id='cat' class="span4" >
												
					<?php
					$cat_query = mysql_query("select * from book_category");
						while($cat_row = mysql_fetch_array($cat_query)){
						if($cat_row['category_id']==$_POST['cat'])
						{
						?>
						<option value="<?php echo $cat_row['category_id']; ?>" selected='selected'><?php echo $cat_row['classname']; ?></option>
						<?php
						}
						?>
						<option value="<?php echo $cat_row['category_id']; ?>"><?php echo $cat_row['classname']; ?></option>
						<?php  } ?>
				</select>
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
</div>


