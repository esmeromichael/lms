<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_borrow.php'); ?>
<?php
$title = $_POST['title'];

?>
<div class="container">
	<div class="margin-top">
	<div class="row">	
	<div class="span12">
	<p><a href="login_borrow.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
		<div class="alert alert-info">Add Students</div>
						<center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
							<thead>
                                    <tr>
									    <th>Call Number</th>
                                        <th>Category</th>                      
                                        <th>Book title</th>                                 
										<th>Author</th>
                                        <th>Copyright Year</th>										
										<th>Publisher Name</th>										
                                        <th>Copy/s</th>
											
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

				
								
									 $user_query=mysql_query("select * from book_title
									LEFT JOIN book_info ON book_title.access_id = book_info.access_id
									LEFT JOIN book_category ON book_info.category_id=book_category.category_id
									LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
									where book_title.stat_book='Available' and book_title.book_title LIKE '%$title%' GROUP BY book_title.book_title")or die(mysql_error());
									while($row=mysql_fetch_array($user_query))
									{				
										$access_id=$row['access_id'];
										$category_id=$row['category_id'];
									?>
								
									<tr class="del<?php echo $id ?>"> 
									<td><?php echo $row['call_num']; ?> </td>					
									<td><?php echo $row['classname']; ?> </td>
									<td><?php echo $row['book_title']; ?></td>		
									<td><?php echo $row['Author']; ?> </td> 
									<td><?php echo $row['copyright_date']; ?></td>										
									<td><?php echo $row['publisher_name']; ?></td>
									<?php
									$ncopy=1;
											$navail=0;
											$user_query2=mysql_query("select * from book_title where access_id='$access_id' and stat_book='Available'")or die(mysql_error());
									while($row2=mysql_fetch_array($user_query2))
									{
											
													$ncopy++;
												
											if($row2['stat_book']=='Available')
												{
													$navail++;
												}
									}
											
									?>
									<td><?php echo $navail; ?> </td>

									<?php  }
									?>
                           
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<?php //include('footer.php') ?>