<?php include('header.php'); ?>
<?php include('session.php');?>
<?php include('staff_navbar_services.php');?>
<?php error_reporting(E_ALL^E_NOTICE);
?>
    
<div class="container">
<div class="margin-top">
	<div class="row">	
	<div class="span12">	
		<div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="icon-user icon-large"></i>&nbsp;Services</strong>
        </div> 
		<!--  -->
			<ul class="nav nav-pills"> 
				<li   class="active"><a href="staff_slogin_search.php">Research</a></li>										
				<li><a href="staff_sborrow.php">Borrow</a></li>																												
			</ul> 			
	
		<div class="login">
		  
		  <div class="bs-docs-example">
			<div class="alert alert-info"><strong><i class="icon-user icon-large"></i>&nbsp;Student's Log</strong></div>
		<hr>
		Please Enter the Details Required Below.......
       <hr>
		  
     <form class="form-horizontal" method="POST">
    <div class="control-group">
    <label class="control-label" for="inputEmail">ID Number</label>
    <div class="controls">
    <input type="password" name="id" id="id" placeholder="ID Number" required>
    </div>
    </div>
	
	<div class="controls">	
	<button id="login" name="form_login" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
	<?php echo $msg;?>
	<button id="login" name="form_logout" type="submit" class="btn"><i class="icon-signout icon-large"></i>&nbsp;Logout</button>
	<?php echo $msg;?>
						
					</div>
			
			<?php
				error_reporting(E_ALL^E_NOTICE);
				if(isset($_POST['form_login']) && isset($_POST['id'])) {
					require('dbcon.php');
					if(mysql_num_rows($result1=mysql_query("SELECT * FROM `student` WHERE id='".$_POST['id']."'"))>0) {
						$row1=mysql_fetch_array($result1);	
								
						$login_query=mysql_query("select * from user_login where id_num='".$_POST['id']."' and stat_login='Login'")or die(mysql_error());
						$count=mysql_num_rows($login_query);
						if ($count>0)
						{
						echo "You are already login!";
						}
						else
						{
						mysql_query("INSERT INTO `user_login` (id_num, course_id, login_date, login_time,purpose, stat_login) VALUES ('".$row1['id']."', '".$row1['crs_id']."', now(), now(), 'Research', 'Login')")
							or die('Error logging in...'.mysql_error());													
						$insertid=mysql_insert_id();
						if(!isset($_SESSION))
						
						//$_SESSION['last_insert_id']=$insertid;
						$_SESSION['student_id']=$row1['id'];
						echo "Successfully login!";	
						}
					}
					else {
						echo "ID # is not a student.";
					}
				}
				
				
				elseif(isset($_POST['form_logout'])){
					require('dbcon.php');
						//session_start();
						$id=$_POST['id'];
						$user_query=mysql_query("select * from user_login where id_num='$id' and stat_login='Login'");
						$count = mysql_num_rows($user_query);
						if($count>0)
						{
						$user_query1=mysql_query("select * from user_login where id_num='$id' and stat_login='Login'");
						$row1=mysql_fetch_array($user_query1);
						
						mysql_query("INSERT INTO `user_logout`(user_log_id,id_num,course_id,logout_date,logout_time) VALUES ('".$row1['user_login_id']."','".$row1['id_num']."','".$row1['course_id']."',now(),now())")
							or die('Error logging out...'.mysql_error());
						mysql_query("UPDATE user_login SET stat_login='DONE' WHERE id_num='$id'");
						unset($_SESSION['student_id']);						
						echo"You are logged out.";
						//$msg='You are logged out.';					
						}
						else
						{
						echo"Please check your ID Number or login first!";
						}
				}
			?>
			</form>
</div>	
</div>
</div>
</div>
</div>
