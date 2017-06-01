<?php // create.php
session_start(); // Starting Session

include 'classes/sqlCalls.php';
include 'classes/SendMail.php';
include 'classes/secrets.php';
include 'classes/site-vars.php';

$mail_conf = "/var/www/devctc/config/mail.conf";
$mail_creds = array();

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect($db_servername, $db_username, $db_password);
// Selecting Database
$db = mysql_select_db($db_name, $connection);

$file = fopen($mail_conf, "r");
if ($file) {
    while(!feof($file)) {
        $line = fgets($file);
        $mail_creds[] = explode(" ", $line)[1];
    }
    fclose($file);
} else {
    echo "Cannot open db.conf<br>";
}

$error=''; // Variable To Store Error Message
$sucess=''; // Variable To Store Sucess Message

if (isset($_POST['submit'])) {
    if (isset($_POST['mcName'])) {
        if (empty($_POST['mcName']) || empty($_POST['email'])) {
            $error = "Username or Email is empty";
        } else {
            // Define $username and $email
            $username = filter_input($INPUT_POST, 'mcName');
            $email = filter_input($INPUT_POST, 'email');

            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            // $connection = mysql_connect($db_servername, $db_username, $db_password);

            // Selecting Database
            //$db = mysql_select_db($db_name, $connection);
            // SQL query to fetch information of registerd users and finds user match.

            $query_string = "SELECT mcName FROM players WHERE mcName='" . $username . "'";
            $query = mysql_query($query_string, $connection);
            $rows = mysql_num_rows($query);

            if ($rows == 1) {

                $sucess .= "<h2>Validation Email Sent</h2>";
                $sucess .= "Please check $email ";
                $sucess .= "for the validation link. ";
                $sucess .= "The link is valid for 15 minutes. ";
                $sucess .= "If you don't see the email from $from_email ";
                $sucess .= "shortly, please check your spam folder.";

                $to = $email;
                $subj = "MineCTC: Account Email Verification";
                $name = $username;
                $email_nonce = GenerateEmailNonce();
                
                $nonce_query = "UPDATE players SET email='$email', nonce='$email_nonce', time='" . date("Y-m-d H:i:s") . "' WHERE mcName='$username'";
                
                //echo $nonce_query;
                
                mysql_query($nonce_query, $connection);
                
                
                //Builds sring for email the varification link
                $validation_url = "https://$site_url/new-user.php";
                $Get_Args = "?email=" . $email . "&mcName=" . $username . "&nonce=" . $email_nonce;
                //echo $Get_Args . "<br>";
                $validation_link = "<a href='" . $validation_url . $Get_Args . "'>Validate email</a>";
                //echo $validation_link . "<br>";
                
                $body_string = str_replace('{link}', $validation_link, file_get_contents('classes/PHPmailer/email.tpl'));        
                //echo $body_string;
                $message = $body_string;
                
                SendMail($to, $subj, $message, $name); 
                
            } else {
                $error = "Username or Email is invalid";
            }
        }
    }
    if (isset($_POST['webName'])) {
        
        $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
                
        $MineName = filter_input(INPUT_POST, 'MineName');        
        $webName = filter_input(INPUT_POST, 'webName');
        $first_name = filter_input(INPUT_POST, 'first');
        $last_name = filter_input(INPUT_POST, 'last');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email');
        
        
        $pword_salt = GenerateSalt();
        
        $pword_hash = HashPassword($pword_salt, $password);
        
        $usr_query = "INSERT INTO users ( mcName, webName, first_name, last_name, email, salt, hash) VALUES ( '$MineName', '$webName', '$first_name', '$last_name', '$email', '$pword_salt', '$pword_hash' )";
        $del_player = "DELETE FROM players WHERE mcName='$MineName'";
        
        
        $conn->query($usr_query);
        $conn->commit();

        $conn->query($del_player);
        $conn->commit();
        
        $_SESSION['login_user'] = $webName;

        header('Location: profile.php');
        
    }
}

?>
