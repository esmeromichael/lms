<?php
	require("dbcon.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$counter=0;
			
		$resultxx=mysql_query("select*from accounts");
		while($rowxx=mysql_fetch_array($resultxx))
			{
			if(($rowxx['username']==$username)&&($rowxx['password']==$password))
				{
				session_start();
				$counter++;
				
					if($rowxx['type']=="student")
						{										
						$_SESSION['username']=$rowxx['username'];
						$_SESSION['password']=$rowxx['password'];
						$_SESSION['id']=$rowxx['id'];
											
											
							 $user_query=mysql_query("select * from accounts
									LEFT JOIN student ON accounts.id = student.id
									where accounts.username='$username'")or die(mysql_error());
									while($row=mysql_fetch_array($user_query))
									{
									
									$crs=$row['crs_id'];
									$id=$row['id'];
									
									mysql_query("insert into user_login (id_num,course_id,login_date)
									values('$id','$crs',NOW())")or die(mysql_error());
															
									header('location:borrow.php');
									}								
						}
					else if($rowxx['type']=="faculty")
						{
						$_SESSION['username']=$rowxx['username'];
						$_SESSION['password']=$rowxx['password'];
						$_SESSION['id']=$rowxx['id'];											
									header('location:dashboard2.php');
										}
									}
								}
								if($counter==0)
								{
									echo'1';
								}
								
								?>
										