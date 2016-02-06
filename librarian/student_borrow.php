<?php include('header.php'); ?>
<?php include('navbar_services.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
								<div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Borrow Table</strong>
                                </div>

		<div class="span12">		

		<form method="post" action="student_borrow_save.php">
<div class="span2">

			
				
				<div class="control-group"> 
					<div class="controls">

								<button name="delete_student" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Borrow</button>
					</div>
				</div>
				</div>
				<div class="span8">
						<div class="alert alert-success"><strong>Select Book</strong></div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                <thead>
                                    <tr>
                       
                                     <th>Call Number</th>
                                        <th>Category</th>                      
                                        <th>Book title</th>                                 
										<th>Author</th>
                                        <th>C_Year</th>										
										<th>Publisher Name</th>
										<th>ISBN</th>
                                        <th>Copy/s</th>
										<th>Add</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								 
                                  $user_query=mysql_query("select * from book_title
									LEFT JOIN book_info ON book_title.access_id = book_info.access_id
									LEFT JOIN book_category ON book_info.category_id=book_category.category_id
									LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
									where book_title.stat_book='Available' GROUP BY book_title.book_title")or die(mysql_error());
									while($row=mysql_fetch_array($user_query))
									{				
										$access_id=$row['access_id'];
										$category_id=$row['category_id'];
									?>
								
									<tr class="del"> 
									<td><?php echo $row['call_num']; ?> </td>					
									<td><?php echo $row['classname']; ?> </td>
									<td><?php echo $row['book_title']; ?></td>		
									<td><?php echo $row['Author']; ?> </td> 
									<td><?php echo $row['copyright_date']; ?></td>										
									<td><?php echo $row['publisher_name']; ?></td>
									<td><?php echo $row['isbn']; ?></td>
									<?php
									$ncopy=1;
											$navail=0;
											$z=0;
											$acc_f=0;
											$user_query2=mysql_query("select * from book_title where access_id='$access_id' and stat_book='Available'")or die(mysql_error());
									while($row2=mysql_fetch_array($user_query2))
									{
											$z++;
													$ncopy++;
												
											if($row2['stat_book']=='Available')
												{
													$navail++;
												}
												if($z==1)
												{
													$acc_f=$row2['acc_num'];
												}
												
									}
											
									?>
									<td><?php echo $navail; ?> </td>
									<td width="20">
												<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $acc_f;?>" >
												
                                    </td>
									
							
								
																																			
                                    </tr>
									<?php  } 

$xxxx=mysql_query("select*from set_book");
$getb=mysql_fetch_array($xxxx);

									?>
                                </tbody>
                            </table>
			    </form>
			</div>		
			</div>		
<script>		
$(".uniform_on").change(function(){
	var max=<?php echo $getb['max_book'];?>;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert(max+' Books are allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
	
	
	
	
})

$('.btnprint').click(function(){
var oldpage=$('body').html();
var printpage=$('.span8').html();
$('body').html(printpage);
window.print();
$('body').html(oldpage);

	
	});
</script>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>