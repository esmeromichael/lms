<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
.message {color: #0C3486;}
</style>
</head>
<body>
<?php
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	if (isset($_POST['submit'])&& $_SERVER["REQUEST_METHOD"] == "POST") {
		include('dbcon.php');
		session_start();		
		
		if (empty($_POST["fname"])) {
		 $fnameErr = "Firstname is required";
		}
		elseif(preg_match("#[0-9]+#",$_POST["fname"])) {
			$fnameErr = "Number is not allowed";
		}
		else {
		 $fname = test_input($_POST["fname"]);
		 if (!preg_match("/^[a-zA-Z ]*$/",$fname) && !isset($fnameErr)) {
		   $fnameErr = "Only letters and white space allowed";
		 }
	    }
		
		if (empty($_POST["lname"])) {
		 $lnameErr = "Lastname is required";
		}
		elseif(preg_match("#[0-9]+#",$_POST["lname"])) {
			$lnameErr = "Number is not allowed";
		}
		else {
		 $lname = test_input($_POST["lname"]);
		 // check if name only contains letters and whitespace
		 if (!preg_match("/^[a-zA-Z ]*$/",$lname) && !isset($lnameErr)) {
		   $lnameErr = "Only letters and white space allowed";
		 }
	    }
		
	   if (empty($_POST["crs_id"])) {
		 $crsErr = "Course is required";
	   } else {
		 $crs_id = test_input($_POST["crs_id"]);
		 // check if name only contains letters and whitespace
		 if (!preg_match("#[0-9]+#",$crs_id)) {
		   $crsErr = "Only letters and white space allowed";
		 }
	   }
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mi=$_POST['mi'];
	$crs_id=$_POST['crs_id'];
	$sy=$_POST['sy'];
	
	if(!isset($fnameErr) && !isset($crsErr) && !isset($lnameErr)) {				
	$query1=mysql_query("select * from narrative where lname='".$_POST['lname']."' and mi='".$_POST['mi']."' and fname='".$_POST['fname']."' and course='".$_POST['crs_id']."' ")or die(mysql_error());
	$count=mysql_num_rows($query1);
	if ($count>0)
	{
	$message="Content Exist!! can't Save!!";	
	}	
	
	else{
	$copy=1;
	$getrow=0;
	$result=mysql_query("select*from narrative");
	$getrow=mysql_num_rows($result);
	for($i=1;$i<=$copy;$i++)
	{		
	$newgetrow=$getrow+$i;	
	mysql_query("insert into narrative (narrative_acc_num,fname,mi,lname,course)
	values('$newgetrow','$fname','$mi','$lname','$crs_id')")or die(mysql_error());

	mysql_query("insert into narrative_info (narrative_acc_num,date_added,sy)
	values('$newgetrow',NOW(),'$sy')")or die(mysql_error());
	
	$message="Data Saved!!";
	}							
	}
	}
}
?>
		<div class="container">
			<div class="margin-top">
				<div class="row">	
					<div class="span12">	
						<div class="alert alert-info">Add Students</div>
						<p><a href="narrative.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
						<div class="addstudent">
							<div class="details">Please Enter Details Below</div>
							
							<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
								<div class="control-group">
									<label class="control-label" for="author">First Name:</label>
									<div class="controls">										
										<input type="text"  class="span3" name="fname" placeholder="First Name"  required>
										<span class="error">* <?php echo $fnameErr;?></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="author">MI:</label>
									<div class="controls">										
										<input type="text"  class="span3" name="mi" placeholder="Middle Initial"  required>
										<span class="error">* <?php echo $miErr;?></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="author">Last Name:</label>
									<div class="controls">										
										<input type="text"  class="span3" name="lname" placeholder="Last Name"  required>
										<span class="error">* <?php echo $lnameErr;?></span>
									</div>
								</div>	
								
								<div class="control-group">
									<label class="control-label" for="inputYear">Course: </label>
									<div class="controls">
										<select name="crs_id" class="span3" required>
											<option> </option>
											<?php
		
											$cat_query = mysql_query("select * from course");
											while($cat_row = mysql_fetch_array($cat_query)){
											?>
											<option value="<?php echo $cat_row['course_id']; ?>"><?php echo $cat_row['course_name']; ?></option>
														<?php  } ?>
											<span class="error">* <?php echo $crsErr;?></span>
										</select>
									</div>		
								</div>								
								<div class="control-group">
									<label class="control-label" for="fname">School Year:</label>
									<div class="controls">										
										<input type="text"  class="span3" name="sy" placeholder="School Year"  required>
										<span class="error">* <?php echo $syErr;?></span>
									</div>
								</div>

								<div class="control-group">
									<center><strong>
										<span class="message">* <?php echo $message;?></span>
									</center></strong>
								</div>
								
								<div class="control-group">									
									<div class="controls">	
										<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;ADD</button>									
									</div>
								</div>
							
								</form>
							</div>
						</div>
					</div>
				</div>							
</body>
</html>
