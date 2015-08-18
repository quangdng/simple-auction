<?php
session_start();
/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */
require('conf.php');

$user = $_SESSION['username'];

$current_password = $_REQUEST['current_password'];

$sql = "SELECT * FROM users WHERE user_Name='$user' AND user_Password ='$current_password'";

$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) 
    echo "true";
else
    echo 'false';
mysqli_close($connect);	
?>
