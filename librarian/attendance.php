<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_reports.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-book icon-large"></i>&nbsp;</strong>
               </div> 
			   <!--  -->
				
			</div>
			<div class="span1">
			
			</div>
			<div class="span10">
			   <!--  -->
				<center class="title">
				<label></label>
				</br>
				</br>
				</center>
                <table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="example">
				<div class="pull-right">								
				<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
				</div>	
                <thead>
                    <tr>
					<th>MONTH</th>
					<?php
					$headertbl=mysql_query("select*from course");
					$countCourse=mysql_num_rows($headertbl);
					$x=0;
					while($hedeartbl_row=mysql_fetch_array($headertbl))
					{
						echo"<th> <center>".$hedeartbl_row['course_name']."</center></th>";
						$array_id[$x]=$hedeartbl_row['course_id'];
					}
					echo"<td>TOTAL</td>";
					$month=array("January","February","March","April","May","June","July","August","September","October","November","December");
					?>
                    </tr>
                </thead>
                <tbody>
				<?php
				$z=0;
				$jan='-01-';
				echo"<tr>";
				echo"<td>January</td>";
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%$jan%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayjan[$z]=$count;
					$z++;
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayjan[$i];
						echo"<td><center>".$arrayjan[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
				echo"</tr>";
					
					
				$z=0;
				echo"<tr>";
				echo"<td>February</td>";
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-02-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayfeb[$z]=$count;
					$z++;	
				}	
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayfeb[$i];
						echo"<td><center>".$arrayfeb[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
				echo"</tr>";
				
				echo"<tr>";
				echo"<td>March</td>";
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-03-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arraymarch[$z]=$count;
					$z++;
				}
				
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arraymarch[$i];
						echo"<td><center>".$arraymarch[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
				echo"</tr>";
				echo"<tr>";
				echo"<td>April</td>";
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-04-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayapril[$z]=$count;
					$z++;
				
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayapril[$i];
						echo"<td><center>".$arrayapril[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
				echo"</tr>";
				
				
				echo"<tr>";
				echo"<td>May</td>";
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-05-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arraymay[$z]=$count;
					$z++;

					
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arraymay[$i];
						echo"<td><center>".$arraymay[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
				echo"</tr>";
				
				
				echo"<tr>";
				echo"<td>June</td>";
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-06-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayjune[$z]=$count;
					$z++;

				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayjune[$i];
						echo"<td><center>".$arrayjune[$i]."</center></td>";
					}
					echo"<td> ".$subtotal."</td>";
					echo"</tr>";
					
					
					echo"<tr>";
					echo"<td>July</td>";
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-07-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayjuly[$z]=$count;
					$z++;
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayjuly[$i];
						echo"<td><center>".$arrayjuly[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
					echo"</tr>";
					
					
				echo"<tr>";
				echo"<td>August</td>";	
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-08-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayaug[$z]=$count;
					$z++;
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayaug[$i];
						echo"<td><center>".$arrayaug[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
					echo"</tr>";
					
					
				echo"<tr>";
				echo"<td>September</td>";	
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-09-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arraysep[$z]=$count;
					$z++;
				
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arraysep[$i];
						echo"<td><center>".$arraysep[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
					echo"</tr>";
					
					echo"<tr>";
					echo"<td>October</td>";	
					
				$z=0;
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-10-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arrayoct[$z]=$count;
					$z++;
				
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arrayoct[$i];
						echo"<td><center>".$arrayoct[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
					echo"</tr>";
				$z=0;
					echo"<tr>";
					echo"<td>November</td>";
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-11-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arraynov[$z]=$count;
					$z++;
					
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arraynov[$i];
						echo"<td><center>".$arraynov[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
					echo"</tr>";
				
				$z=0;
				echo"<tr>";
				
					echo"<td>December</td>";
				$search=mysql_query("select*from course");
				while($searchrow=mysql_fetch_array($search))
				{
					$search2=mysql_query("select*from user_login where course_id='$searchrow[course_id]' and login_date like'%-12-%' group by id_num");
					$count=mysql_num_rows($search2);
					$arraydec[$z]=$count;
					$z++;
					
				
					
				}
					$subtotal=0;
					for($i=0;$i<$countCourse;$i++)
					{
						$subtotal=$subtotal+$arraydec[$i];
						echo"<td><center>".$arraydec[$i]."</center></td>";
					}
					echo"<td>".$subtotal."</td>";
				echo"</tr>";
				?>
				</tbody>
                </table>
				
					
			</div>		
			</div>
		</div>
<div id='view-book-parent'>
		<div id='view-book-child'>
		</div>
</div>

<?php include('footer.php') ?>

