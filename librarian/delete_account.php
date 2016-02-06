<?php
include('dbcon.php');

$id=$_GET['id'];

mysql_query("delete from accounts where id_number='$id'") or die(mysql_error());

header('location:f_acc.php');
?>