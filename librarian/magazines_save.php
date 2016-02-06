<?php 
include('dbcon.php');
if (isset($_POST['submit'])){

$copy=$_POST['copy'];
$book_pub=$_POST['book_pub'];
$magazine_name=$_POST['magazine_name'];
$date_issue=$_POST['date_issue'];

$getrow=0;
$result=mysql_query("select*from magazines_copy");
$getrow=mysql_num_rows($result);
$newgetrow=$getrow+1;


$getrow2=0;
$result4=mysql_query("select*from magazines");
$getrow2=mysql_num_rows($result4);



$c=0;
$access_id=0;
$result2=mysql_query("select*from magazines_info where pub_name='$book_pub' and date_issue='$date_issue'");
while($row=mysql_fetch_array($result2))
{
		
	$access_id=$row['access_id'];
	$result2x=mysql_query("select*from magazines where title='$magazine_name' and  access_id='$access_id'");
	while($rowx=mysql_fetch_array($result2x))
	{
		
		$c++;
		$acc_id=$row['access_id'];
		
	}
	$result2x1=mysql_query("select*from magazines_copy where access_id='$acc_id'");
	while($rowx1=mysql_fetch_array($result2x1))
	{
		$copyx=$rowx1['copy'];
		$avail=$rowx1['available_no'];
	}
	
}


$getrow3=0;
$result5=mysql_query("select*from magazines where title='$magazine_name' and access_id='$access_id'");
$getrow3=mysql_num_rows($result5);



for($i=1;$i<=$copy;$i++)
{	
	
	$newgetrow2=$getrow2+$i;	
	if(($i==1)&&($c==0))
	{	
		$sql1 = "INSERT INTO magazines_copy (access_id,copy)
		VALUES ('$newgetrow','$copy')";
		$result = mysql_query( $sql1);
		
		$sql1 = "INSERT INTO magazines (access_id,magazine_id,title,date_added,status)
		VALUES ('$newgetrow','$newgetrow2','$magazine_name',NOW(),'Available')";
		$result = mysql_query( $sql1);
		
		$sql5 = "INSERT INTO magazines_info  (access_id,pub_name,date_issue)
		VALUES ('$newgetrow','$book_pub','$date_issue')";
		$result = mysql_query( $sql5);

	}
	else
	{
		if($c==0)
		{		
			$sql1 = "INSERT INTO magazines (access_id,magazine_id,title,date_added,status)
			VALUES ('$newgetrow','$newgetrow2','$magazine_name',NOW(),'Available')";
			$result = mysql_query( $sql1);
			
		}
		else
		{
			$sql1 = "INSERT INTO magazines (access_id,magazine_id,title,date_added,status)
			VALUES ('$acc_id','$newgetrow2','$magazine_name',NOW(),'Available')";
			$result = mysql_query( $sql1);			
		}	
	}
}

if($c>0)
{
	$copyx=$copyx+$copy;
	//$avail=$avail+$copy;
	mysql_query("update magazines_copy set copy='$copyx' where access_id='$acc_id'");
}
}
header('location:magazines.php');
?>
