<?php
include('dbcon.php');
$id=$_GET['id'];
mysql_query("delete from student where id='$id'") or die(mysql_error());
mysql_query("delete from id_user where id='$id'") or die(mysql_error());
mysql_query("delete from accounts where id_number='$id'") or die(mysql_error());
header('location:student.php');
?>