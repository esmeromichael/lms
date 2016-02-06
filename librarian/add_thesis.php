<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_member.php'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
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

		

	   if (empty($_POST["title"])) {
		 $titleErr = "Firstname is required";
	   }
		elseif(preg_match("#[0-9]+#",$_POST["title"])) {
			$titleErr = "Number is not allowed";
		}
	   else {
		 $title = test_input($_POST["title"]);
		 // check if name only contains letters and whitespace
		 if (!preg_match("/^[a-zA-Z ]*$/",$title) && !isset($titleErr)) {
		   $titleErr = "Only letters and white space allowed";
		 }
	   }
	   
		
		if (empty($_POST["author"])) {
		 $authorErr = "Lastname is required";
		}
		elseif(preg_match("#[0-9]+#",$_POST["author"])) {
			$authorErr = "Number is not allowed";
		}
		else {
		 $author = test_input($_POST["author"]);
		 // check if name only contains letters and whitespace
		 if (!preg_match("/^[a-zA-Z ]*$/",$author) && !isset($authorErr)) {
		   $authorErr = "Only letters and white space allowed";
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
	$title=$_POST['title'];
	$author=$_POST['author'];
	$crs_id=$_POST['crs_id'];
	$sy=$_POST['sy'];
	$copy=1;
	if(!isset($titleErr) && !isset($authorErr) && !isset($crsErr)) {
	
	$getrow=0;
	$result=mysql_query("select*from thesis");
	$getrow=mysql_num_rows($result);
	
	for($i=1;$i<=$copy;$i++)
	{		
	$newgetrow=$getrow+$i;	

	mysql_query("insert into thesis (thesis_acc_num,title,date_added)
	values('$newgetrow','$title',NOW())")or die(mysql_error());

	mysql_query("insert into thesis_info (thesis_acc_num,author,course,sy)
	values('$newgetrow','$author','$crs_id','$sy')")or die(mysql_error());
	}							
}
}

?>
		<div class="container">
			<div class="margin-top">
				<div class="row">	
					<div class="span12">	
						<div class="alert alert-info">Add Students</div>
						<p><a href="thesis.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
						<div class="addstudent">
							<div class="details">Please Enter Details Below</div>
							<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
								<div class="control-group">
									<label class="control-label" for="title">Title:</label>
									<div class="controls">										
										<input type="text"  class="span3" name="title" placeholder="Title " required>
										<span class="error">* <?php echo $titleErr;?></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="author">Student's Name:</label>
									<div class="controls">										
										<input type="text"  class="span3" name="author" placeholder="Student's Name"  required>
										<span class="error">* <?php echo $authorErr;?></span>
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
