<?php

include 'classes/sqlCalls.php';

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect($db_servername, $db_username, $db_password);
// Selecting Database
$db = mysql_select_db($db_name, $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("SELECT webName FROM users WHERE webName='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['webName'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
