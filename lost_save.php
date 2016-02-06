<?php 
include('dbcon.php');
if (isset($_POST['submit']))
{
$acc_num=$_POST['acc_num'];


	$user_query=mysql_query("select * from book_title where acc_num='$acc_num'")or die(mysql_error());
							
							while($row=mysql_fetch_array($user_query))
							{				
							$stat=$row['stat_book'];
							
							 mysql_query("UPDATE book_title SET stat_book='Lost' WHERE acc_num='$acc_num'");
							 

							}
}
?>