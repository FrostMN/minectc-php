<?php
include('session.php'); // Includes Login Script
include('SendMail');

if(isset($_SESSION['login_user'])){
    $logged = true;
    $admin = $_SESSION['admin'];
    $uname = $_SESSION['login_user'];
    $current_page = "index";
}
?>

<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
        <?php include ('blocks/header.php'); ?>
        <div id="main">
            <?php
            $email_tests = array("bigfoot_55418@yahoo.com", "asouer@gmail.com", "aaron@asouer.com");
            $email_names = array("linc", "asouer", "aaron");
            
            $subj = "group mail test";
            $mess = " i just mailed 3 addresses.";
            
            foreach ($email_tests as $value) {
                echo $value . "<br>";
            }

            foreach ($email_names as $value) {
                echo $value . "<br>";
            }
            
            for ($index = 0; $index < count($email_tests); $index++) {
                echo $email_names[$index] . "<br>";
                SendMail($email_tests[$index], $subj, $mess);
            }
            
            
            echo count($email_tests);
            ?>
            
        </div>
    </body>
</html>
