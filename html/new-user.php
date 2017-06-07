<?php
include('create.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
    <?php include ('blocks/html-head.php'); ?>
    <body>
        <div id="main">
            <?php 
            if (isset($_GET['nonce'])) {
                $verify_mcName = filter_input( INPUT_GET, 'mcName' );
                $verify_email = filter_input( INPUT_GET, 'email' );
                $verify_nonce = filter_input( INPUT_GET, 'nonce' );
                
                
                $email_query = "SELECT * FROM players WHERE mcName ='$verify_mcName'";
                //echo $email_query . "<br>";
                $query = mysql_query($email_query, $connection);
                $row = mysql_fetch_assoc($query);
                
                //echo $row . "<br>";
                
                $db_mcName = $row['mcName'];
                $db_email = $row['email'];
                $db_nonce = $row['nonce'];
                $db_time = $row['time'];

                $nw_time = date("Y-m-d H:i:s");

                $delta_time = (strtotime($nw_time) - strtotime($db_time)) / 60;

                
                //$time_delta = now() - $db_time;
                
                //echo $db_time . "<br>";
                //echo $nw_time . "<br>";
                
                //echo strtotime($db_time) . "<br>";
                //echo strtotime($nw_time) . "<br>";
                //echo $delta_time;
                
                if ($db_nonce == $verify_nonce) {
                    $nonces_match = true;
                }
                                
                //echo "mcn: $db_mcName " . "em: $db_email " . "nc: $db_nonce " . "tm: $db_time <br>";
                
                echo "<div id=\"login\">";
                if ($nonces_match && ($delta_time < 15)){
                echo "<h2>User Details</h2>";
                echo "<form action=\"\" method=\"post\">";
                echo "    <label>Web User Name :</label>";
                echo "    <input id=\"webName\" name=\"webName\" placeholder=\"User Name\" type=\"text\">";
                echo "    <label>Password :</label>";
                echo "    <input id=\"password\" name=\"password\" placeholder=\"********\" type=\"text\">";
                echo "    <label>First Name :</label>";
                echo "    <input id=\"first\" name=\"first\" placeholder=\"First\" type=\"text\">";
                echo "    <label>Last Name :</label>";
                echo "    <input id=\"last\" name=\"last\" placeholder=\"Last\" type=\"text\">";
                echo "    <input id=\"MineName\" name=\"MineName\" type=\"hidden\" value=\"$verify_mcName\" />";
                echo "    <input id=\"email\" name=\"email\" type=\"hidden\" value=\"$verify_email\" />";
                echo "    <input name=\"submit\" type=\"submit\" value=\" Create \">";
                echo "</form>";
                } else {
                    echo "<h2>Expired Verification Link</h2>";
                    echo "Please request a new verification link";
                }
                
                echo "</div>";
                
            } else {
            
                if (!isset($_POST['email'])) {
                echo "<div id=\"login\">";
                echo "<h2>Create User</h2>";
                echo "<form action=\"\" method=\"post\">";
                echo "    <label>Minecraft Name :</label>";
                echo "    <input id=\"mcName\" name=\"mcName\" placeholder=\"Minecraft Name\" type=\"text\">";
                echo "    <label>Email :</label>";
                echo "    <input id=\"email\" name=\"email\" placeholder=\"name@domain.com\" type=\"text\">";
                echo "    <input name=\"submit\" type=\"submit\" value=\" Create \">";
                if (strlen($error) > 0) {
                    echo "<span class=\"error\">" . $error . "</span>";
                } else {
                    echo $sucess;
                }
                echo "</form>";
                echo "</div>";
                } else {
                echo "<div id=\"login\">";
                if (strlen($error) > 0) {
                    echo "<span>" . $error . "</span>";
                } else {
                    echo $sucess;
                }
                echo "</div>";
                }
            }
            //mysql_close($connection); // Closing Connection
            ?>
        </div>
    </body>
</html>
