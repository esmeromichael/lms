<?php 
include('dbcon.php');
if (isset($_POST['submit'])){




$classname=$_POST['classname'];

								
mysql_query("insert into book_category (classname,Copy,Available)
 values('$classname','0','0')")or die(mysql_error());


 
header('location:add_books.php');
}
?>	