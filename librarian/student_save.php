
<?php
include('dbcon.php');



if (isset($_POST['submit'])){

	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$crs_id=$_POST['crs_id'];
	
	$idErr = $fnameErr = $lnameErr = $crsErr = "";
	if (empty($_POST["id"])) {
     $nameErr = "Student ID is required";
   } 

   if (empty($_POST["fname"])) {
     $fnameErr = "Firstname is required";
   } else {
     $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
       $fnameErr = "Only letters and white space allowed";
     }
   }
	
	if (empty($_POST["lname"])) {
     $lnameErr = "L is required";
   } else {
     $lname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only letters and white space allowed";
     }
   }
   
   if (empty($_POST["crs_id"])) {
     $crsErr = "Course is required";
   } else {
     $crs_id = test_input($_POST["crs_id"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$crs_id)) {
       $crsErr = "Only letters and white space allowed";
     }
   }
    
   

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
								
	

								
	mysql_query("insert into student(id,fname,lname,crs_id) 
		values('$id','$fname','$lname','$crs_id')")or die(mysql_error());

								
								
	}
	}
								
?>
