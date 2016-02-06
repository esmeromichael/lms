<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$type=$_POST['type'];
$IDNumber=$_POST['IDNumber'];
$Firstname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$Course=$_POST['Course'];
$Year=$_POST['Year'];
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$cpassword=$_POST['cpassword'];
/* $date_receive=$_POST['date_receive']; */
/* $date_added=$_POST['date_added']; */
/*$status=$_POST['status'];*/
	if($cpassword!=$Password){
		$a="Password do not Match";
		}else{
		$a = "";
		}

if($type=='Student')
{							
mysql_query("insert into students_acc (IDNumber,Firstname,Lastname,Course,Year,Username,Password)
 values('$IDNumber','$Firstname','$Lastname','$Course','$Year','$Username','$Password')")or die(mysql_error());
 }
 else if ($type=='Faculty')
 {
 mysql_query("insert into faculty_acc (IDNumber,Firstname,Lastname,Username,Password)
 values('$IDNumber','$Firstname','$Lastname','$Username','$Password')")or die(mysql_error());
 }
 
}
?>	