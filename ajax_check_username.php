<?php

/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */
require('conf.php');

$user = $_REQUEST['username'];

$sql = "SELECT * FROM users WHERE user_Name='$user'";

$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);
if (isset($count)) {
if ($count == 0) 
    echo "true";
}
else
    echo 'false';
mysqli_close($connect);
?>
