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
					
					
								
						<!--  -->
								    <ul class="nav nav-pills">
										<li><a href="fines.php">Fines</a></li>									
										<li class="active"><a href="set_books.php">Books</a></li>
										<li><a href="add_course.php">Add Course</a></li>
										<li><a href="add_category.php">	Add Category</a></li>
										<li><a href="draft1.php">Borrow Time Settings</a></li>
									
									</ul> 
						</br>
						</br>
						</br>
								
						<div class="addstudent">
						<div class="details">Please Enter Details Below (for student):</div>		
						<form class="form-horizontal" method="POST" action="save_add_books.php" enctype="multipart/form-data">			
			
						<?php
						$cat_query = mysql_query("select * from set_book ")or die(mysql_error());
							while($cat_row=mysql_fetch_array($cat_query))
								{
									$setbook=$cat_row['max_book'];
											
								}
						?>
					
						<div class="control-group">
							<label class="control-label" for="fines">Maximum no_books :</label>
							<div class="controls">
								<input type="text" class="span4" id="fines" name="set_books" value="<?php echo $setbook; ?>" placeholder="author" required>
							</div>
						</div>
		
		

		
		
						<div class="control-group">
							<div class="controls">
							<button name="submit" type="submit"   class="btn btn-success "><i class="icon-save icon-large"></i>&nbsp;Save</button>
							</div>
						</div>
						</form>					
					</div>		
				</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>