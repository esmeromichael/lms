<?php
$conn=mysql_connect('localhost','root','') or die('Could not connect: '.mysql_error());
//mysql_query("CREATE DATABASE IF NOT EXISTS draft1", $conn) or die("<br>Error creating database: ".mysql_error());
mysql_select_db('system_lms1') or die("<br>Could not connect to database: ".mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS `borrow_time` (
	`id` INT NULL,
	`borrow_start` TIME DEFAULT NULL,
	`borrow_due` TIME DEFAULT NULL,
	PRIMARY KEY (id)
)") or die("<br>Error creating table `borrow_time`: ".mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS `system_lms1`.`return_time` (
	`id` INT NULL,
	`return_start` TIME DEFAULT NULL,
	`return_due` TIME DEFAULT NULL,
	PRIMARY KEY (id)
)") or die("<br>Error creating table `return_time`: ".mysql_error());
?>