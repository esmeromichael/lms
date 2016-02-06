<?php include('header.php'); ?>
<?php include('navbar_search.php');?>
<?php error_reporting(E_ALL^E_NOTICE);
session_start();
?>
    <div class="container">
	<div class="margin-top">
	<div class="row">	
	<div class="span12">
		<div class="sti"> </div>
		<div class="alert alert-info">
		<div class="pull-left">
		<div class="admin">
		<strong>WELCOME!!</strong>
		</div>
		</div>
		</strong>
		<div class="pull-right">					
						<div  class="admin">						
							<strong>	<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>	</strong>					
							<img src="dg8.gif" name="hr1"><img src="dg8.gif" name="hr2"><img src="dgc.gif"><img src="dg8.gif" name="mn1"><img src="dg8.gif" name="mn2"><img src="dgc.gif"><img src="dg8.gif" name="se1"><img src="dg8.gif" name="se2"><img src="dgam.gif" name="ampm">	
						</div>
		</div>
		</br></br>
<script type="text/javascript">
// (c) 2000-2014 ricocheting.com
dg = new Array();
dg[0]=new Image();dg[0].src="dg0.gif";
dg[1]=new Image();dg[1].src="dg1.gif";
dg[2]=new Image();dg[2].src="dg2.gif";
dg[3]=new Image();dg[3].src="dg3.gif";
dg[4]=new Image();dg[4].src="dg4.gif";
dg[5]=new Image();dg[5].src="dg5.gif";
dg[6]=new Image();dg[6].src="dg6.gif";
dg[7]=new Image();dg[7].src="dg7.gif";
dg[8]=new Image();dg[8].src="dg8.gif";
dg[9]=new Image();dg[9].src="dg9.gif";
dgam=new Image();dgam.src="dgam.gif";
dgpm=new Image();dgpm.src="dgpm.gif";

function dotime(){ 
	var d=new Date();
	var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();
	// set AM or PM
	document.ampm.src=((hr<12)?dgam.src:dgpm.src);
	// adjust from 24hr clock
	if(hr==0){hr=12;}
	else if(hr>12){hr-=12;}
	document.hr1.src = getSrc(hr,10);
	document.hr2.src = getSrc(hr,1);
	document.mn1.src = getSrc(mn,10);
	document.mn2.src = getSrc(mn,1);
	document.se1.src = getSrc(se,10);
	document.se2.src = getSrc(se,1);
}
function getSrc(digit,index){
	return dg[(Math.floor(digit/index)%10)].src;
}
window.onload=function(){
	dotime();
	setInterval(dotime,1000);
}
</script>		
		</div>    
		<div class="nav-collapse collapse">
		<p><a href="index.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></></i>&nbsp;Back to Home</a></p>
		</div>			
		<div class="nav-collapse collapse">
		<p><a href="#myModal1"  data-toggle="modal" class="btn btn-info"><i class="icon-search icon-large"></i>&nbsp;Search Books</a></p>
		</div>			
		<div class="login">
			<form class="form-horizontal" method="POST">
			<div class="control-group">
				<div class="log_txt">
						<p><strong>Please Enter the Details Below..</strong></p>
				</div>
					<label class="control-label" for="inputPassword">ID Number: </label>
					<div class="controls">
							<input type="password" name="id" id="id" placeholder="ID Number" required="required"></input>							
					</div>
					</br>
					<div class="controls">	
						<button id="login" name="form_login" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
						<?php echo $msg;?>
						<button id="login" name="form_logout" type="submit" class="btn"><i class="icon-signout icon-large"></i>&nbsp;Logout</button>
						<?php echo $msg;?>
						
					</div>
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
							session_start();
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
 <?php include('search_form1.php'); ?>
