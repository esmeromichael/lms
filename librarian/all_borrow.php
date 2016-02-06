<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_services.php');?>
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
		</br>
		<div class="login">
		  
		  <div class="bs-docs-example">
			<div class="alert alert-info"><strong><i class="icon-user icon-large"></i>&nbsp;Borrow</strong></div>
		<hr>
		Please Enter the Details Required Below.......
       <hr>
		  
     <form class="form-horizontal" method="POST">
    <div class="control-group">
    <label class="control-label" for="inputEmail"><strong>ID Number:</strong></label>
    <div class="controls">
    <input type="password" name="id" id="id" placeholder="ID Number" required>
    </div>
    </div>
	
	<div class="controls">	
		<button id="login" name="submit" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Submit</button>						
	</div>
				
	<?php
	date_default_timezone_set("Asia/Taipei");
	$timeserver= date('His');

	$gettime_server=mysql_query("select * from borrow_time")or die(mysql_error());
	$gettime=mysql_fetch_array($gettime_server);
	
	$explode1=explode(':',$gettime['borrow_start']);
	$explode2=explode(':',$gettime['borrow_due']);
	$start=$explode1[0].$explode1[1].$explode1[2];
	$end=$explode2[0].$explode2[1].$explode2[2];

?>								
<script type="text/javascript">
var x=0;
var dyt= new Date();
var min= dyt.getMinutes();
var sec= dyt.getSeconds();
var hr= dyt.getHours();
</script>
<?php
	if (isset($_POST['submit']) && ($_POST['id'])){ 
	$id=$_POST['id'];
	
	if(mysql_num_rows($result=mysql_query("SELECT * FROM `student` WHERE id='".$_POST['id']."'"))>0) {
	$row=mysql_fetch_array($result);	
		if(($timeserver>=$start)&&($timeserver<=$end))
		{
		$id=$row['id'];
		$_SESSION['id_borrow']=$id;
		echo "<br>";
		echo '<script>
		window.location="student_borrow.php";
		</script>';	
		}
		else
		{
		echo"You cant borrow this time.. Try again later.";
		}
	}
	
	else if(mysql_num_rows($result2=mysql_query("SELECT * FROM `faculty` WHERE id='".$_POST['id']."'"))>0) {
	$row2=mysql_fetch_array($result2);	
		$id=$row2['id'];
		$_SESSION['id_borrow1']=$id;
		echo "<br>";
		echo '<script>
		window.location="serv_faculty.php";
		</script>';	
		}
	else
		{
	?>
	<script>
	window.alert('Please check your Id Number!');		
	</script>
	<?php
		}
	}
	?>	
	</form>
</div>	
</div>
</div>
</div>
</div>
