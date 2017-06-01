<?php
include('login.php'); // Includes Login Script
include('classes/sqlCalls.php'); // Includes Login Script


if(isset($_SESSION['login_user'])){
//header("location: profile.php");
$logged = true;
$admin = $_SESSION['admin'];
$uname = $_SESSION['login_user'];
$current_page = "home";
}
?>
<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
        <?php include ('blocks/header.php'); ?>
        <?php include ('blocks/to-do-list.php'); ?>
        
    </body>
</html>
