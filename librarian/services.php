<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_services.php'); ?>

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
										<li class="active"><a href="#myModal1"  data-toggle="modal" class="btn btn-info">
											<i class="icon-search icon-large"></i>&nbsp;Borrow</a>											
										</li>
												<?php include('search_form1.php'); ?>
										<li><a href="s_acc.php">Student</a></li>
										
									
									</ul> 