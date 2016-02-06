<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$IDNumber=$_POST['id'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];


/* $date_receive=$_POST['date_receive']; */
/* $date_added=$_POST['date_added']; */
/*$status=$_POST['status'];*/




								
mysql_query("insert into faculty (id,fname,lname)
 values('$IDNumber','$firstname','$lastname')")or die(mysql_error());
 
 
header('location:facultylist.php');
}
?>	