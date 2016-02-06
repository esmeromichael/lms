<?php
include('dbcon.php');
error_reporting(E_ALL^E_NOTICE);

	mysql_query("update magazine set title='$_POST[title]',pub_name='$_POST[pub] where access_id='$_POST[acc]' and status='Available'");
	


?>