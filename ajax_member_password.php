<?php

/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */

sleep(1);

require('conf.php');

$user = $_POST['user'];
$password = $_POST['password'];
$password_new = $_POST['password_new'];

$sql = "SELECT * FROM users WHERE user_Name = '$user'";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);

if ($password == $row['user_Password']) {
	$update_query = "UPDATE users SET user_Password = '$password_new' WHERE user_Name = '$user'";

	$return['msg'] = "Submit Succeeded";
	$return['error'] = false;	

	mysqli_query($connect, $update_query);
	
}
else {
	$return['msg'] = "Wrong current password, please retype";
	$return['error'] = true;

}
echo json_encode($return);

mysqli_close($connect);
?>
