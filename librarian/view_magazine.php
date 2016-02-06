<?php
error_reporting(E_ALL^E_NOTICE);
include("dbcon.php");
$c=0;
$result=mysql_query("select*from magazines a,magazines_info b where a.access_id='$_POST[id]' and b.access_id='$_POST[id]'") ;
echo'<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<tr> 
										<th>Date Issue</th> 
										<th>Number</th>
										<th>Name</th>                         
                                        <th>Publication</th>
										<th>Date Added</th>
										<th>Status</th>																				
</tr>
';
//$result=mysql_query("select*from book_title where access_id='$_POST[id]'");
while($row=mysql_fetch_array($result))
{	
	echo"<tr>";
	
	echo"<td>".$row['date_issue']."</td>";
	echo"<td>".$row['magazine_id']."</td>";
	echo"<td>".$row['title']."</td>";
	echo"<td>".$row['pub_name']."</td>";
	echo"<td>".$row['date_added']."</td>";
	echo"<td>".$row['status']."</td>";

	
}
echo"</table>";
?>
