<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_set_logout.php'); ?>
	<div class="container">
		<div class="margin-top">
		<div class="row">
			<div class="span1">
			</div>
			<div class="span10">	
			   <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Admin Accounts</strong>
               </div>
			        
					<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
					</br>
					 <thead>
                        <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Position</th>								
                            <th>Username</th>                                 
                            <th>Password</th>									
							<th class="action"><center>Action</center></th>		
                        </tr>
                    </thead>	
						<?php 
						
						$user_query=mysql_query("select * from `acc_admin` " )or die(mysql_error());
						while($row=mysql_fetch_array($user_query)){
						$id=$row['user_id'];
						$fname=$row['firstname'];
						$lname=$row['lastname'];
						$p=$row['position'];
						$un=$row['username'];
						$pw=$row['password'];
						?>
						<tr class="del">
							<td> <?php echo $fname;?></td>
							<td> <?php echo $lname;?></td>
							<td> <?php echo $p;?></td>
							<td> <?php echo $un;?></td>
							<td> <?php echo $pw;?></td>
							<td width="100">	
								<center>
								<a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#admin<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
								<?php include('modal_edit_admin.php'); ?>
								</center>
							</td>
						</tr>
						<?php
						}
						?>
					</table>

			</div>
		</div>
		</div>
	</div>