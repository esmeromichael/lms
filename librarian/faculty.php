<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_member.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;List of Faculty</strong>
                                </div>
						
						
						<center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
								<p><a href="addfaculty1.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Faculty</a></p>							
								
                                <thead>
                                    <tr>
										<th>Date </th>
									    <th>ID Number</th>                                 
                                        <th>Firstname</th>                                 
                                        <th>Lastname</th>
										
										
										<th class="action">Action</th>		
                                    </tr>
                                </thead>
                                
                       
							 
                                  <?php  $user_query=mysql_query("select * from faculty" )or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['id'];  ?>
									<tr class="del<?php echo $id ?>">
									
									
									<td><?php echo $row['d']; ?> </td>
									<td><?php echo $row['id']; ?> </td>                            
                                    <td><?php echo $row['fname']; ?></td>
								    <td><?php echo $row['lname']; ?></td>
								
									
								<?php include('toolttip_edit_delete.php'); ?>
                                <td width="100">
                                    <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#deletelistFaculty<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                <?php include('deletelist_faculty_modal.php'); ?>
								
								<a rel="tooltip"  title="Edit Member Info" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
								<?php include('modal_edit_faculty.php'); ?>
										
                                    </td>
									
                                    </tr>
								
									<?php  }  ?>
							
							
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>