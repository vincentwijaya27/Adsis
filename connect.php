<?php 
$server = "adsisvin-1.chlefpy9vpik.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "vincent123";
$db = "bio";

$con = mysqli_connect($server, $username, $password, $db) OR die("Failed to Connect");
mysqli_select_db($con, $db);

?>