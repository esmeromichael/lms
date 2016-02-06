<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('dbcon.php'); ?>
<?php error_reporting(E_ALL^E_NOTICE);?>
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
										$id=$_POST['id'];
										$password=md5($_POST['password']);	
										//$password=$_POST['password'];
										$cpassword=$_POST['cpassword'];
			
										if($cpassword!=($_POST["password"]))
											{
												$a="Password do not Match";
											}
										else
											{
											$a = "";
											
											$query=mysql_query("select * from student where id='$id'")or die(mysql_error());
												$count=mysql_num_rows($query);
												
												if ($count>0)
													{
														$result=mysql_query("SELECT * FROM student WHERE id='$id'");
														while($row=mysql_fetch_array($result))
														{
															$id=$row['id'];																													
														}												
																	mysql_query("insert into accounts (type,id,username,password,dateregister)
																			values('student','$id','$username','$password',NOW())")or die(mysql_error());
														
																	header('location:index.php');																
																
													}
												else if ($count<0)
													{
														$result=mysql_query("SELECT * FROM faculty WHERE id='$id'");
														while($row=mysql_fetch_array($result))
														{
															$id=$row['id'];																													
														}													
																	mysql_query("insert into accounts (type,id,username,password,dateregister)
																			values('faculty','$id','$username','$password',NOW())")or die(mysql_error());
														
																	header('location:index.php');	
													}										
												else
													{
													$b="ID Number not registerd!!!";
													
													//mysql_query("insert into acc_user (userlevel,IDNumber,username,password,type,firstname,lastname,course,year,dateregister,status_reg)
																		//values('-1','$IDNumber','$username','$password','admin','admin','admin',' ',' ',NOW(),'register')")or die(mysql_error());	
													}
											}
										}	
?>											
		
							<form class="form-horizontal" method="POST">
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">ID Number:</label>
										<div class="controls">
											<input name="id" value="<?php if (isset($_POST['submit'])){ echo $id; }?>" type="text" id="inputPassword" placeholder="ID Number" required>
											&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
											<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php echo $b; ?> </span><?php }?>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Username:</label>
										<div class="controls">
											<input name="username" value="<?php if (isset($_POST['submit'])){ echo $username; }?>" type="text" id="inputPassword" placeholder="Username" required>
											&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
											<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php  ?></span><?php }?>
										</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password:</label>
										<div class="controls">
											<input type="Password" name="password" value="<?php if (isset($_POST['submit'])){ echo $password; }?>" id="inputPassword" placeholder="Password" required>
										</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Confirm Password:</label>
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

  
