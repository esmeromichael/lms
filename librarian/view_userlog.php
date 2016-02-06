<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_member.php'); 
$id=$_GET['id'];?>
<div class="container">
	<div class="margin-top">
	<div class="row">
	<div class="span12">
		<div class="alert alert-info">
        </div>
	</div>	
	<div class="span1">
			<p><a href="student.php" class="btn btn-success"><i></i>&nbsp;Back</a></p>
	</div>
	<div class="span10">
	<?php
		$user_query=mysql_query("select * from student
		LEFT JOIN course ON student.crs_id = course.course_id				
		where student.id='$id'")or die(mysql_error());
		while($row=mysql_fetch_array($user_query)){
		$fname=$row['fname'];
		$lname=$row['lname'];
		$course=$row['course_name'];
		}													
	 ?>
	<label><strong>&nbsp;Student Name : </strong><u>  <?php echo $lname.", ".$fname?> </u>
	 <strong>&nbsp;Course : </strong> <u> <?php echo $course?> </u></label>
	 </br>
		<table cellpadding="1" cellspacing="5" border="1" class="table  table-bordered" id="example">
		<div class="pull-right">
			<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
		</div>
		<thead>	
             <tr>
				<th>Date </th>
				<th>Time-in</th>                                 
                <th>Time-out</th>                                 
                <th>Purpose</th>
						
             </tr>
           </thead>
		   <?php
		  $user_query=mysql_query("select * from student
				LEFT JOIN user_login ON student.id = user_login.id_num	
				LEFT JOIN user_logout ON user_login.user_login_id= user_logout.user_log_id
				where user_login.id_num='$id'")or die(mysql_error());
				while($row=mysql_fetch_array($user_query)){
			
			?>
		   
		   <tbody>
			<tr class="del<?php echo $id ?>">
			
			<td><?php echo $row['login_date']; ?> </td>
			<td><?php echo $row['login_time']; ?> </td>
			<td><?php echo $row['logout_time']; ?> </td>
			<td><?php echo $row['purpose']; ?> </td>
		
		   </tbody>
		   
		   <?php
		   }
		   ?>
		   
	</div>

	</div>
	</div>
</div>


</table>