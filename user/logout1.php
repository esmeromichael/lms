<html>
<?php		
			error_reporting(E_ALL^E_NOTICE);
			require("session.php");
			require("dbcon.php");
			$id=$_POST['id'];
			$counter=0;			
								
			$resultfirst=mysql_query("select*from id_user where id='$id'");
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
												//echo "<script language='javascript' type='text/javascript'> window.alert('Logout successfully!'); </script>";
												echo"Logout successfully";
												header('Location: index.php');
												session_destroy();
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
				echo"Register first";
				}														
		?>	
</html>