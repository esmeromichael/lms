<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_setting.php'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
	if (isset($_POST['submit'])&& $_SERVER["REQUEST_METHOD"] == "POST") {
		include('dbcon.php');
		session_start();
		
		 if (empty($_POST["cat"])) {
		 $catErr = "Firstname is required";
	   }
		elseif(preg_match("#[0-9]+#",$_POST["cat"])) {
			$catErr = "Number is not allowed";
		}
	   else {
		 $cat = test_input($_POST["cat"]);
		 // check if name only contains letters and whitespace
		 if (!preg_match("/^[a-zA-Z ]*$/",$cat) && !isset($catErr)) {
		   $catErr = "Only letters and white space allowed";
		 }
	   }
	
	$cat=$_POST['cat'];
	
	if(!isset($catErr)) {
		mysql_query("insert into book_category(classname) 
		values('$cat')")or die(mysql_error());
		//echo "Saved";
	}
	}
?>


 <div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">	
					
					 <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-cog icon-large"></i>&nbsp;Settings</strong>
					</div> 
					
					
								
						<!--  -->
								    <ul class="nav nav-pills">
										<li><a href="fines.php">Fines</a></li>									
										<li><a href="set_books.php">Books</a></li>
										<li><a href="add_course.php">Add Course</a></li>
										<li class="active"><a href="add_category.php">Add category</a></li>
										<li><a href="draft1.php">Borrow Time Settings</a></li>
									</ul> 
						</br>
						</br>
						</br>
   
						<div class="addstudent">
						<div class="details">Please Enter Details Below</div>		
							<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
						<div class="control-group">
							<label class="control-label" for="inputEmail">Book Category:</label>
							<div class="controls">
							<input type="text" class="span4" id="inputEmail" name="cat"  placeholder="Category" required>
							<span class="error">* <?php echo $catErr;?></span>
							</div>
						</div>
		
		

		
		
						<div class="control-group">
							<div class="controls">
							<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
							</div>
						</div>
						</form>					
					</div>		
				</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>