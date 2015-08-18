<?php

/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */

require 'conf.php';

session_start();

// Obtain username & password from form
$username = $_POST['username'];
$password = $_POST['password'];


// Compare with database
$sql = "SELECT * FROM users WHERE user_Name='$username' 
                     AND user_Password='$password'";
$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);

$row = mysqli_fetch_array($result);

if ($count==1) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
	$_SESSION['userid'] = $row['user_ID'];
	header("Location: index.php");
}
else {
	$_SESSION['error']=1;
	header("Location: login_panel.php");
}
mysqli_close($connect);
?>
