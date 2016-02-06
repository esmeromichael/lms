<?php 
include('dbcon.php');
if (isset($_POST['submit'])){

$course_name=$row['course_name'];



								
mysql_query("insert into course (course_name)
 values('$course_name')")or die(mysql_error());
 
 
header('location:settings.php');
}
?>	