<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>
<link rel="stylesheet" href="style_lost.css" type="text/css" />
<div id="content">
		
					<center>
							<form method="post" action="search.php"><br>
								<input type="search" name="key" style="padding:10px; width:500px; text-align:center;" placeholder="Search by Title, Year, Author.......">
							</form>
				</center>
							<center>	<h2><i class="icon-large icon-search"></i> Search Result</h2> </center>

				
	<!-- table -->
<div class="above_table">
<br><br>
	<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					
							<th>Acc. Number</th>
							<th>Call Number</th>
							<th>Category</th>
							<th>Book Title</th>
							<th>Author</th>
							<th>Publisher Name</th>
							<th>ISBN</th>
							<th>Status</th>							
							
				</tr>
			</thead>
			<tbody>
			
			<?php
	
	$user_query=mysql_query("select * from book_title
		LEFT JOIN book_info ON book_title.access_id = book_info.access_id
		LEFT JOIN book_category ON book_info.category_id=book_category.category_id
		LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
		where book_title.acc_num LIKE'%$key%'")or die(mysql_error());
		$count = mysql_num_rows($user_query);
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
		
	if ($count > 0){ 
	
	?>
	
				
						<tr >
							<td><?php echo $row['acc_num'];?></td>
							<td><?php echo $row['call_num'];?></td>
							<td><?php echo $category ?></td>
							<td><?php echo $row['book_title'];?></td>
							<td><?php echo $row['Author'];?></td>
							<td><?php echo $pub ?></td>
							<td><?php echo $isbn ?></td>
							<td><?php echo $stat ?></td>
						</tr>
				<?php }

		elseif ($count == 0)
		{
			echo 'No Data Available';
		}
		else
		{
		
		}}

						?>
  
					</tbody>
						
		</table>
		
	</div>
	</div>
			
				
				
				
				
				
		</div><!-- end content --->

