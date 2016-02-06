<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>
<?php error_reporting(E_ALL ^ E_NOTICE);?>
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
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
		
		if(!preg_match("#[0-9]+#",$_POST["copy"])) {
			$copyErr = "Number is not allowed";
		}

	
	$copy=$_POST['copy'];
	$book_title=$_POST['book_title'];
	$category_id=$_POST['category_id'];
	$author_name=strtolower($_POST['author_name']);
	$publisher_name=strtolower($_POST['publisher_name']);
	$isbn=$_POST['isbn'];
	$copyright_year=$_POST['copyright_year'];
	$acquisition=$_POST['acquisition'];
	$cn=$_POST['call'];	
	
	if(!isset($copyErr))
	{

	$getrow=0;
$result=mysql_query("select*from book_copy");
$getrow=mysql_num_rows($result);
$newgetrow=$getrow+1;


$getrow2=0;
$result4=mysql_query("select*from book_title");
$getrow2=mysql_num_rows($result4);



$c=0;
$access_id=0;
$result2=mysql_query("select*from book_info where category_id='$category_id' and Author='$author_name' and publisher_name='$publisher_name'  and copyright_date='$copyright_year' and isbn='$isbn'");
while($row=mysql_fetch_array($result2))
{
		
	$access_id=$row['access_id'];
	$result2x=mysql_query("select*from book_title where book_title='$book_title' and  access_id='$access_id'  and call_num='$cn'");
	while($rowx=mysql_fetch_array($result2x))
	{
		
		$c++;
		$acc_id=$row['access_id'];
		
	}
	$result2x1=mysql_query("select*from book_copy where access_id='$acc_id'");
	while($rowx1=mysql_fetch_array($result2x1))
	{
		$copyx=$rowx1['copy'];
		$avail=$rowx1['available_no'];
	}
	
}


$getrow3=0;
$result5=mysql_query("select*from book_title where book_title='$book_title' and access_id='$access_id'");
$getrow3=mysql_num_rows($result5);



for($i=1;$i<=$copy;$i++)
{	
	
	$newgetrow2=$getrow2+$i;
//kung gecheck  ang checkbox
if($_POST['borrow']==1)
{
	
	if(($i==1)&&($c==0))
	{
		
		$copysub=$copy-1;
		// insertion to book_copy table
		$sql1 = "INSERT INTO book_copy (access_id,copy,available_no)
		VALUES ('$newgetrow','$copy','$copysub')";
		$result = mysql_query( $sql1);
		
		// insertion to book_title table
		$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
		VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Reserve','$acquisition',now())";
		$result = mysql_query( $sql1);
		
		// insertion to book_info table
		$sql5 = "INSERT INTO book_info  (access_id,category_id,Author,publisher_name,isbn,copyright_date)
		VALUES ('$newgetrow','$category_id','$author_name','$publisher_name','$isbn','$copyright_year')";
		$result = mysql_query( $sql5);

	}
	else
	{
		if($c==0)
		{		
			// insertion to book_title table in defferent access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Available','$acquisition',now())";
			$result = mysql_query( $sql1);
			
		}
		else
		{
			// insertion to book_title table in same access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$acc_id','$newgetrow2','$cn','$book_title','Available','$acquisition',now())";
			$result = mysql_query( $sql1);
			
			
			
		}	
	}
}
else    	//kung ge uncheck  ang checkbox
{
	
	if(($i==1)&&($c==0))
	{
		
		$copysub=$copy-1;
		// insertion to book_copy table
		$sql1 = "INSERT INTO book_copy (access_id,copy,available_no)
		VALUES ('$newgetrow','$copy','N/A')";
		$result = mysql_query( $sql1);
		
		// insertion to book_title table
		$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
		VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Reserve','$acquisition',now())";
		$result = mysql_query( $sql1);
		
		// insertion to book_info table
		$sql5 = "INSERT INTO book_info  (access_id,category_id,Author,publisher_name,isbn,copyright_date)
		VALUES ('$newgetrow','$category_id','$author_name','$publisher_name','$isbn','$copyright_year')";
		$result = mysql_query( $sql5);

	}
	else
	{
		if($c==0)
		{		
			// insertion to book_title table in defferent access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$newgetrow','$newgetrow2','$cn','$book_title','Not Available','$acquisition',now())";
			$result = mysql_query( $sql1);
		}
		else
		{
			// insertion to book_title table in same access id
			$sql1 = "INSERT INTO book_title (access_id,acc_num,call_num,book_title,stat_book,acquisition_id,date_added)
			VALUES ('$acc_id','$newgetrow2','$cn','$book_title','Not Available','$acquisition',now())";
			$result = mysql_query( $sql1);
			
		}
		
		
	}
}




}
//update book_copy tbl

if($c>0)
{
	$copyx=$copyx+$copy;
	$avail=$avail+$copy;
	mysql_query("update book_copy set copy='$copyx', available_no='$avail' where access_id='$acc_id'");
}

echo "<script language='javascript' type='text/javascript'> location.href='books.php' </script>";
}
}

?>	


<body>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">	
		
					<div class="alert alert-info">Add Books</div>
					<p><a href="books.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
					<p><a href="add_category.php"> Add Category </a></p>				
						<div class="addstudent">
						<div class="details">Please Enter Details Below</div>		
						<!--<form class="form-horizontal" method="POST" action="books_save2.php" id="gosubmitid" enctype="multipart/form-data" onsubmit=" return validatecopy();">	-->		
						
						<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form-submitgo" class="form-horizontal" method="post"  onsubmit="return validatecopy2();" >
			
						<div class="control-group">
							<label class="control-label" for="inputBook">Book_title:</label>
							<div class="controls">
							<input type="text" class="span4" id="inputBook" name="book_title"  placeholder="Book Title" required="">
							</div>
						</div>
		
		
								<div class="control-group">
									<label class="control-label" for="inputPassword">Category</label>
										<div class="controls">
											<select name="category_id" id="category_id" class="span4">
												<option></option>
													<?php
														$cat_query = mysql_query("select * from book_category");
														while($cat_row = mysql_fetch_array($cat_query)){
													?>
											<option value="<?php echo $cat_row['category_id']; ?>"><?php echo $cat_row['classname']; ?></option>
														<?php  } ?>
											</select>
										</div>
								</div>
		
		<div class="control-group">
								<label class="control-label" >Author:</label>
									<div class="controls">
										<input type="text"  class="span4" id="author" name="author_name"  placeholder="Lastname Firstname" required="">
									</div>								
		</div>
		

		<div class="control-group">
			<label class="control-label" for="inputPublisher">Publisher Name:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPublisher" name="publisher_name"  placeholder="Publisher Name" required="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputIsbn">Isbn:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputIsbn" name="isbn"  placeholder="ISBN" required="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputYear">Copyright Year:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputYear" name="copyright_year"  placeholder="Copyright Year "pattern="[0-9]{4}" required=""><span id="msg_year"></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="call">Call Number:</label>
			<div class="controls">
			<input type="text" id="call" name="call"  class="span4" placeholder="Call number" required="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputCopy">Copy/s:</label>
			<div class="controls">
			<input type="text" id="inputCopy" name="copy"  class="span4" placeholder="Copy/s" required=""><span id="msg_copy"></span>
			<span class="error">* <?php echo $copyErr;?></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Acquisition:</label>
			<div class="controls">
			<select name="acquisition" id="acquisition" required class="span4">
				<option></option>
								<?php
									$cat_query = mysql_query("select * from acquisition");
														while($cat_row = mysql_fetch_array($cat_query)){
													?>
											<option value="<?php echo $cat_row['acq_id']; ?>"><?php echo $cat_row['acq_name']; ?></option>
														<?php  } ?>
				
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="borrow"></label>
			<div class="controls">
			<label>
			<input type="checkbox" id="borrow" checked='checked' value='1' style="width:00px;" name="borrow"  class="span4" placeholder="Copy/s"/>
			&nbsp;&nbsp;Allow users to borrow 
			</label>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
			<button name="submit"  id="submit"  type="button" onclick="validatecopy();"  class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
			</div>
		</div>
		
		
	<div id="msg-parent">
	<div id="msg-child">
	<div id="msg-header"><span class="icon-remove" onclick="msgclose();"></span></div>
	<div id="msg-body">
	Please check the number of copies...
	<span id="sec-display"></span>
	</div>
	<div id="msg-footer">
	<button class="btn btn-info" name="submit" type="submit"  id="submitgo" >OK</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn" onclick="msgclose();">BACK</span>
	</div>
	</div>
		
		
    </form>					
					</div>		
				</div>		
			</div>
		</div>
    </div>
	
	
	<script type="text/javascript">
	function validatecopy()
	{
					var el1=document.getElementById("msg-parent");
					var el2=document.getElementById("msg-child");
					var subbtn=document.getElementById("submitgo");
					
					var book_title=$('#inputBook').val();
					var category_id=$('#category_id').val();
					var author_name=$('#author').val();
					var publisher_name=$('#inputPublisher').val();
					var isbn=$('#inputIsbn').val();
					var copyright_year=$('#inputYear').val();
					var call=$('#call').val();
					var copy=$('#inputCopy').val();
					var acquisition=$('#acquisition').val();
					var borrow=$('#borrow').val();
			
						if(book_title.length<1)
						{
							$('#inputBook').focus();
						}
						else if(category_id.length<1)
						{
							$('#category_id').focus();
						}
						else if(author_name.length<1)
						{
							$('#author').focus();
						}
						else if(publisher_name.length<1)
						{
							$('#inputPublisher').focus();
						}
						else if(isbn.length<1)
						{
							$('#inputIsbn').focus();
						}
						else if(copyright_year.length<1)
						{
							$('#inputYear').focus();
						}
						else if(call.length<1)
						{
							$('#call').focus();
						}
						else if(copy.length<1)
						{
							$('#inputCopy').focus();
						}
						else if(acquisition.length<1)
						{
							$('#acquisition').focus();
						}
						else if(borrow.length<1)
						{
							$('#borrow').focus();
						}
						else
						{
							if((copyright_year.length==4)&&(Number(copyright_year)>=1))
							{
								if(Number(copy)>=1)
								{
									
									el1.style.mozTransition="all 0.1s linear 0s";
									el2.style.mozTransition="all 0.1s linear 0s";
									el1.style.webkitTransition="all 0.1s linear 0s";
									el2.style.webkitTransition="all 0.1s linear 0s";
									el1.style.transition="all 0.2s linear 0s";
									el2.style.transition="all 0.2s linear 0s";
									el1.style.visibility="visible";
									el2.style.top="0px";	
									$('#msg_copy').hide();
									$('#msg_year').hide();
								}
								else
								{
										$('#inputCopy').focus();
										$('#msg_copy').show();
										$('#msg_copy').html("<span style='color:red;padding:5px;font-size:13px;text-transform:normal;position:absolute;background:#fff;border-radius:4px;'><span class='icon-warning-sign'></span>&nbsp;Not a number! Zeros and negative are not valid!</span>");
										$('#msg_year').hide();
								}
							}
							else
							{
								$('#inputYear').focus();
								$('#msg_copy').hide();
								$('#msg_year').show();
								$('#msg_year').html("<span style='color:red;padding:5px;font-size:13px;text-transform:normal;position:absolute;background:#fff;border-radius:4px;'><span class='icon-warning-sign'></span>&nbsp;4 digits are required to input!</span>");
							}
						}
	}
	
	function msgclose()
	{
					var el1=document.getElementById("msg-parent");
					var el2=document.getElementById("msg-child");
						el1.style.mozTransition="all 0.1s linear 0s";
						el2.style.mozTransition="all 0.1s linear 0s";
						el1.style.webkitTransition="all 0.1s linear 0s";
						el2.style.webkitTransition="all 0.1s linear 0s";
						el1.style.transition="all 0.2s linear 0s";
						el2.style.transition="all 0.2s linear 0s";
						el1.style.visibility="hidden";
						el2.style.top="0px";
	}

	</script>
<?php include('footer.php') ?>