<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
$fname=$_POST['fname'];
$mi=$_POST['mi'];
$lname=$_POST['lname'];
$crs_id=$_POST['crs_id'];
$sy=$_POST['sy'];

mysql_query("update narrative set fname='$fname',mi='$mi',lname='$lname', course='$crs_id' where narrative_acc_num='$id'")or die(mysql_error());
mysql_query("update narrative_info set sy='$sy' where narrative_acc_num='$id'")or die(mysql_error());
							
header('location:narrative.php');
}
?>	