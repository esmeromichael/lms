<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_GET['id'];
$title=$_POST['title'];
$student_name=$_POST['student_name'];
$crs_id=$_POST['course'];
$sy=$_POST['sy'];

mysql_query("update thesis set title='$title' where thesis_acc_num='$id'")or die(mysql_error());
mysql_query("update thesis_info set student_name='$student_name', course='$crs_id', sy='$sy' where thesis_acc_num='$id'")or die(mysql_error());
							
header('location:thesis.php');
}
?>	