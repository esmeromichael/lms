<?php 
include('dbcon.php');

$id=$_GET['id'];
$acc_num = $_GET['acc_num'];

mysql_query("update faculty_borrow  set status='Returned' where acc_num='$acc_num'")or die(mysql_error());						
mysql_query("update book_title  set stat_book='Available' where acc_num='$acc_num'")or die(mysql_error());						

header("location:borrowed_books.php?id=$id");

?>	