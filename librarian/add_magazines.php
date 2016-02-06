<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); 
require_once('calendar/classes/tc_calendar.php'); ?>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>

<?php
	
		
	if (isset($_POST['submit'])) {
		$copy=$_POST['copy'];
		$pub=$_POST['pub'];
		$magazine_name=$_POST['magazine_name'];
		$date=$_POST['date'];
		$getrow=0;
			
		$result=mysql_query("select*from magazines_copy");
		$getrow=mysql_num_rows($result);
		$newgetrow=$getrow+1;


		$getrow2=0;
		$result4=mysql_query("select*from magazines");
		$getrow2=mysql_num_rows($result4);



		$c=0;
		$access_id=0;
		$result2=mysql_query("select*from magazines_info where date_issue='$date'");
		while($row=mysql_fetch_array($result2))
		{
		
		$access_id=$row['access_id'];
		
		$result2x=mysql_query("select*from magazines where title='$magazine_name' and  access_id='$access_id'");
		while($rowx=mysql_fetch_array($result2x))
		{
		
		$c++;
		$acc_id=$row['access_id'];		
		}
		
		$result2x1=mysql_query("select*from magazines_copy where access_id='$acc_id'");
		while($rowx1=mysql_fetch_array($result2x1))
		{
		$copyx=$rowx1['copy'];
	//	$avail=$rowx1['available_no'];
		}
	
		}


	$getrow3=0;
	$result5=mysql_query("select*from magazines where title='$magazine_name' and access_id='$access_id'");
	$getrow3=mysql_num_rows($result5);

	for($i=1;$i<=$copy;$i++)
	{	
	
	$newgetrow2=$getrow2+$i;	
	if(($i==1)&&($c==0))
	{	
		$sql1 = "INSERT INTO magazines_copy (access_id,copy)
		VALUES ('$newgetrow','$copy')";
		$result = mysql_query( $sql1);
		
		$sql1 = "INSERT INTO magazines (access_id,magazine_id,title,pub_name,status)
		VALUES ('$newgetrow','$newgetrow2','$magazine_name','$pub','Available')";
		$result = mysql_query( $sql1);
		
		$sql5 = "INSERT INTO magazines_info  (access_id,date_added,date_issue)
		VALUES ('$newgetrow',NOW(),'$date')";
		$result = mysql_query( $sql5);

	}
	else
	{
		if($c==0)
		{		
			$sql1 = "INSERT INTO magazines (access_id,magazine_id,title,pub_name,status)
			VALUES ('$newgetrow','$newgetrow2','$magazine_name','$pub','Available')";
			$result = mysql_query( $sql1);
			
		}
		else
		{
			$sql1 = "INSERT INTO magazines (access_id,magazine_id,title,pub_name,status)
			VALUES ('$acc_id','$newgetrow2','$magazine_name','$pub','Available')";
			$result = mysql_query( $sql1);			
		}	
	}
	}

	if($c>0)
	{
	$copyx=$copyx+$copy;
	//$avail=$avail+$copy;
	mysql_query("update magazines_copy set copy='$copyx' where access_id='$acc_id'");
	}
	}			
	?>
    <div class="container">
	<div class="margin-top">
	<div class="row">	
	<div class="span12">	
        <div class="alert alert-info">Add Magazines/ Newspaper</div>
		<p><a href="magazines.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
		<div class="addstudent">
		<div class="details">Please enter details for Magazines/ Newspaper</div>		
		
		<form enctype="multipart/form-data" class="form-horizontal" method="post">
		
		<div class="control-group">	
		<label class="control-label" for="inputEmail">Date Issue:</label>
			<div class="controls">
					
			<?php
			$myCalendar = new tc_calendar("date5", true, false);
			$myCalendar->setIcon("calendar/images/iconCalendar.gif");
			$myCalendar->setDate(date('d'), date('m'), date('Y'));
			$myCalendar->setPath("calendar/");
			$myCalendar->setYearInterval(2000, 2030);
			$myCalendar->dateAllow('2008-05-13', '2020-03-01');
			$myCalendar->setDateFormat('F j, Y');
			$myCalendar->setAlignment('left', 'bottom');
			$myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
			$myCalendar->writeScript();
			?>
			<script type="text/javascript">
				var datepick=$("#container_date5").text();
				$('#dateput').html("<input type='hidden' name='date' value='"+datepick+"'");
			</script>			
			</div>
		</div>	
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Name:</label>
			<div class="controls" >
			<input type="text" class="span4" id="inputEmail" name="magazine_name"  placeholder="Magazines/ Newspaper " required><span id="dateput"></span>
			</div>
		</div>
		
		
		<div class="control-group">
			<label class="control-label" for="inputPassword">Publication:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPassword" name="pub"  placeholder="" required>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputPassword">Copy/s:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPassword" name="copy"  placeholder="Copy/s" required>
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
	</body>
<?php include('footer.php') ?>