<?php

/* CP2013 - Software Engineering
 * SimpleAuction Project
 * Written PHP & MySQL
 */

sleep(1);

require('conf.php');

$user = $_POST['user'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$sql = "SELECT * FROM users WHERE user_Name='$user'";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);

if ($row['user_Email'] != $email) {
	$check_email_query = "SELECT * FROM users WHERE user_Email = '$email'";
	
	$result_check_email = mysqli_query($connect, $check_email_query);
	
	$count = mysqli_num_rows($result_check_email);
	
	if ($count != 0) {
		$return['error'] = true;
		$return['msg'] = "The email you entered is already in use";
	}
	else $return['error'] = false;
}

if ($row['user_Phone'] != $tel) {
	$check_phone_query = "SELECT * FROM users WHERE user_Phone = '$tel'";
	
	$result_check_phone = mysqli_query($connect, $check_phone_query);
	
	$count1 = mysqli_num_rows($result_check_phone);
	
	if ($count1 != 0) {
		$return['error'] = true;
		if ($return['msg'] != "") 
			$return['msg'] .= " and the phone number you entered is already in use";
		else
			$return['msg'] = "The phone number you entered is already in use";
	}
}

if (!isset($return['error'])) {
			$return['error'] = false;
			
			$return['msg'] = "Submit Succeeded";
			
			$update_query = "UPDATE users SET user_RealName = '$realname', user_Phone = '$tel', user_Email = '$email' WHERE user_Name = '$user'";
			
			mysqli_query($connect, $update_query);
}
echo json_encode($return);

mysqli_close($connect);
?>
