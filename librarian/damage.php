<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>

 <div class="container">
	<div class="margin-top">
		<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-book icon-large"></i>&nbsp;Books Table</strong>
               </div> 
						<!--  -->
					<ul class="nav nav-pills"> 
						<li><a href="books.php">All Books</a></li>										
						<li><a href="reserve.php">Reserved Books</a></li>
						<li><a href="lost.php">Lost Books</a></li>
						<li class="active"><a href="damage.php">Damage Books</a></li>									
					</ul> 
					
					<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
								<p><a href="add_damage.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Damage Books</a>
                                <thead>
                                    <tr>
									
									
									    <!--<th colspan=1 style='text-align:center;'>Action</th> -->                        
                                       	<th>Accession No.</th>
										<th>Call No.</th>
										<th>Category</th>
										<th>Book Title</th>                                                                    
										<th>Author</th>														
										<th>Publisher Name</th>
										<th>ISBN</th>
										<th>Copyright Year</th>	
																				
                                    </tr>
                                </thead>
                                <tbody>								 
                <?php 									
				//$user_query=mysql_query("select * from book_copy a, book_title b, book_info c, book_category x where a.access_id=b.access_id and a.access_id=c.access_id and x.category_id=c.category_id group by b.book_title")or die(mysql_error());
				
				$user_query=mysql_query("select * from book_title
				LEFT JOIN book_info ON book_title.access_id = book_info.access_id
				LEFT JOIN book_category ON book_info.category_id=book_category.category_id
				LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
				where book_title.stat_book='Damage' ORDER BY book_title.acc_num  ASC")or die(mysql_error());
				while($row=mysql_fetch_array($user_query))
				{
				
				$access_id=$row['access_id'];
				$category_id=$row['category_id'];
					
				?>
				<tr class="del">                                	
					<!--<td>
						<?php// echo"<a href='#' onclick='update_func(\"".$row['access_id']."\",\"".$row['category_id']."\",\"".$row['book_title']."\",\"".$row['Author']."\",\"".$row['publisher_name']."\",\"".$row['isbn']."\",\"".$row['copyright_date']."\",\"".$row['acquisition_id']."\",\"".$row['stat_book']."\",\"".$row['copy']."\",\"".$row['available_no']."\",\"".$row['call_num']."\");' ><i class='icon-edit icon-large'></i> Edit</a>";?>
					</td> -->
					<td><?php echo $row['acc_num']; ?> </td>
					<td><?php echo $row['call_num']; ?> </td>					
					<td><?php echo $row['classname']; ?> </td>
                    <td><?php echo $row['book_title']; ?></td>		
                    <td><?php echo $row['Author']; ?> </td> 				
					<td><?php echo $row['publisher_name']; ?></td>
					<td><?php echo $row['isbn']; ?></td>
					<td><?php echo $row['copyright_date']; ?></td>					 					
								
                </tr>
				<?php
					}
				?>
                                </tbody>
                            </table>
								
					</form>