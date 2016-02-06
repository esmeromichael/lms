<?php 
include('dbcon.php');
if (isset($_POST['submit'])){




$fine=$_POST['fine'];

								
mysql_query("update fines set student_fines ='$fine'");
 


 
header('location:settings.php');
}
?>	