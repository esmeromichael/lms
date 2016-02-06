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
									
									mysql_query("insert into user_login (id_num,course_id,login_date,login_time,stat_login)
									values('$id','$crs',NOW(),NOW(),'Login')")or die(mysql_error());
									echo "<script language='javascript' type='text/javascript'> window.alert('Successfully login!'); </script>";
									echo "<script language='javascript' type='text/javascript'> location.href='borrow.php' </script>";
									}								
								}
								
								else if($rowxx['type']=="faculty")
								{
								$_SESSION['username']=$rowxx['username'];
								$_SESSION['password']=$rowxx['password'];
								$_SESSION['id']=$rowxx['id'];											
									echo "<script language='javascript' type='text/javascript'> location.href='dashboard2.php' </script>";
									echo "<script language='javascript' type='text/javascript'> location.href='borrow_fac.php' </script>";
								}
									}
								}
								if($counter==0)
								{
									echo'1';
								}
								
								
								
							?>