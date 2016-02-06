<?php include('header.php'); ?>
<?php include('navfff.php'); 
session_start();
?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
					<div class="sti">
						<!--img src="../LMS/E.B. Magalona.png" class="img-rounded"--> 
					</div>
					</br>
					</br>
					</br>
				<p><a class="btn btn-info" href="index.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
				<div class="login">
				<div class="log_txt">
				<p><strong>Please Enter the Details Below..</strong></p>
				</div>
						<form class="form-horizontal" method="POST" action="">
								<div class="control-group">
									<label class="control-label" for="inputEmail">ID Number :</label>
									<div class="controls">
									<input type="password" name="id_number" id="inputEmail" placeholder="ID Number" required>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">Password :</label>
									<div class="controls">
									<input type="password" name="password" id="inputEmail" placeholder="Password" required>
									</div>
								</div>
																				
								<div class="control-group">
									<div class="controls">
									
							<button data-placement="right" id="save"  title="Click to Login" type="submit" name="login" class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
								<a href="acc_fac.php">Create Account</a>
								</div>
								</div>
								<div id="res"></div>
								
<?php
	if (isset($_POST['login'])){
	$id_number=$_POST['id_number'];
	$password=$_POST['password'];
	
	$login_query=mysql_query("select * from accounts where id_number='$id_number' and password='$password' and type='student'")or die(mysql_error());
	$row=mysql_fetch_array($login_query);	
	$count=mysql_num_rows($login_query);
	
	$login_query2=mysql_query("select * from accounts where id_number='$id_number' and password='$password' and type='faculty'")or die(mysql_error());
	$row=mysql_fetch_array($login_query2);	
	$count1=mysql_num_rows($login_query2);
	
	$id=$row['id_number'];
	
	if ($count1 > 0){
	
	$_SESSION['id_borrow']=$id;
		echo "<br>";
		echo '<script>
	window.location="borrow_faculty.php";
	</script>';	
	}
	
	else if ($count > 0){
	echo '<div class="alert alert-danger"><strong>Access Denied!</strong>  ID NUMBER is not a student.</div>';	
	
	} 
	 
	 else{ 
	echo "<br>";
echo '<div class="alert alert-danger"><strong>Access Denied!</strong> Please Check your ID Number and Password.</div>';	
	
	}
	}
	?>
</script>
								
						</form>
				
				</div>
			</div>		
			</div>
		</div>
    </div>

<?php include('footer.php'); ?>