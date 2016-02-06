<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>

<?php

$fnameErr = $lnameErr = "";
$firstname = $lastname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["firstname"])) {
     $fnameErr = "Name is required";
	} else {
     $firstname = test_input($_POST["firstname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
       $firstnameErr = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST["lastname"])) {
     $lnameErr = "Name is required";
	} else {
     $lastname = test_input($_POST["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $lastnameErr = "Only letters and white space allowed";
		}
	}
	
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	

	}
	?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		
             <div class="alert alert-info">Add Students</div>
			<p><a href="books.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
		<div class="addstudent">
		<div class="details">Please Enter Details Below</div>		
		<form class="form-horizontal" method="POST" action="student_save.php" enctype="multipart/form-data">
			
	
			
		<div class="control-group">
			<label class="control-label" for="idnumber">ID Number:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="IDNumber"  placeholder="ID Number" required>
			
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail">First Name:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="firstname"  placeholder="First Name" required>
			 <span class="error">* <?php echo $fnameErr;?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail">Last Name:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="lastname"  placeholder="Last Name" required>
			 <span class="error">* <?php echo $lnameErr;?></span>

			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputYear">Course: </label>
			<div class="controls">
			<select name="crs_id" required>
				<option> </option>
				<?php
		
					$cat_query = mysql_query("select * from course");
						while($cat_row = mysql_fetch_array($cat_query)){
					?>
		
					<option value="<?php echo $cat_row['course_id']; ?>"><?php echo $cat_row['course_name']; ?></option>
														<?php  } ?>
			</select>
			</div>
		
		</div>
	
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;ADD</button>
			</div>
		</div>
		

		
		

	
<?php include('footer.php') ?>