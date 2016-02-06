<?php 
include('dbcon.php');
if (isset($_POST['submit'])){

$copy=$_POST['copy'];


$book_title=$_POST['book_title'];
$category_id=$_POST['category_id'];
$author_name=strtolower($_POST['author_name']);
$publisher_name=strtolower($_POST['publisher_name']);
$isbn=$_POST['isbn'];
$copyright_year=$_POST['copyright_year'];
$acquisition=$_POST['acquisition'];
$cn=$_POST['call'];

$getrow=0;
$result=mysql_query("select*from book_copy");
$getrow=mysql_num_rows($result);
$newgetrow=$getrow+1;


$getrow2=0;
$result4=mysql_query("select*from book_title");
$getrow2=mysql_num_rows($result4);



$c=0;
$access_id=0;
$result2=mysql_query("select*from book_info where category_id='$category_id' and Author='$author_name' and publisher_name='$publisher_name'  and copyright_date='$copyright_year' and isbn='$isbn'");
while($row=mysql_fetch_array($result2))
{
		
	$access_id=$row['access_id'];
	$result2x=mysql_query("select*from book_title where book_title='$book_title' and  access_id='$access_id'  and call_num='$cn'");
	while($rowx=mysql_fetch_array($result2x))
	{
		
		$c++;
		$acc_id=$row['access_id'];
		
	}
	$result2x1=mysql_query("select*from book_copy where access_id='$acc_id'");
	while($rowx1=mysql_fetch_array($result2x1))
	{
		$copyx=$rowx1['copy'];
		$avail=$rowx1['available_no'];
	}
	
}


$getrow3=0;
$result5=mysql_query("select*from book_title where book_title='$book_title' and access_id='$access_id'");
$getrow3=mysql_num_rows($result5);



for($i=1;$i<=$copy;$i++)
{	
	
	$newgetrow2=$getrow2+$i;
//kung gecheck  ang checkbox
if($_POST['borrow']==1)
{
	
	if(($i==1)&&($c==0))
	{
		
		$copysub=$copy-1;
		// insertion to book_copy table
		$sql1 = "INSERT INTO book_copy (access_id,copy,available_no)
		VALUES ('$newgetrow','$copy','$copysub')";
		$result = mysql_query( $sql1);
		
		// insertion to book_title table
		$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
		VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Reserve','$acquisition',now())";
		$result = mysql_query( $sql1);
		
		// insertion to book_info table
		$sql5 = "INSERT INTO book_info  (access_id,category_id,Author,publisher_name,isbn,copyright_date)
		VALUES ('$newgetrow','$category_id','$author_name','$publisher_name','$isbn','$copyright_year')";
		$result = mysql_query( $sql5);

	}
	else
	{
		if($c==0)
		{		
			// insertion to book_title table in defferent access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Available','$acquisition',now())";
			$result = mysql_query( $sql1);
			
		}
		else
		{
			// insertion to book_title table in same access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$acc_id','$newgetrow2','$cn','$book_title','Available','$acquisition',now())";
			$result = mysql_query( $sql1);
			
			
			
		}	
	}
}
else    	//kung ge uncheck  ang checkbox
{
	
	if(($i==1)&&($c==0))
	{
		
		$copysub=$copy-1;
		// insertion to book_copy table
		$sql1 = "INSERT INTO book_copy (access_id,copy,available_no)
		VALUES ('$newgetrow','$copy','N/A')";
		$result = mysql_query( $sql1);
		
		// insertion to book_title table
		$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
		VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Reserve','$acquisition',now())";
		$result = mysql_query( $sql1);
		
		// insertion to book_info table
		$sql5 = "INSERT INTO book_info  (access_id,category_id,Author,publisher_name,isbn,copyright_date)
		VALUES ('$newgetrow','$category_id','$author_name','$publisher_name','$isbn','$copyright_year')";
		$result = mysql_query( $sql5);

	}
	else
	{
		if($c==0)
		{		
			// insertion to book_title table in defferent access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Not Available','$acquisition',now())";
			$result = mysql_query( $sql1);
		}
		else
		{
			// insertion to book_title table in same access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$acc_id','$newgetrow2','$cn','$book_title','Not Available','$acquisition',now())";
			$result = mysql_query( $sql1);
			
		}
		
		
	}
}




}
//update book_copy tbl

if($c>0)
{
	$copyx=$copyx+$copy;
	$avail=$avail+$copy;
	mysql_query("update book_copy set copy='$copyx', available_no='$avail' where access_id='$acc_id'");
}

header('location:books.php');
}
?>	