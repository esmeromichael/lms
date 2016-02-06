      <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->
					<ul class="nav" id="menu">
					<li><a href="dashboard1.php"><i class="icon-home icon-large"></i>&nbsp;Home</a></li>
					<li><a href="f_acc.php"><i class="icon-group icon-large"></i>&nbsp;Accounts</a></li> 
					<?php 
					include('dropdownlist.php');
					?>
					<?php 
					include('dropdown.php');
					?>
					<!--<li><a href="services.php"><i class="icon-book icon-large"></i>&nbsp;Services</a></li> -->

					<li><a href="books.php"><i class="icon-book icon-large"></i>&nbsp;Book Details</a></li>
					<li><a href="view_borrow.php"><i class="icon-book icon-large"></i>&nbsp;Return Books</a></li>
					<?php 
					include('dropdown_reports.php');
					?>
					<!--<li><a href="fines.php"><i class="icon-cog icon-large"></i>&nbsp;Settings</a></li> -->					
					<?php 
						include('set_logout.php');
					?>
					</ul>

					 <div class="pull-right">
						<div class="admin">						
							Librarian					
						</div>
                     </div>
					 
                    </div>
                </div>
            </div>
        </div>
		
<?php include('search_form.php'); ?>
 
