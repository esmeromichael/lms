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
				<li><a href="view_borrow.php">Student</a></li>										
				<li  class="active"><a href="fac_brw_book.php">Faculty</a></li>																												
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
				<th>View</th>
				</tr>
				<tbody>
                
				<?php
				$query1=mysql_query("select * from faculty_borrow where status='Pending'") or die (mysql_error());
				$count=mysql_num_rows($query1);			

				if($count>0) {				
				$user_query=mysql_query("select * from faculty_borrow
				LEFT JOIN faculty ON faculty_borrow.id_number = faculty.id			
				where faculty_borrow.status='Pending'
				GROUP BY faculty_borrow.id_number")or die(mysql_error());
				while($row=mysql_fetch_array($user_query))
				{
						$id=$row['id_number'];
						$_SESSION['id_number']=$id;

				?>			
				<tr class="del<?php echo $id ?>">
				<td><?php echo $row['id_number']; ?> </td>                            
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>	                                               
                <td width="150">
                <a class="btn btn-primary" title="View" href="fac_borrow.php<?php echo '?id='.$id; ?>"><i class="icon-list icon-large"></i></a>										
                </td>
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
				<?php				
				}
				?>	
			</table>
	</div>
	</div>
</div>
</div>