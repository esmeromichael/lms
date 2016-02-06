<?php
	require("dbcon.php");
	$id = $_POST['id'];
	$counter=0;
			
		$resultxx=mysql_query("select*from id_user");
		while($rowxx=mysql_fetch_array($resultxx))
			{
			if($rowxx['id']==$id)
				{
				session_start();
				$counter++;
				
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
									
									mysql_query("insert into user_login (id_num,course_id,login_date)
									values('$id','$crs',NOW())")or die(mysql_error());
															
									header('location:borrow.php');
									}								
						}
					else if($rowxx['type']=="faculty")
						{
						$_SESSION['un']=$rowxx['username'];
						$_SESSION['pw']=$rowxx['password'];
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
										