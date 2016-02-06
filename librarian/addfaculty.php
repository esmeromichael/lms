<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">

             <div class="alert alert-info">Add Faculty</div>
			<p><a href="books.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>
	<form class="form-horizontal" method="POST" action="faculty_save.php" enctype="multipart/form-data">



		<div class="control-group">
			<label class="control-label" for="idnumber">ID Number:</label>
			<div class="controls">
			<input type="text" class="span4" id="idnumber" name="IDNumber"  placeholder="ID Number" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputName">First Name:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputName" name="firstname"  placeholder="First Name" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputLname">Last Name:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputLname" name="lastname"  placeholder="Last Name" required>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;ADD</button>
			</div>
		</div>






<?php include('footer.php') ?>