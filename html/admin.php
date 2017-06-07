<?php
include('session.php');

if(isset($_SESSION['login_user'])){
//header("location: profile.php");
$logged = true;
$admin = $_SESSION['admin'];
$uname = $_SESSION['login_user'];
$current_page = "admin";
}

if(!$admin){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
    <?php include ('blocks/header.php'); ?>
<!--
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
-->

    <div class="main-div">
        <?php include ('blocks/nav-div.php'); ?>
        <?php include ('blocks/to-do-list.php'); ?>
    </div>


</div>
</body>
</html>
