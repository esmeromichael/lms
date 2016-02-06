<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>

<div class="container">
	<div class="margin-top">
		<div class="row">	
			<div class="span12">	
</br>
</br>
</br>
<div class="addstudent">
					<div class="details">Please Enter Details Below</div>
					<div class="bs-docs-example1">
							
							
					<form class="form-horizontal" method="POST" action="lost_save.php">								
					<div class="control-group">
						<label class="control-label" for="inputPassword">Accession number:</label>
						<div class="controls">
						<input type="text" class="span3"  name="acc_num"  placeholder="Accession Number" required="">
							&nbsp;	&nbsp; 	&nbsp; 	&nbsp;
						</div>
						
					</br>
					</br>
					<div class="controls">				
					<button data-placement="right" id="save"  title="Click to Save Your Information" type="submit"  name="submit" class="btn btn-success">
					<i class="icon-save icon-large"></i>&nbsp;Submit</button> </div>
					</div>
			</div>
		</div>

		