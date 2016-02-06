<?php
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
session_start();

if(empty($_POST['selector'])){
?>
	<script>
	window.alert('Please return the books first!');
	window.location.href = 'student_borrow.php';
	</script>
<?php }
else
{
foreach ($_POST['selector'] as $t)
{

mysql_query("update book_title set stat_book='Borrow' where acc_num='$t'");
	
mysql_query("insert into faculty_borrow(id_number,acc_num,date_borrow,status)
			values('$_SESSION[id_borrow1]','$t',NOW(),'Pending')")or die(mysql_error());
?>
				<script>
				window.alert('Saved!');
				window.location.href = 'all_borrow.php';	
				</script>
<?php

					
}
}	
			
?>