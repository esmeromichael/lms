<?php
include('dbcon.php');
ini_set('date.timezone', 'Asia/Manila');
    $date_now = date("Y-m-d");
$trapuser = mysql_query("select * from user_login_copy where id_num='3' and login_date='2016-02-04'")or die(mysql_error());
$countuser = mysql_num_rows($trapuser);
echo $date_now;
?>