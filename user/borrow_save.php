<?php
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
session_start();

// Kini lang gamita nga code sa login if naa mu e puno nga query i butang lang
$result=mysql_query("select*from return_time");
$result1=mysql_query("select*from borrow_time");
$gettime=mysql_fetch_array($result);

$Today = date('y:m:d');
$new = date('l, F d, Y', strtotime($Today));
$datetime = date("Y-m-d 13:00:00");
$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
$ex=date("Y-m-d", $tomorrow);

ini_set('date.timezone', 'Asia/Manila');
$date_now = date("Y-m-d");

$login_query=mysql_query("select * from borrow_info where id_number='$_SESSION[id_borrow]' and borrow_stat='Pending'")or die(mysql_error());
$count=mysql_num_rows($login_query);
	if ($count>0){
	?>
		<script>
		window.alert('Please return the books first!');
		window.location.href = 'borrow1.php';
		</script>
		<?php
	}
	else{
		foreach($_POST['selector'] as $t){
			mysql_query("update book_title set stat_book='Borrow' where acc_num='$t'");
			mysql_query("insert into borrow_info(id_number,acc_num,date_borrow,time_borrow,due_time,due_date,borrow_stat,datetime)
			values('$_SESSION[id_borrow]','$t',NOW(),NOW(),'$gettime[return_due]','$ex','Pending','$datetime')")or die(mysql_error());
			header("location:index.php");
			session_destroy();
		}
		// mao ni nag pagkuha sa attendances ari rajud ni ha... og apili d i og save ang course_id column wala ko kabalo sa values sa course_id mao wala pa nako g apil
		$trapuser = mysql_query("select * from attendances where id_num='$_SESSION[id_borrow]' and login_date='$date_now'")or die(mysql_error());
		$countuser = mysql_num_rows($trapuser);
		if($countuser > 0){
			mysql_query("update attendances set attendance_count='1' where id_num='$_SESSION[id_borrow]' and login_date='$date_now'");
		}
		else{
			mysql_query("insert into attendances(id_num,login_date,attendance_count) VALUES ('$_SESSION[id_borrow]','$date_now','1')")or die(mysql_error());
		}
	}
?>