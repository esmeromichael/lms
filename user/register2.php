<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('dbcon.php'); ?>
<?
session_start();
?>
  <div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">	
		
					<div class="alert alert-info">Registration</div>
					
						<p><a href="login.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
						
							<div class="addstudent">
								<div class="details">Please Enter Details Below</div>
									<div class="bs-docs-example1">
										<?php 
										if (isset($_POST['submit']))
										{
										
										$username=$_POST['username'];
										$IDNumber=$_POST['IDNumber'];
										$password=$_POST['password'];								
										$cpassword=$_POST['cpassword'];
			
										if($cpassword!=$password)
											{
												$a="Password do not Match";
											}
										else
											{
												$a = "";
											}

										
												$query=mysql_query("select * from masterlist where IDNumber='$IDNumber'")or die(mysql_error());
												$count=mysql_num_rows($query);
												
												if ($count>0)
													{
														$result=mysql_query("SELECT * FROM masterlist WHERE IDNumber='$IDNumber'");
														while($row=mysql_fetch_array($result))
														{
															$firstname=$row['firstname'];
															$lastname=$row['lastname'];
															$course=$row['course'];
															$year=$row['year'];
															$type=$row['type'];
														
															
																$result1=mysql_query("SELECT * FROM userlevel");
																while($row=mysql_fetch_array($result1))
																{
																	$userlevel=$_POST['userlevel'];
																	
																	mysql_query("insert into acc_user (userlevel,IDNumber,username,password,type,firstname,lastname,course,year,dateregister,status_reg)
																			values('$userlevel','$IDNumber','$username','$password','$type','$firstname','$lastname','$course','$year',NOW(),'register')")or die(mysql_error());
														
																	header('location:login.php');
																}
															
														}
													}
																										
													
																							
												else
													{
													echo"ID Number doesn't exist";
													
													//mysql_query("insert into acc_user (userlevel,IDNumber,username,password,type,firstname,lastname,course,year,dateregister,status_reg)
																		//values('-1','$IDNumber','$username','$password','admin','admin','admin',' ',' ',NOW(),'register')")or die(mysql_error());	
													}
											}
?>
		
							<form class="form-horizontal" method="POST">
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">ID Number</label>
										<div class="controls">
											<input name="IDNumber" value="<?php if (isset($_POST['submit'])){ echo $IDNumber; }?>" type="text" id="inputPassword" placeholder="ID Number" required>
											&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
											<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"> </span><?php }?>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Username</label>
										<div class="controls">
											<input name="username" value="<?php if (isset($_POST['submit'])){ echo $username; }?>" type="text" id="inputPassword" placeholder="Username" required>
											&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
											<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php  ?></span><?php }?>
										</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
										<div class="controls">
											<input type="Password" name="password" value="<?php if (isset($_POST['submit'])){ echo $password; }?>" id="inputPassword" placeholder="Password" required>
										</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Confirm Password</label>
										<div class="controls">
											<input name="cpassword" value="<?php if (isset($_POST['submit'])){ echo $cpassword; }?>" type="Password" id="inputPassword" placeholder="Re-Type Password" required> 
											&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
											<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php echo $a; ?></span><?php }?>
										</div>
								</div>
     
	<div class="control-group">
    <label class="control-label" for="inputEmail"></label>
    <div class="controls">
 
	
	
	<?php 

	
		?>
			<br>
			<br>
			</div>
			
			</div>
		
		<div class="control-group">
			<div class="controls">
				<script type="text/javascript">
					jQuery(document).ready(function() {
					$('#save').tooltip('show');
					$('#save').tooltip('hide');
					})
				</script>
				
    <button data-placement="right" id="save"  title="Click to Save Your Information" type="submit" name="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Submit</button>
    </div>
    </div>
    </form>
	

          </div>









      </div>
    </div>

  </div>

  
