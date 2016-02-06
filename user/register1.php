<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('dbcon.php'); ?>

<?php
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
										if (isset($_POST['submit'])){
										$IDNumber=$_POST['IDNumber'];
										$Firstname=$_POST['Firstname'];
										$Lastname=$_POST['Lastname'];
										
										$Username=$_POST['Username'];
										$Password=$_POST['Password'];
										$cpassword=$_POST['cpassword'];
			
											if($cpassword!=$password)
												{
													$a="Password do not Match";
												}
												else
												{
													$a = "";
												}
												
											
			
											}
											session_destroy();
										?>
							
								<form class="form-horizontal" method="POST">			
								
								
		
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">ID Number:</label>
									<div class="controls">
										<input name="IDNumber" class="span3" value="<?php if (isset($_POST['submit'])){ echo $IDNumber; }?>" type="text" id="inputPassword" placeholder="ID Number" required>
										<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php ?></span><?php }?>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">First Name:</label>
									<div class="controls">
										<input name="Firstname" class="span3" value="<?php if (isset($_POST['submit'])){ echo $Firstname; }?>" type="text" id="inputPassword" placeholder="Firstname" required>
										<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php  ?></span><?php }?>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">Last Name:</label>
									<div class="controls">
										<input name="Lastname" class="span3" value="<?php if (isset($_POST['submit'])){ echo $Lastname; }?>" type="text" id="inputPassword" placeholder="Lastname" required>
										<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php ?></span><?php }?>
									</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Username</label>
									<div class="controls">
										<input name="Username" class="span3" value="<?php if (isset($_POST['submit'])){ echo $Username; }?>" type="text" id="inputPassword" placeholder="Username" required>
										<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php  ?></span><?php }?>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
										    <input type="Password" name="Password" value="<?php if (isset($_POST['submit'])){ echo $password; }?>" id="inputPassword" placeholder="Password" required>

									</div>
								</div>
						
								<div class="control-group">
									<label class="control-label" for="inputPassword">Confirm Password</label>
									<div class="controls">
										<input type="password" class="span3" name="cpassword" value="<?php if (isset($_POST['submit'])){echo $cpassword;} ?>" placeholder="Confirm Password" required>
										<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php echo $a; ?></span><?php }?>
									</div>
								</div>

										<div class="control-group">
											<div class="controls">
												<button name="submit"title="Click to Save your Information" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Register</button>
											</div>
										</div>
									<?php 
									session_start();
										if (isset($_POST['submit']))
										{
										$IDNumber=$_POST['IDNumber'];
										$Firstname=$_POST['Firstname'];
										$Lastname=$_POST['Lastname'];
										$Username=$_POST['Username'];
										$Password=$_POST['Password'];
										$cpassword=$_POST['cpassword'];
								
										
											
											
										
										
									?>
								</form>
								</div>
							</div>	
				</div>
			</div>
		</div>
		
		

	
