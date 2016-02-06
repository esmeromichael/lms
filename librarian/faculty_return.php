<?php
			if(isset($_POST['submit']) && isset($_GET['id'])){
			include("dbcon.php");
			error_reporting(E_ALL^E_NOTICE);
			$id=$_GET['id'];
			
			$result=mysql_query("select*from borrow_info");
			$row1=mysql_fetch_array($result);
			$fac=$row['faculty_borrow_id'];
			
			foreach ($_POST['selector'] as $t)
			{

			mysql_query("update faculty_borrow set status='Returned' where acc_num='$t'");

			mysql_query("insert into faculty_return(faculty_borrow_id,id_number,acc_num,date_return)
			values('$fac','$id','$t',NOW())")or die(mysql_error());
			
			header('location: fac_brw_book.php');
			}		
			}
?>