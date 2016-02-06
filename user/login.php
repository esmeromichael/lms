<?php
	include('session.php');
	$id_number=$_POST['id_number'];
	
	$password=$_POST['password'];
	$login_query=mysql_query("select * from accounts where id_number='$id_number' and password='$password' and type='faculty'")or die(mysql_error());
	$row=mysql_fetch_array($login_query);	
	$login_query1=mysql_query("select * from accounts where id_number='$id_number' and password='$password' and type='student'")or die(mysql_error());
	$count1=mysql_num_rows($login_query1);
	$count=mysql_num_rows($login_query);
	
	$id=$row['user_id'];
	
	if ($count > 0){
	
	$_SESSION['id']=$id;
		echo "<br>";
		echo '<script>
	window.location="borrow_faculty.php";
	</script>';	
	}
	
	else if($count1 == 1){ 
		echo "<br>";
echo '<div class="alert alert-danger">You are not student.</div>';
	
	 }
	 
	 
	 else{ 
	echo "<br>";
echo '<div class="alert alert-danger"><strong>Access Denied!</strong> Please Check your ID Number and Password.</div>';	
	
	}
	
	?>