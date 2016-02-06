<?php
error_reporting(E_ALL^E_NOTICE);
include("dbcon.php");

?>
<div class="pull-right">
<br>
<br>
	<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
<br>
</div>
<?php
$c=0;
$result=mysql_query("select*from book_title a,book_info b,book_category c, acquisition d where a.access_id='$_POST[id]' and b.access_id='$_POST[id]' and c.category_id=b.category_id and d.acq_id=a.acquisition_id") ;
echo'<table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="example">
<tr> 
										<th>Acc. No.</th> 
										<th>Call No.</th>                         
                                        <th>Category</th>
										<th>Book Title</th>                                                                    
										<th>Author</th>														
										<th>Publisher Name</th>
										<th>ISBN</th>
										<th>Copyright Year</th>
										<th>Acquisition</th>
										<th>Status</th>
				
										
</tr>
';
//$result=mysql_query("select*from book_title where access_id='$_POST[id]'");
while($row=mysql_fetch_array($result))
{	
	echo"<tr>";
	echo"<td>".$row['acc_num']."</td>";
		//echo"<td>
		//<div class='controls'>
		//<input type='text' class='span4' onblur='callNum_func(\"call_num".$row['book_id']."\",\"".$row['book_id']."\");' id='call_num".$row['book_id']."' value='".$row['call_num']."' name='call_num'  placeholder='Call Number' style='width:80px;'/>
		//</div>
		//</td>";
	echo"<td>".$row['call_num']."</td>";
	//$result1=mysql_query("select*from book_category where category_id='$row[]'");
	//while($row1=mysql_fetch_array($result1))
	//{
		echo"<td>".$row['classname']."</td>";
	//}
	echo"<td>".$row['book_title']."</td>";
	echo"<td>".$row['Author']."</td>";
	echo"<td>".$row['publisher_name']."</td>";
	echo"<td>".$row['isbn']."</td>";
	echo"<td>".$row['copyright_date']."</td>";
	//$a=mysql_query("select*from acquisition where acq_id='$row[acquisition_id]'");
	//$ar=mysql_fetch_array($a);
	
	echo"<td>".$row['acq_name']."</td>";
	echo"<td>".$row['stat_book']."</td>";
	echo"</tr>";
}
echo"</table>";
?>
