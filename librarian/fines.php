<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_setting.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-cog icon-large"></i>&nbsp;Settings</strong>
               </div> 								
								    <ul class="nav nav-pills">
										<li class="active"><a href="fines.php">Fines</a></li>									
										<li><a href="set_books.php">Books</a></li>
										<li><a href="add_course.php">Add Course</a></li>
										<li><a href="add_category.php">Add Category</a></li>
										<li><a href="draft1.php">Borrow Time Settings</a></li>
										
									</ul> 									
						</br>
						</br>
						</br>
								
						<div class="addstudent">
						<div class="details">Please Enter Details Below</div>		
						<form class="form-horizontal" method="POST" action="save_fines.php" enctype="multipart/form-data">			
			
						<?php
						$cat_query = mysql_query("select * from set_fines ")or die(mysql_error());
							while($cat_row=mysql_fetch_array($cat_query))
								{
									$fines=$cat_row['student_fines'];
											
								}
						?>
					
						<div class="control-group">
							<label class="control-label" for="fines">Set Fines Per Day:</label>
								<div class="controls">
									<input type="text" class="span2" id="fines" name="fine" value="<?php echo $fines; ?>" placeholder="author" required>
								</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<center>
								<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
							</center>
							</div>
						</div>
						</form>			
							
			</div>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>

