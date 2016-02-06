<?php include('header.php'); ?>
<?php include('navbar_borrow.php');
session_start();
 ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">
					<div class="sti">
						<!--img src="../LMS/E.B. Magalona.png" class="img-rounded"-->
					</div>
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
					</br>
					</br>
				<div class="login">
				<div class="log_txt">
				<p><strong>Please Enter the Details Below..</strong></p>
				</div>
						<form class="form-horizontal" method="POST" action="">
								<div class="control-group">
									<label class="control-label" for="inputEmail">ID Number :</label>
									<div class="controls">
									<input type="text" name="id_number" id="inputEmail" placeholder="ID Number" required>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail">Password :</label>
									<div class="controls">
									<input type="text" name="password" id="inputEmail" placeholder="Password" required>
									</div>
								</div>

								<div class="control-group">
									<div class="controls">

							<button data-placement="right" id="save"  title="Click to Login" type="submit" name="login" class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
							<a href="account.php">Create Account</a>
							</div>
								</div>
								<div id="res"></div>
<script type="text/javascript">
var x=0;
var dyt= new Date();
var min= dyt.getMinutes();
var sec= dyt.getSeconds();
var hr= dyt.getHours();
/*
setInterval(function(){
$.post('running_time.php',{min:min,hr:hr,sec:sec},function(data){
$('#running_timeon').html(data);
});
},1000);*/
</script>

<?php
	if (isset($_POST['login'])){

		ini_set('date.timezone', 'Asia/Manila');
		$time_now = date("H:i:s", time());

		$id_number=$_POST['id_number'];
		$password=$_POST['password'];

		if(($time_now >= "12:58:00") && ($time_now <= "16:30:00")){

			$login_query=mysql_query("select * from accounts where id_number='$id_number' and password='$password' and type='student'")or die(mysql_error());
			$row=mysql_fetch_array($login_query);
			$count=mysql_num_rows($login_query);

			$id=$row['id_number'];

			if ($count > 0){
				$_SESSION['id_borrow']=$id;
					echo "<br>";
					echo '<script>
				window.location="borrow1.php";
				</script>';
			}
			else{
			echo "<br>";
			echo '<div class="alert alert-danger"><strong>Access Denied!</strong>Please Check your ID Number and Password.</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger"><strong>You cannot borrow!</strong>Its cut off time!</div>';
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