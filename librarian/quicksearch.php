<ul>
<?php
include('dbcon.php');
$count= 0;
$key =  $_POST['key'];
$key = addslashes($key);
	$user_query=mysql_query("select * from book_title
		LEFT JOIN book_info ON book_title.access_id = book_info.access_id
		LEFT JOIN book_category ON book_info.category_id=book_category.category_id
		LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
		where book_title.acc_num LIKE'%$key%'")or die(mysql_error());
		while($row=mysql_fetch_array($user_query))
		{				
			$access_id=$row['access_id'];
			$category_id=$row['category_id'];
			$book_title=$row['book_title'];
			$author=$row['Author'];
			$acc=$row['acc_num'];
			$category_id=$row['category_id'];
			$call=$row['call_num'];
			$pub=$row['publisher_name'];
			$isbn=$row['isbn'];
			$yr=$row['copyright_date'];			
			$stat=$row['stat_book'];
								
	if($count<= 10){
?>

	<li>
		<a name="show" id="<?php echo $access_id; ?>">
		<p><a data-toggle="modal" href="#about"><?php echo $book_title; ?></a></p>
		
	</li>
	
		<div class="show<?php echo $access_id; ?> display_all resulter">
		<p><label>Title : </label><?php echo $book_title; ?></p>
		<p><label>Author : </label><?php echo $author; ?></p>
		<p><label>Accession Number : </label><?php echo $acc; ?></p>
		
	
	
		<div class="modal hide fade" id="about">
	<div class="modal-header">
	<h1>Book Information</h1>
	  </div>
	  <div class="modal-body">
	 	  
	    <p>Accession number:&nbsp;<?php echo $acc ?></p>
		<p>Call number:&nbsp;<?php echo $call ?></p>
		<p>Category:&nbsp;<?php echo $category_id?></p>
	    <p>Title:&nbsp;<?php echo $book_title ?></p>
	    <p>Author:&nbsp;<?php echo $author ?></p>
	    <p>Publisher_Name:&nbsp;<?php echo $pub ?></p>
		<p>ISBN:&nbsp;<?php echo $isbn ?></p>
	    <p>Copyright_Year:&nbsp;<?php echo $yr ?></p>	    
		<p>Status:&nbsp;<?php echo $stat ?></p>

	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
		</div>

	
		</div>
<?php }}
if($count==""){
echo "no match Found";
}else{
 ?>
 
 
 
 <li><span class="resu">Total Search Result <?php echo $count; ?> </span><a class="view" href="allresult.php?key=<?php echo $key; ?>">View all Search Result</a></li>
 <?php } ?>
 </ul>
 		