<div id="edit1<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-body">
	<div class="alert alert-info">
	<strong>
	<?php
		$user_query=mysql_query("select * from student
				LEFT JOIN course ON student.crs_id = course.course_id	
				where student.id='$id'")or die(mysql_error());
				while($row=mysql_fetch_array($user_query)){
						$course=$row['course_name'];						
						echo $row['lname'].", ".$row['fname']." " .$course;						
					}
	?>
	</strong>
	</div>
	
	<div>
		<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
		<tr>
			<th>ID NUMBER</th>
            <th>DATE</th>
			<th>TIME IN</th>
			<th>TIME OUT</th>
			<th>PURPOSE</th>                                                                    													
        </tr>	
		<tbody>
		
		</tbody>
		
		 <?php 
			$user_query=mysql_query("select * from user_login
			LEFT JOIN user_logout ON user_login.id_num = user_logout.user_log_id
			LEFT JOIN student ON user_login.id_num=student.id
			where student.id ='$id' ORDER BY user_login.login_date  DESC")or die(mysql_error());
			while($row=mysql_fetch_array($user_query)){
			$id=$row['id_num'];
			$date_in=$row['login_date'];
			$time_in=$row['login_time'];
			$time_out=$row['logout_time'];
			$purpose=$row['purpose'];
		?>		

			<tr class="del">   
			                        					
				<td><?php echo $id; ?></td>
				<td><?php echo $date_in; ?> </td>
				<td><?php echo $time_in; ?> </td>
				<td><?php echo $time_out; ?> </td> 													
				<td><?php echo $purpose; ?></td>
				
			
			</tr>
			<?php
			}
			?>
		</table>
	</div>
			
	
</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
