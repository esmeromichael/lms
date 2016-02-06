<?php
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
session_start();
$id=$_GET['id'];
$acc_num = $_GET['acc_num'];

$result1=mysql_query("SELECT * FROM `faculty_borrow` WHERE id_number='$id'"); 
$row1=mysql_fetch_array($result1);


foreach ($_POST['selector'] as $t)
{

mysql_query("update faculty_borrow set status='Returnes' where acc_num='$t'");

mysql_query("insert into faculty_return(faculty_borrow_id,id_num,acc_num,date_return)
			values('$row1[faculty_borrow_id]','$id','$t',NOW())")or die(mysql_error());
			session_destroy();
}
	
			
header("location:fac_brw_book.php");		
?>