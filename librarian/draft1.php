<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_setting.php'); ?>
<?php
include('conn1.php');
if($result1=mysql_query("SELECT * FROM borrow_time WHERE id='1'")) {
	if($result2=mysql_query("SELECT * FROM return_time WHERE id='1'")) {
		$row1=mysql_fetch_array($result1);
		$row2=mysql_fetch_array($result2);
	}
}
mysql_close($conn);

$boundsmin_hour=7;
$boundsmin_minute=30;
$boundsmax_hour=16;
$boundsmax_minute=30;

$pieces1=explode(':',$row1['borrow_start']);
$b_defaultmin_hour=(int)$pieces1[0] or $b_defaultmin_hour=7;
$b_defaultmin_minute=(int)$pieces1[1] or $b_defaultmin_minute=30;

$pieces2=explode(':',$row1['borrow_due']);
$b_defaultmax_hour=(int)$pieces2[0] or $b_defaultmax_hour=16;
$b_defaultmax_minute=(int)$pieces2[1] or $b_defaultmax_minute=30;

$pieces3=explode(':',$row2['return_start']);
$r_defaultmin_hour=(int)$pieces3[0] or $r_defaultmin_hour=7;
$r_defaultmin_minute=(int)$pieces3[1] or $r_defaultmin_minute=30;

$pieces4=explode(':',$row2['return_due']);
$r_defaultmax_hour=(int)$pieces4[0] or $r_defaultmax_hour=16;
$r_defaultmax_minute=(int)$pieces4[1] or $r_defaultmax_minute=30;
?>
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<link href="css/custom.css" rel="stylesheet"/>

	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/jQRangeSliderMouseTouch.js" type="text/javascript"></script>
	<script src="js/jQRangeSliderDraggable.js" type="text/javascript"></script>
	<script src="js/jQRangeSliderBar.js" type="text/javascript"></script>
	<script src="js/jQRangeSliderHandle.js" type="text/javascript"></script>
	<script src="js/jQRangeSliderLabel.js" type="text/javascript"></script>
	<script src="js/jQRangeSlider.js" type="text/javascript"></script>
	<script src="js/jQDateRangeSliderHandle.js" type="text/javascript"></script>
	<script src="js/jQDateRangeSlider.js" type="text/javascript"></script>
	<script src="js/jQRuler.js" type="text/javascript"></script>
	<script>
	$(document).ready(function() {
		var currentdate = new Date();
		function TwoDigits(val){
			if (val < 10){
				 return "0" + val;
			}
			return val;
		}
		$("#slider-borrowtime").dateRangeSlider({
			bounds: {min: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $boundsmin_hour;?>, <?php echo $boundsmin_minute;?>), max: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $boundsmax_hour;?>, <?php echo $boundsmax_minute;?>)},
			defaultValues: {min: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $b_defaultmin_hour;?>, <?php echo $b_defaultmin_minute;?>), max: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $b_defaultmax_hour;?>, <?php echo $b_defaultmax_minute;?>)},
			formatter: function(value){
				var hours = value.getHours(),
					minutes = value.getMinutes(),
					standardHour = value.getHours(),
					dayPeriod = 'AM';
				if(parseInt(TwoDigits(hours)) > 12 && parseInt(TwoDigits(hours)) < 24) {
					var standardHour=parseInt(TwoDigits(hours))-12,
						dayPeriod = 'PM';
				}
				return standardHour + ":" + TwoDigits(minutes) + " " + dayPeriod;
			}
		});
		$("#slider-returntime").dateRangeSlider({
			bounds: {min: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $boundsmin_hour;?>, <?php echo $boundsmin_minute;?>), max: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $boundsmax_hour;?>, <?php echo $boundsmax_minute;?>)},
			defaultValues: {min: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $r_defaultmin_hour;?>, <?php echo $r_defaultmin_minute;?>), max: new Date(currentdate.getFullYear(), (currentdate.getMonth()+1), currentdate.getDate(), <?php echo $r_defaultmax_hour;?>, <?php echo $r_defaultmax_minute;?>)},
			formatter: function(value){
				var hours = value.getHours(),
					minutes = value.getMinutes(),
					standardHour = value.getHours(),
					dayPeriod = 'AM';
				if(parseInt(TwoDigits(hours)) > 12 && parseInt(TwoDigits(hours)) < 24) {
					var standardHour=parseInt(TwoDigits(hours))-12,
						dayPeriod = 'PM';
				}
				return standardHour + ":" + TwoDigits(minutes) + " " + dayPeriod;
			}
		});
		$('#btn-change-borrow').on('click', function(e) {
			$('#status-borrowtime-change').remove();
			var values1 = $("#slider-borrowtime").dateRangeSlider("values");
			var data={};
			data['borrow_start']=values1.min;
			data['borrow_due']=values1.max;
			$.ajax({
				type: 'POST',
				url: "ajax1.php",
				cache: false,
				data: data,
				success: function(resp) {
					if(resp=='Success') {
						$('<div id="status-borrowtime-change">'+resp+'</div>').hide().appendTo("#fld-borrowtime").fadeIn(3000);
					}
				}
			});
			//e.preventDefault();
		});
		$('#btn-change-return').on('click', function(e) {
			$('#status-returntime-change').remove();
			var values2 = $("#slider-returntime").dateRangeSlider("values");
			var data={};
			data['return_start']=values2.min;
			data['return_due']=values2.max;
			$.ajax({
				type: 'POST',
				url: "ajax1.php",
				cache: false,
				data: data,
				success: function(resp) {
					if(resp=='Success') {
						$('<div id="status-returntime-change">'+resp+'</div>').hide().appendTo("#fld-returntime").fadeIn(3000);
					}
				}
			});
			//e.preventDefault();
		});
	});
	</script>
</head>

<body>
<div class="container">
		<div class="margin-top">
			<div class="row">	
<div class="span12">
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="icon-cog icon-large"></i>&nbsp;Time Settings for students</strong>
</div> 
 <ul class="nav nav-pills">
	<li class=""><a href="fines.php">Fines</a></li>									
	<li><a href="set_books.php">Books</a></li>
	<li><a href="add_course.php">Add Course</a></li>
	<li><a href="add_category.php">Add Category</a></li>
	<li class="active"><a href="draft1.php">Borrow Time Settings</a></li>										
</ul> 	

	<fieldset id="fld-borrowtime">
		<legend>Borrow Time Setting</legend>
		<article style="padding:50px 20px">
			<div id="slider-borrowtime"></div>
		</article>
		<button type="button" id="btn-change-borrow">Change</button>
	</fieldset>
	
	<br>
	</br>
	<fieldset id="fld-returntime">
		<legend>Return Time Setting</legend>
		<article style="padding:50px 20px">
			<div id="slider-returntime"></div>
		</article>
		<button type="button" id="btn-change-return">Change</button>
	</fieldset>
	</div>
	</div>
	</div>

</body>
</html>

