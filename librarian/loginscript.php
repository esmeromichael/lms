<?php
								require("dbcon.php");
								$username = $_POST['un'];
								$password = $_POST['pw'];
								$counter=0;
								$resultxx=mysql_query("select*from acc_admin");
								while($rowxx=mysql_fetch_array($resultxx))
								{
									if(($rowxx['username']==$username)&&($rowxx['password']==$password))
									{session_start();
										$counter++;
										if($rowxx['type']=="admin")
										{
										
											$_SESSION['un']=$rowxx['username'];
											$_SESSION['pw']=$rowxx['password'];
											$_SESSION['id']=$rowxx['user_id'];
											
											header('location:dashboard1.php');
										}
										else if($rowxx['type']=="staff")
										{

											$_SESSION['un']=$rowxx['username'];
											$_SESSION['pw']=$rowxx['password'];
											$_SESSION['id']=$rowxx['user_id'];		
											
											header('location:staff_dashboard.php');
											
										}
										else
										{
										window.alert('Please check your id number and password');
										}
									}
								}
								if($counter==0)
								{
									echo'1';
								}
								
								?>
										