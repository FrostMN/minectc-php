<?php // login.php
session_start(); // Starting Session

include 'classes/sqlCalls.php';
include 'classes/secrets.php';


$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect($db_servername, $db_username, $db_password);
// Selecting Database
$db = mysql_select_db($db_name, $connection);


// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// SQL query to fetch salt of user from db.
$salt_query = "SELECT salt FROM users WHERE webName='$username'";
$salt_result = mysql_query($salt_query, $connection);
$salt_rows = mysql_fetch_assoc($salt_result);
$salt =$salt_rows['salt'];

$hash = HashPassword($salt, $password);

// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("SELECT * FROM users WHERE hash='$hash' AND webName='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
    
    // SQL query to fetch salt of user from db.
    $admin_query = "SELECT admin FROM users WHERE webName='$username'";
    $admin_result = mysql_query($admin_query, $connection);
    $admin_rows = mysql_fetch_assoc($admin_result);
    $admin =$admin_rows['admin'];
    
    echo $admin . "<br>";
    $_SESSION['login_user']=$username; // Initializing Session
    if ($admin) {
    $_SESSION['admin']=true; // Initializing Session
    } else {
     $_SESSION['admin']=false; // Initializing Session   
    }
    header("location: profile.php"); // Redirecting To Other Page
    } else {
    $error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}

?>
