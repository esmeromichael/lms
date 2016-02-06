<?php
								require("dbcon.php");
								$idnum = $_POST['idnum'];
								$password = $_POST['pw'];
								$counter=0;
								$resultxx=mysql_query("select*from accounts");
								while($rowxx=mysql_fetch_array($resultxx))
								{
									if(($rowxx['id_number']==$idnum)&&($rowxx['password']==$password))
									{session_start();
										$counter++;
										if($rowxx['type']=="student")
										{
										
											$_SESSION['idnum']=$rowxx['idnum'];
											$_SESSION['pw']=$rowxx['password'];
											
											
											echo "<script language='javascript' type='text/javascript'> window.alert('Successfully login!'); </script>";
											header('location:borrow.php');
										}
										else if($rowxx['type']=="staff")
										{

											$_SESSION['un']=$rowxx['username'];
											$_SESSION['pw']=$rowxx['password'];
																						
											header('location:dashboard1.php');
										}
									}
								}
								if($counter==0)
								{
									echo'1';
								}
								
								?>
										