<?php
include('login.php'); // Includes Login Script
include('classes/sqlCalls.php'); // Includes sql data


if(isset($_SESSION['login_user'])){
//header("location: profile.php");
$logged = true;
$admin = $_SESSION['admin'];
$uname = $_SESSION['login_user'];
}

//$current_page = "home";
//$current_section = "main";
/*
if (!empty($_SESSION["page"])) {
    //$current_page = filter_input( INPUT_GET, 'page' ); 
    $_SESSION['page'] = "home";
}        
if (!empty($_SESSION["sec"])) {
    $_SESSION['sec'] = "main";
    //$current_section = filter_input( INPUT_GET, 'sec' );    
}
*/

if (!empty($_GET["page"])) {
    $current_page = filter_input( INPUT_GET, 'page' ); 
    //$_SESSION['page'] = filter_input( INPUT_GET, 'page' );
}        
if (!empty($_GET["sec"])) {
    $current_section = filter_input( INPUT_GET, 'sec' );    
    //$_SESSION['sec'] = filter_input( INPUT_GET, 'sec' );
}

//if (!empty($current_section)){
//    //header("Location: index.php");
//    //echo "not empty";
//}

?>
<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
        <?php include ('blocks/header.php'); ?>
        <div class="main-div">
            <?php include ('blocks/nav-div.php'); ?>
            <?php
            switch ($current_page) {
                case "home":
                case "index":
                    include ('blocks/home/content-div.php');
                    break;
                case "admin":
                    include ('blocks/admin/content-div.php');
                    break;

                case "profile":
                    include ('blocks/profile/content-div.php');
                    break;

                case "ticket":
                    include ('blocks/ticket/content-div.php');
                    break;

                default:
                    include ('blocks/home/content-div.php');
                    break;
            }
            ?>
        </div>
    </body>
</html>
