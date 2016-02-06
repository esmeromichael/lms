<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
	<?php
		include('dbcon.php');
		if (isset($_POST['submit'])){
		$student_no=$_POST['student_no'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
	
			$query=mysql_query("select * from students where student_no='$student_no'")or die(mysql_error());
			$count=mysql_num_rows($query);

				if ($count  > 0){
				$exist = "";
				}else{
				$exist ='ID Number not Found!';
				}
								
			if($cpassword!=$password){
		$a="Password do not Match";
		}else{
		$a = "";
		}
	}
	?>
	
	<div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">
					<div class="log_txt">
						<p><strong>Please Enter the Details Below..</strong></p>
					</div>
					
					<form class="form-horizontal" method="POST">
							
		
						<div class="control-group">
							<label class="control-label" for="inputEmail">Student No:</label>
							<div class="controls">
							<input type="text" id="inputEmail" name="student_no" value="<?php if (isset($_POST['submit'])){echo $student_no;} ?>" placeholder="Student No" required>
							&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
							<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php echo $exist; ?></span><?php }?>
							</div>
						</div>
		
						<div class="control-group">
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
							<input type="password" name="password" value="<?php if (isset($_POST['submit'])){echo $password;} ?>" placeholder="Password">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="inputPassword">Confirm Password</label>
							<div class="controls">
							<input type="password" name="cpassword" value="<?php if (isset($_POST['submit'])){echo $cpassword;} ?>" placeholder="Confirm Password" required>
							<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php echo $a; ?></span><?php }?>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
							<button name="submit" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Confirm</button>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>

	

	
