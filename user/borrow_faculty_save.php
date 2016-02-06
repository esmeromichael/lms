<?php
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
session_start();


foreach ($_POST['selector'] as $t)
{

mysql_query("update book_title set stat_book='Borrow' where acc_num='$t'");
	
mysql_query("insert into faculty_borrow(id_number,acc_num,date_borrow,status)
			values('$_SESSION[id_borrow]','$t',NOW(),'Pending')")or die(mysql_error());
			session_destroy();
					
}
		
			
header("location:index.php");		
?>