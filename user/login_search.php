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
				<?php
				error_reporting(E_ALL^E_NOTICE);
				if(isset($_POST['form_login']) && isset($_POST['id'])) {
					require('dbcon.php');
					if(mysql_num_rows($result1=mysql_query("SELECT * FROM `student` WHERE id='".$_POST['id']."'"))>0) {
						$row1=mysql_fetch_array($result1);
						
						mysql_query("INSERT INTO `research_log` (id_num, course_id, date, time, purpose, status) VALUES ('".$row1['id']."', '".$row1['crs_id']."', now(), now(), 'Research', 'Login')")
							or die('Error logging in...'.mysql_error());
							
						$insertid=mysql_insert_id();
						if(!isset($_SESSION))
							session_start();
						$_SESSION['last_insert_id']=$insertid;
						$_SESSION['student_id']=$row1['id'];
						$msg='You are logged in';
					}
					else {
						echo "ID # is not a student.";
					}
				}
				elseif(isset($_POST['form_logout'])) {
					require('dbcon.php');
					if(!isset($_SESSION))
						session_start();
						
					if(isset($_SESSION['last_insert_id']) && isset($_SESSION['student_id'])) {
						if($result1=mysql_query("SELECT * FROM `research_log` WHERE id='".$_SESSION['last_insert_id']."'")) {
							$row1=mysql_fetch_array($result1);					
							
						mysql_query("INSERT INTO `research_log` (id_num, course_id, date, time, purpose, status) VALUES ('".$row1['id_num']."', '".$row1['course_id']."', now(), now(), 'Research', 'Logout')")
							or die('Error logging out...'.mysql_error());
							
						}
						unset($_SESSION['last_insert_id']);
						unset($_SESSION['student_id']);
						
						$msg='You are logged out.';
					}
				}?>
				<?php if(!isset($_SESSION)) session_start();?>
				<?php if(isset($_SESSION['student_id'])) {?>
					<div class="log_txt">
						<p><strong>Research</strong></p>
					</div>
					<?php echo $msg;?>
					<div class="controls">
						<button id="login" name="form_logout" type="submit" class="btn"><i class="icon-signout icon-large"></i>&nbsp;Logout</button>
					</div>
				<?php } else {?>
					<div class="log_txt">
						<p><strong>Please Enter the Details Below..</strong></p>
					</div>
					<?php echo $msg;?><br>
					<label class="control-label" for="inputPassword">ID Number: </label>
					<div class="controls">
						<input type="password" name="id" id="id" placeholder="ID Number" required="required"></input>
						<br><br><button id="login" name="form_login" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
					</div>
				<?php }?>
				</div>
			</form>
		</div>
		
			<!--div class="control-group">
				<div class="controls">
					<button id="login" name="form_login" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
				</div>
			</div-->
								
			
			
			<?php
			/*if (isset($_POST['submit']))
			{
			error_reporting(E_ALL^E_NOTICE);
			require("dbcon.php");
			$id = $_POST['id'];
			session_start();
			$_SESSION['idxxx']=$id;
			$resultfirst=mysql_query("select*from id_user where id='$id' and user_type='student'");
			$count = mysql_num_rows($resultfirst);
			
				if($count>0)
				{
					$resultxx=mysql_query("select*from id_user where user_type='student'");
						while($rowxx=mysql_fetch_array($resultxx))
						{
							if($rowxx['id']==$id)
							{
							
								$resultx1=mysql_query("select*from user_login where id_num='$id' and stat_login='Login'");
								$count = mysql_num_rows($resultx1);
								if($count>0)
								{
								echo "Already login click Logout button to log-out.";
								}
								//$counter++;
								else
								{
								if($rowxx['user_type']=="student")
									{										
									$_SESSION['id']=$rowxx['id'];
								
									$user_query=mysql_query("select * from id_user
											LEFT JOIN student ON id_user.id = student.id
											where student.id='$id'")or die(mysql_error());
										
										while($row=mysql_fetch_array($user_query))
										{
										$crs=$row['crs_id'];
										$id=$row['id'];
									
										mysql_query("insert into user_login (id_num,course_id,login_date,login_time,stat_login,purpose)
										values('$id','$crs',NOW(),NOW(),'Login','research')")or die(mysql_error());
										echo "<script language='javascript' type='text/javascript'> window.alert('Successfully login!'); </script>";	
													
										}								
									}		
								}	
							}
						}								
				}
				
				else
				{
				echo"Please check your ID Number..";
				}*/
				/*$datenow=date("Y-m-d");
			
			$stud_yes1=0;
			$stud_yes2=0;
			$stud_login=0;
			$resultfirst=mysql_query("select*from student where id='$id'");
			$count = mysql_num_rows($resultfirst);
			while($resultfirstrow=mysql_fetch_array($resultfirst))
			{	
				$resultfirst2=mysql_query("select*from user_login where id_num='$id'");
				while($resultfirstrow2=mysql_fetch_array($resultfirst2))
				{
					$crs=$resultfirstrow['crs_id'];
					//$explode=explode('-',$row['login_date']);
					//$explode1=$explode[2];
					
						if($row['login_date']==$datenow)
						{
								$stud_login++;
					
						}
						
						if($resultfirstrow2['stat_login']=="DONE")
						{
							$stud_yes1++;
						}
						else if($resultfirstrow2['stat_login']=="Login")
						{
							$stud_yes2++;
						}
				}
			}
				
			if($stud_login==0)
			{
				if($stud_yes1>0)
				{
									mysql_query("insert into user_login (id_num,course_id,login_date,login_time,stat_login,purpose)
										values('$id','$crs',NOW(),NOW(),'Login','research')")or die(mysql_error());
										echo "Successfully login!";
				}
				else if($stud_yes2>0)
				{phpmyadmin
				
							mysql_query("insert into user_login (id_num,course_id,login_date,login_time,stat_login,purpose)
										values('$id','$crs',NOW(),NOW(),'Login','research')")or die(mysql_error());
										echo "Successfully login!";		
							mysql_query("insert into id_user (id,user_type)
										values('$id','student')")or die(mysql_error());
			
				}
			}
			else
			{
				
				echo "Already login click Logout button to log-out.";
			}
			
				
				
				
			}
			
			else if (isset($_POST['submit1']))
			{
			error_reporting(E_ALL^E_NOTICE);
			require("session.php");
			require("dbcon.php");
			$id=$_POST['id'];
			$counter=0;
											
			$resultfirst=mysql_query("select*from id_user where id='$id' and user_type='student'");
			$count = mysql_num_rows($resultfirst);
				if($count>0)
				{
				$resultxx=mysql_query("select*from id_user where user_type='student'");
				while($rowxx=mysql_fetch_array($resultxx))
					{
					if($rowxx['id']==$id)
						{
						$resultx1=mysql_query("select*from user_login where id_num='$id' and stat_login='Login'");
						$count = mysql_num_rows($resultx1);
						if($count>0)
							{							
							if($rowxx['user_type']=="student")
									{																												
											$user_query=mysql_query("select * from user_login
											LEFT JOIN student ON user_login.id_num = student.id
											where user_login.id_num='$id'")or die(mysql_error());
											while($row=mysql_fetch_array($user_query))
											{
											$user=$row['user_login_id'];
											$crs=$row['crs_id'];
												mysql_query("insert into user_logout (user_log_id,id_num,course_id,logout_date,logout_time)
												values('$user','$id','$crs',NOW(),NOW())")or die(mysql_error());
												mysql_query("UPDATE user_login SET stat_login='DONE' WHERE id_num='$id'");
												echo "<script language='javascript' type='text/javascript'> window.alert('Logout successfully!'); </script>";
												
												
											}								
									}
							}								
						else
							{
								echo"login first";										
							}									
						}			
					}
				}
				else
				{
				echo"Please check your ID Number!!!";
				}
			}*/
			?>
	</div>		
	</div>
	
	</div>
   	
	
	 <?php include('search_form1.php'); ?>
						
	
