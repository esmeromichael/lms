<?php 
include('dbcon.php');
if (isset($_POST['submit'])){

$copy=$_POST['copy'];


$book_title=$_POST['book_title'];
$category_id=$_POST['category_id'];
$author_fname=$_POST['author_fname'];
$author_lname=$_POST['author_lname'];
$publisher_name=$_POST['publisher_name'];
$isbn=$_POST['isbn'];
$copyright_year=$_POST['copyright_year'];
/* $date_receive=$_POST['date_receive']; */
/* $date_added=$_POST['date_added']; */
$status=$_POST['status'];
$getrow=0;
$result=mysql_query("select*from book");
$getrow=mysql_num_rows($result);

$c=0;
$c2=0;
$result2=mysql_query("select*from book where category_id='$category_id'");
while($row=mysql_fetch_array($result2))
{
	$c++;
	if($row['stat_book']=="Available")
	{
			$c2++;
	}
}

$trapx=0;
$result3=mysql_query("select*from reserve_books where book_title='$book_title' and author='$author'");
while($row3=mysql_fetch_array($result3))
{
	$trapx++;
}
if($trapx==0)
{
	$c=$c+$copy;
	$c2=$c2+$copy;
	$c2--;
}
else
{
	$c=$c+$copy;
	$c2=$c2+$copy;
}

for($i=1;$i<=$copy;$i++)
{	
	$newgetrow=$getrow+$i;	
		if($i==1)
		{
			mysql_query("insert into book_reserve (acc_num,category_id,book_title,author_id,acq_id)
			values('$newgetrow','$category_id','$book_title','$author_id','$acquisition')")or die(mysql_error());	
		}
		else
		{			
			
			
			mysql_query("insert into books (acc_num,category_id,book_title,	author_id,acq_id,stat_book)
			values('$newgetrow','$category_id','$book_title','$author_id','$acquisition','Available')")or die(mysql_error());
		}
}

mysql_query("update book_category set Copy='$c',Available='$c2' where category_id='$category_id'");
header('location:books.php');
}
?>	