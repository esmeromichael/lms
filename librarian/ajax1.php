<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
if($_POST['borrow_start'] && $_POST['borrow_due']) {
	$rawpieces1=explode(' ', $_POST['borrow_start']);
	$pieces1=explode(':', $rawpieces1[4]);
	$date1=$pieces1[0].':'.$pieces1[1].':00';
	
	$rawpieces2=explode(' ', $_POST['borrow_due']);
	$pieces2=explode(':', $rawpieces2[4]);
	$date2=date('H:i:s', strtotime($pieces2[0].':'.$pieces2[1].':00'));
	
	if($date1 !== false)  {
		if($date2 !== false) {
			include('conn1.php');
			mysql_query("INSERT INTO borrow_time (`id`, `borrow_start`, `borrow_due`) VALUES('1', '".mysql_real_escape_string($date1)."', '".mysql_real_escape_string($date2)."') ON DUPLICATE KEY UPDATE borrow_start='".mysql_real_escape_string($date1)."', borrow_due='".mysql_real_escape_string($date2)."'") or die();
			mysql_close($conn);
			echo "Success";
		}
	}
}
if($_POST['return_start'] && $_POST['return_due']) {
	$rawpieces1=explode(' ', $_POST['return_start']);
	$pieces1=explode(':', $rawpieces1[4]);
	$date1=$pieces1[0].':'.$pieces1[1].':00';
	
	$rawpieces2=explode(' ', $_POST['return_due']);
	$pieces2=explode(':', $rawpieces2[4]);
	$date2=date('H:i:s', strtotime($pieces2[0].':'.$pieces2[1].':00'));
	
	if($date1 !== false)  {
		if($date2 !== false) {
			include('conn1.php');
			mysql_query("INSERT INTO return_time (`id`, `return_start`, `return_due`) VALUES('1', '".mysql_real_escape_string($date1)."', '".mysql_real_escape_string($date2)."') ON DUPLICATE KEY UPDATE return_start='".mysql_real_escape_string($date1)."', return_due='".mysql_real_escape_string($date2)."'") or die();
			mysql_close($conn);
			echo "Success";
		}
	}
}
?>