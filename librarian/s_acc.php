<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_acc.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Students Accounts Table</strong>
               </div> 
						<!--  -->
					 <ul class="nav nav-pills"> 
						<li><a href="f_acc.php">Faculty</a></li>										
						<li class="active"><a href="s_acc.php">Student</a></li>
									
					</ul> 
						<!--  -->
						<center class="title">					
						</center>
                            <table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
                                <thead>
                                    <tr>
										<th>Date Register</th>                                                                    
										<th>ID_Number</th>														
										<th> First Name </th>	
										<th>Last Name </th>										
										<th>Password</th>	
										<th class="action">Action</th>									
                                    </tr>
                                </thead>
                                <tbody>								 
                <?php 									
				$user_query=mysql_query("select * from accounts
				LEFT JOIN student ON accounts.id_number = student.id
				where accounts.type='student' ORDER BY accounts.id_number  DESC")or die(mysql_error());
				while($row=mysql_fetch_array($user_query)){
					$id=$row['id_number'];
					$date=$row['date_register'];
					$fname=$row['fname'];
					$lname= $row['lname'];
				?>

				<tr class="del">                              
					
				<td><?php echo $date; ?> </td>                                  					
				<td><?php echo $id; ?></td>
				<td><?php echo $fname; ?> </td>
				<td><?php echo $lname; ?> </td> 									
				<td><?php echo $row['password']; ?></td>
				<td width="100" class="action">
						
				<a rel="tooltip"  title="Change Password" id="e<?php echo $id; ?>" href="#myModal1<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                <?php include('modal_edit_stud_account.php'); ?>
				
				
				</td>
				<?php include('toolttip_edit_delete.php'); ?>					
					
                </tr>
				<?php
					}
				?>
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<div id='view-book-parent'>
		<div id='view-book-child'>
		</div>

</div>

<?php include('footer.php') ?>

