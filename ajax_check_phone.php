<?php

/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */
require('conf.php');

$tel = $_REQUEST['telephone'];

$sql = "SELECT * FROM users WHERE user_Phone='$tel'";

$result = mysqli_query($connect, $sql);

$valid = mysqli_num_rows($result) == 0;

$count = mysqli_num_rows($result);

if ($count == 0) 
    echo "true";
else
    echo 'false';
mysqli_close($connect);
?>
