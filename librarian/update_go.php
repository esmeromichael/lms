<?php
include('dbcon.php');
error_reporting(E_ALL^E_NOTICE);

if($_POST['c_orig']==$_POST['c'])
{
	if($_POST['b']==1)
	{
		mysql_query("update book_title set book_title='$_POST[title]',call_num='$_POST[cn]',stat_book='Available',acquisition_id='$_POST[acq]' where access_id='$_POST[acc]' and stat_book!='Reserve'");
	}
	else
	{
		mysql_query("update book_title set book_title='$_POST[title]',call_num='$_POST[cn]',stat_book='Not Available',acquisition_id='$_POST[acq]' where access_id='$_POST[acc]' and stat_book!='Reserve'");
	}
	mysql_query("update book_info set category_id='$_POST[cat]' Author='$_POST[author]', publisher_name='$_POST[pub]',isbn='$_POST[isbn]',copyright_date='$_POST[copy]' where access_id='$_POST[acc]'");
}
else if($_POST['c_orig']>$_POST['c'])
{
	if($_POST['b']==1)
	{
		mysql_query("update book_title set book_title='$_POST[title]',call_num='$_POST[cn]',stat_book='Available',acquisition_id='$_POST[acq]' where access_id='$_POST[acc]' and stat_book!='Reserve'");
	}
	else
	{
		mysql_query("update book_title set book_title='$_POST[title]',call_num='$_POST[cn]',stat_book='Not Available',acquisition_id='$_POST[acq]' where access_id='$_POST[acc]' and stat_book!='Reserve'");
	}
	mysql_query("update book_info set category_id='$_POST[cat]', Author='$_POST[author]', publisher_name='$_POST[pub]',isbn='$_POST[isbn]',copyright_date='$_POST[copy]' where access_id='$_POST[acc]'");

	$newcopy=0;
	$newcopy=$_POST['c_orig']-$_POST['c'];

	for($i=1;$i<=$newcopy;$i++)
	{
		mysql_query("delete from book_title where access_id='$_POST[acc]' order by acc_num desc limit 1 ");
	}


	$result=mysql_query("select*from book_title");
	$counter=mysql_num_rows($result);
	$c=0;
	while($row=mysql_fetch_array($result))
	{
		$c++;
		$get_id=$row['book_id'];
		mysql_query("update book_title set acc_num='$c' where book_id='$get_id'");
	}

	$res=mysql_query("select*from book_copy where access_id='$_POST[acc]'");
	while($rows=mysql_fetch_array($res))
	{
		$avail=$rows['available_no'];
	}


	if($_POST['b']==1)
	{
		$cx=$avail+$newcopyx;
	
		mysql_query("update book_copy set copy='$_POST[c]', available_no='$cx' where access_id='$_POST[acc]' ");
	}
	else
	{
	
		mysql_query("update book_copy set copy='$_POST[c]', available_no='N/A' where access_id='$_POST[acc]' ");
	}

}
else if($_POST['c_orig']<$_POST['c'])
{
	
	mysql_query("update book_info set category_id='$_POST[cat]', Author='$_POST[author]', publisher_name='$_POST[pub]',isbn='$_POST[isbn]',copyright_date='$_POST[copy]' where access_id='$_POST[acc]'");
	$newcopyx=0;
	$newcopyx=$_POST['c']-$_POST['c_orig'];

	for($i=1;$i<=$newcopyx;$i++)
	{
		$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$_POST[acc]','0','','$_POST[title]','Available','$_POST[acq]',now())";
			$result = mysql_query( $sql1);
	}


	if($_POST['b']==1)
	{
		mysql_query("update book_title set book_title='$_POST[title]',call_num='$_POST[cn]',stat_book='Available',acquisition_id='$_POST[acq]' where access_id='$_POST[acc]' and stat_book!='Reserve' ");
	}
	else
	{
		mysql_query("update book_title set book_title='$_POST[title]',call_num='$_POST[cn]',stat_book='Not Available',acquisition_id='$_POST[acq]' where access_id='$_POST[acc]' and stat_book!='Reserve'");
	}


	$result=mysql_query("select*from book_title");
	$counter=mysql_num_rows($result);
	$c=0;
	while($row=mysql_fetch_array($result))
	{
		$c++;
		$get_id=$row['book_id'];
		mysql_query("update book_title set acc_num='$c' where book_id='$get_id'");
	}

	
	$res=mysql_query("select*from book_copy where access_id='$_POST[acc]'");
	while($rows=mysql_fetch_array($res))
	{
		$avail=$rows['available_no'];
	}

	if($_POST['b']==1)
	{
		$cx=$avail+$newcopyx;
	
		mysql_query("update book_copy set copy='$_POST[c]', available_no='$cx' where access_id='$_POST[acc]' ");
	}
	else
	{
	
		mysql_query("update book_copy set copy='$_POST[c]', available_no='N/A' where access_id='$_POST[acc]' ");
	}


}

?>