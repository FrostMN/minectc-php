<?php
include('login.php'); // Includes Login Script
include('classes/sqlCalls.php'); // Includes sql data


if(isset($_SESSION['login_user'])){
//header("location: profile.php");
$logged = true;
$admin = $_SESSION['admin'];
$uname = $_SESSION['login_user'];
}

$current_page = "map";

?>
<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
        <?php include ('blocks/header.php'); ?>
        <div class="main-div">
            <?php include ('blocks/nav-div.php'); ?>
            <?php include ('blocks/map-div.php'); ?>
        </div>
    </body>
</html>
