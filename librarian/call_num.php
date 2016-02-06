<?php
error_reporting(E_ALL^E_NOTICE);
require("dbcon.php");
mysql_query("update book_title set call_num='$_POST[keyword]' where book_id='$_POST[id]'");
mysql_close($con);
?>