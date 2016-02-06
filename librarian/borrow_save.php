<?php
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
session_start();


$result=mysql_query("select*from return_time");
$result1=mysql_query("select*from borrow_time");
$gettime=mysql_fetch_array($result);

$Today = date('y:m:d');
$new = date('l, F d, Y', strtotime($Today));

$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
$ex=date("Y-m-d", $tomorrow);

foreach ($_POST['selector'] as $t)
{

mysql_query("update book_title set stat_book='Borrow' where acc_num='$t'");

mysql_query("insert into borrow_info(id_number,acc_num,date_borrow,time_borrow,due_time,due_date,borrow_stat)
			values('$_SESSION[id_borrow]','$t',NOW(),NOW(),'$gettime[return_due]','$ex','Pending')")or die(mysql_error());
			session_destroy();
	$msg='Borrow successfully';		
}
		
			
header("location:student_borrow.php");		
?>