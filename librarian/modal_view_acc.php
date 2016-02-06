	<div id="view<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit Student Basic Information</strong></div>
	
	<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
			<thead>
             <tr>
				<th>Date </th>
				<th>Time-in</th>                                 
                <th>Time-out</th>                                 
                <th>Purpose</th>
						
             </tr>
            </thead>
			
			<tbody>
			<?php
			$user_query=mysql_query("select * from user_login" )or die(mysql_error());
				while($row=mysql_fetch_array($user_query)){
				$date1=$row['login_date'];
				$time1=$row['login_time'];
				$p=$row['purpose'];
				
				}
				
				
					$cat_query = mysql_query("select * from course where course_id = '$course_id'")or die(mysql_error());
						while($cat_row=mysql_fetch_array($cat_query))
						{
							$ncat=$cat_row['course_name'];
											
											}
			?>
			</tbody>
			
	
	
		</table>
		<?php		
		
		?>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
		</div>
	</div>
    
	
	