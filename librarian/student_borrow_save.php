<?php
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
session_start();



$result=mysql_query("select*from return_time");
$result1=mysql_query("select*from borrow_time");
$gettime=mysql_fetch_array($result);

$Today = date('y:m:d');
$new = date('l, F d, Y', strtotime($Today));

$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
$ex=date("Y-m-d", $tomorrow);

if(empty($_POST['selector'])){
?>
	<script>
	window.alert('Please return the books first!');
	window.location.href = 'student_borrow.php';
	</script>
<?php }
else
{

$login_query=mysql_query("select * from borrow_info where id_number='$_SESSION[id_borrow]' and borrow_stat='Pending'")or die(mysql_error());
		$count=mysql_num_rows($login_query);
		if ($count>0){
		?>
				<script>
				window.alert('Please return the books first!');
				window.location.href = 'student_borrow.php';	
				</script>
				<?php
		}
		
		else {
		foreach ($_POST['selector'] as $t)
			{

			mysql_query("update book_title set stat_book='Borrow' where acc_num='$t'");

			mysql_query("insert into borrow_info(id_number,acc_num,date_borrow,time_borrow,due_time,due_date,borrow_stat)
			values('$_SESSION[id_borrow]','$t',NOW(),NOW(),'$gettime[return_due]','$ex','Pending')")or die(mysql_error());
			
			
			mysql_query("INSERT INTO `user_login` (id_num, course_id, login_date, login_time,purpose, stat_login) VALUES ('$_SESSION[id_borrow]', '".$row1['crs_id']."', now(), now(), 'Borrow', 'Login')")
							or die('Error logging in...'.mysql_error());
							
			?>
				<script>
				window.alert('Saved!');
				window.location.href = 'all_borrow.php';	
				</script>
			<?php
			}		
		}
}

?>