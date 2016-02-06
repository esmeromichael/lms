<?php include('header.php'); ?>
<?php include('navbar_borrow.php'); ?>
<?php include('dbcon.php'); ?>
<?php error_reporting(E_ALL^E_NOTICE);?>
<div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">		
					<div class="alert alert-info"><strong>Registration Form for Faculty</strong></div>
					
						<p><a href="faculty_login.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>						
							<div class="addstudent">
								<div class="details">Please Enter Details Below</div>
									<div class="bs-docs-example1">
																			
		
							<form class="form-horizontal" method="POST">
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">ID Number:</label>
										<div class="controls">
											<input name="id" value="<?php if (isset($_POST['submit'])){ echo $id; }?>" type="text" id="inputPassword" placeholder="ID Number" required>
											
										</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password:</label>
										<div class="controls">
										<input type="Password" value="<?php if (isset($_POST['submit'])){ echo $password; }?>" name="password"  id="inputPassword" placeholder="Password" required>
										</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label" for="inputPassword">Confirm Password:</label>
										<div class="controls">
											<input name="cpassword" value="<?php if (isset($_POST['submit'])){ echo $cpassword; }?>" type="Password" id="inputPassword" placeholder="Re-Type Password" required> 
											&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
												<span class="label label-important"><?php echo $a; ?></span>
										</div>
								</div>
     
	<div class="control-group">
    <label class="control-label" for="inputEmail"></label>
    <div class="controls">
 
	
	
	<?php 

	
		?>

			</div>
			
			</div>
		
		
		<?php 
										if (isset($_POST['submit']))
										{
										$id=$_POST['id'];
										//$password=md5($_POST['password']);	
										$password=$_POST['password'];
										$cpassword=$_POST['cpassword'];										
										if($cpassword!=($_POST["password"]))
											{ ?>
												<div class="alert alert-danger">Password do not match!</div>
											<?php
											}
										else
											{
											if(mysql_num_rows($result1=mysql_query("SELECT * FROM `student` WHERE id='".$_POST['id']."'"))>0) {
											$row1=mysql_fetch_array($result1);	
											$account_query=mysql_query("select * from accounts where id_number='".$_POST['id']."'")or die(mysql_error());
												$count=mysql_num_rows($account_query);
												if ($count>0){ 
												echo "<script language='javascript' type='text/javascript'> window.alert('You already have an account!'); </script>";	
												echo "<script language='javascript' type='text/javascript'> location.href='login_borrow.php' </script>";	
												}
												else {
													mysql_query("INSERT INTO `accounts` (type, id_number, password, date_register) VALUES ('student','".$row1['id']."','$password', now())")
													or die('Error logging in...'.mysql_error());
													echo "<script language='javascript' type='text/javascript'> window.alert('SAVED!'); </script>";	
													echo "<script language='javascript' type='text/javascript'> location.href='login_borrow.php' </script>";	
												}
												}
											else {?>
											
												<div class="alert alert-danger">ID Number is not student. Please check your ID Number first!</div>
											<?php
											}
										}
										}										
										?>	
										
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

  
