<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_acc.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Faculty Accounts Table</strong>
                                </div> 
						<!--  -->
								    <ul class="nav nav-pills"> 
										<li   class="active"><a href="f_acc.php">Faculty</a></li>										
										<li><a href="s_acc.php">Student</a></li>
										
									
									</ul> 
						<!--  -->
						<center class="title">
						
						</center>
                            <table cellpadding="1" cellspacing="1" border="1" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
                                <thead>
                                    <tr>									
										<th>Date Register</th>                                                                    
										<th>ID_Number</th>														
										<th>First Name </th>	
										<th>Last Name </th>
										<th>Password</th>	
										<th>Action</th>											
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
									
								$user_query=mysql_query("select * from accounts
								LEFT JOIN faculty ON accounts.id_number = faculty.id
								where accounts.type='faculty' ORDER BY accounts.id_number  DESC")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['id_number'];
									$date=$row['date_register'];
									$fname=$row['fname'];
									$lname= $row['lname'];
									
				
					//$cat_name=mysql_query("select*from book");
				?>

					<tr class="del">                              
					
					<td><?php echo $date; ?> </td>                                  					
					<td><?php echo $id; ?></td>
					<td><?php echo $fname; ?> </td>
					<td><?php echo $lname; ?> </td> 					
					<td><?php echo $row['password']; ?></td>					 
					<td width="100">						
						<a rel="tooltip"  title="Change Password" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                        <?php include('modal_edit_account.php'); ?>
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

