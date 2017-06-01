<?php //mc-login.php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
        <div id="main">
            <div id="login">
            <h2>Login Form</h2>
            <form action="" method="post">
                <label>UserName :</label>
                <input id="name" name="username" placeholder="username" type="text">
                <label>Password :</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value=" Login ">
                <span><?php echo $error; ?></span>
            </form>
            </div>
        </div>
    </body>
</html>
