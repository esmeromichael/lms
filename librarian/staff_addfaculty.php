<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('staff_navbar_member.php'); ?>
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

		if (empty($_POST["id"])) {
		 $idErr = "Faculty ID is required";
		} 

	   if (empty($_POST["fname"])) {
		 $fnameErr = "Firstname is required";
	   }
		elseif(preg_match("#[0-9]+#",$_POST["fname"])) {
			$fnameErr = "Number is not allowed";
		}
	   else {
		 $fname = test_input($_POST["fname"]);
		 // check if name only contains letters and whitespace
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
	   
	  

	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	
	if(!isset($idErr) && !isset($fnameErr) && !isset($lnameErr)) 
	{	
		$query=mysql_query("select * from id_user where id='$id'")or die(mysql_error());
			$count=mysql_num_rows($query);

			if ($count  > 0)
				{
					$idErr ='ID Number Already Exist';
				}
															
			else
				{
					mysql_query("insert into faculty(id,fname,lname,d) 
					values('$id','$fname','$lname',NOW())")or die(mysql_error());
					
					$sql1 = "INSERT INTO id_user (id,user_type)
					VALUES ('$id','faculty')";
					$result = mysql_query( $sql1);
				}
	}							
}
?>

		<div class="container">
			<div class="margin-top">
				<div class="row">	
					<div class="span12">	

						<div class="alert alert-info">Add Faculty</div>
						<p><a href="staff_faculty.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
						<div class="addstudent">
							<div class="details">Please Enter Details Below</div>
							<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
								<div class="control-group">
									<label class="control-label" for="idnumber">Faculty ID: </label>
									<div class="controls">										
										<input type="text"  class="span4" name="id" placeholder="ID Number " required>
										<span class="error">* <?php echo $idErr;?></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="fname">Firstname:</label>
									<div class="controls">										
										<input type="text"  class="span4" name="fname" placeholder="First Name"  required>
										<span class="error">* <?php echo $fnameErr;?></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="idnumber">Lastname:</label>
									<div class="controls">										
										<input type="text"  class="span4" name="lname" placeholder="Last Name" required>
										<span class="error">* <?php echo $lnameErr;?></span>
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
