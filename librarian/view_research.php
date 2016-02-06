<html>


<body>
	
	
	
				<?php
			$query=mysql_query("SELECT * FROM research where research_id = '$get_id'") or die (mysql_error());
			while ($r_row=mysql_fetch_array($query)){
			$r_id=$r_row['research_id'];
			?>
				
				<div class="topviewtab"><?php echo $r_row['research_title'];?></div>
				<div class='blue'><?php echo $r_row['status'];?></div>
				

				
				<center>
				<h1>Research Information</h1> <br>
				<strong>Location:</strong><br><font style="font:Normal 30px 'Calibri';"> <?php echo $r_row['location']; ?></font><br><br>
				<strong>Copyright Year:</strong><br><font style="font:Normal 30px 'Calibri';">  <?php echo $r_row['copyright_year']; ?></font><br><br>
				<strong>Category:</strong><br><font style="font:Normal 30px 'Calibri';">  <?php echo $r_row['category']; ?></font><br><br></center>
				<center><strong style="font:bold 15px 'Arial';">Summary:</strong><br>
				<?php echo $r_row['research_summary']; ?></center><br>
			<?php } ?>
			
			<div class="pull-left">
				<strong>Authors:</strong><br>
				<?php 
				$research_query=mysql_query
				("select author.author_id , author.firstname  , author.middlename  , author.lastname, author.image,
				author_has_research.author_id   from author  , author_has_research
				where author_has_research.research_id = '$r_id' and author.author_id = author_has_research.research_id
				OR author_has_research.research_id = '$r_id' and author.author_id = author_has_research.author_id") or die (mysql_error());
				while ($a_row=mysql_fetch_array($research_query))
				{
				$a_id=$a_row['author_id'];
				?>		
				<a href="view_author_profile.php?id=<?php echo $a_id; ?>" class="pict"><img src="admin/<?php echo $a_row['image'];?>" class="img-polaroid" style="width:80px; height:60px;"><br> <?php echo $a_row['firstname']." ".$a_row['middlename']." ".$a_row['lastname'] ;?></a>
			
		
		
		
		</div>
			
				<?php } ?>
			
			
				
		
		
		<div id="sidebar" >
			<div class="serts">
							<form method="post" action="search.php"><br>
							<div style="font:bold 15px 'arial';">Seach Here: </div>
								<input class="serts" style="padding:10px;" type="search" name="search" placeholder="Search by Title, Year, Author.......">
							</form>
					</div>
					<div class="text-right" style="margin-top: -23px;">							
								<?php
								$r_query = mysql_query("select * from research where category = 'Capstone' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">	
									<i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div>
							
								<?php } ?>
								<div class="line-block"></div>
								<font style=" color:darkblue; font:bold 24px 'cambria';">Thesis</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
								<?php
								$r_query = mysql_query("select * from research where category = 'Thesis' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">
									<div class="ellipsis-text"> <i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div></div>
							
								<?php } ?>
					</div>
					<br><br>
						<div class="text-right"  style="margin-top: -23px;">
					
						<font style=" color:darkblue; font:bold 24px 'cambria';">Author Overview</font><hr style="margin:8px; border-bottom:1px solid #ccc;">

								<?php
								$a_query = mysql_query("select * from author ORDER BY rand() LIMIT 6")or die(mysql_error());
								while($a_row=mysql_fetch_array($a_query)){
								$a_id = $a_row['author_id'];
								?>
									<script type="text/javascript">
											$(document).ready(function(){                                     
                                            $('#<?php echo $a_id; ?>').tooltip('show')
                                            $('#<?php echo $a_id; ?>').tooltip('hide')
                                        });
                                    </script>
												
								<a style ="color:blue; border-bottom:1px solid #aaa; font-size:16px; line-height:25px;" href="view_author_profile.php?id=<?php echo $a_id; ?>">
								<img class="img-polaroid" rel="tooltip"  data-placement="bottom"  title="<?php echo $a_row['firstname']." ".$a_row['middlename']." ".$a_row['lastname']; ?>" id="<?php echo $a_id; ?>" src="admin/<?php echo $a_row['image']; ?>" style="width:110px; height:80px; padding:5px;">
								</a>
								
								<?php } ?>
								<br>
							
		
			
							
					</div>
					
	
				
										

			</div>

		</div><!-- end content --->
		
	</div><!-- end container --->

</body>

<?php include('scripts.php'); ?>
</html>