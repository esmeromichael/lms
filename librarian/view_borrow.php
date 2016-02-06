<?php include('header.php'); ?>
<?php include('navbar_borrow.php');?>
<?php error_reporting(E_ALL^E_NOTICE);
?>
    
<div class="container">
<div class="margin-top">
	<div class="row">	
	<div class="span12">	
		<div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="icon-user icon-large"></i>&nbsp;Students</strong>
        </div> 
		<!--  -->
			<ul class="nav nav-pills"> 
				<li   class="active"><a href="#">Student</a></li>										
				<li><a href="fac_brw_book.php">Faculty</a></li>																												
			</ul> 
			
			<center class="title">
				<h1>Books List</h1>
			</center>
			
			<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
			<div class="pull-right">
			<thead>
				<tr>
				<th>ID Number</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Course</th>
				<th><center>View</center></th>
				</tr>
				<tbody>
                
				<?php
				$query1=mysql_query("select * from borrow_info where borrow_stat='Pending'") or die (mysql_error());
				$count=mysql_num_rows($query1);	
				
				if($count>0) {
				$user_query=mysql_query("select * from borrow_info
				LEFT JOIN student ON borrow_info.id_number = student.id
				LEFT JOIN course ON student.crs_id=course.course_id 
				where borrow_info.borrow_stat='Pending'
				GROUP BY borrow_info.id_number")or die(mysql_error());
				while($row=mysql_fetch_array($user_query))
				{
						$id=$row['id_number']; 		
				?>			
				<tr class="del<?php echo $id ?>">
				<td><?php echo $row['id_number']; ?> </td>                            
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>	
                <td><?php echo $row['course_name']; ?></td>	                                  
                <td width="150"> <center>
                <a class="btn btn-primary" title="View" href="borrowed_books.php<?php echo '?id='.$id; ?>"><i class="icon-list icon-large"></i></a>										
                </center></td>
                </tr>								
				<?php  }  
				}
				else
				{
				?>
				<td> No Records Available </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<?php
				}
				?>	
			</table>
	</div>
	</div>
</div>
</div>