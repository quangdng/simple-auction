<?php

/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */

sleep(1);

require('conf.php');

$user = $_POST['user'];
$address = $_POST['address'];
$postal = $_POST['postal'];

$update_query = "UPDATE users SET user_Address = '$address', user_Postal = '$postal' WHERE user_Name = '$user'";

$return['msg'] = "Submit Succeeded";
$return['error'] = false;	

mysqli_query($connect, $update_query);

echo json_encode($return);

mysqli_close($connect);
?>
