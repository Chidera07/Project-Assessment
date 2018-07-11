<?php

$db_hostname = 'localhost';
$db_database = 'stafflogin';
$db_username = 'root';
$db_password = '';
$errors = array();



$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
	
mysql_select_db($db_database)
 or die("Unable to select database: " . mysql_error());

 if(isset($_POST['submit'])){
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);



if (empty($username)){
	array_push($errors, "username is required")
}

if (empty($password)){
	array_push($errors, "password is required")
}

// if there are no errors,save user to database

if (count($errors) == 0){

	$sql = "INSERT INTO "
 }
}







?>