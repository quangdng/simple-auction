<?
sleep(1);

require("../conf.php");

$user = $_POST['user'];
$newuser = $_POST['newuser'];
$realname = $_POST['realname'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$postal = $_POST['postal'];


$sql = "SELECT * FROM users WHERE user_Name='$user'";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);

$return['msg'] = "The ";

if ($row['user_Name'] != $newuser) {
	$check_email_query = "SELECT * FROM users WHERE user_Name = '$newuser'";
	
	$result_check_email = mysqli_query($connect, $check_email_query);
	
	$count = mysqli_num_rows($result_check_email);
	
	if ($count != 0) {
		$return['error'] = true;
		$return['msg'] = "username";
	}
	else $return['error'] = false;
	
}
if (($row['user_Email'] != $email && $row['user_Name'] == $newuser) || $row['user_Name'] != $newuser) {
	$check_email_query = "SELECT * FROM users WHERE user_Email = '$email'";
	
	$result_check_email = mysqli_query($connect, $check_email_query);
	
	$count1 = mysqli_num_rows($result_check_email);
	
	if ($count1 != 0) {
		$return['error'] = true;
		if ($return['msg'] != "The ") 
			$return['msg'] .= ", email";
		else
			$return['msg'] .= "email";
	}
}

if (($row['user_Phone'] != $tel && $row['user_Name'] == $newuser) || $row['user_Name'] != $newuser) {
	$check_phone_query = "SELECT * FROM users WHERE user_Phone = '$tel'";
	
	$result_check_phone = mysqli_query($connect, $check_phone_query);
	
	$count2 = mysqli_num_rows($result_check_phone);
	
	if ($count2 != 0) {
		$return['error'] = true;
		if ($return['msg'] != "The ") 
			$return['msg'] .= ", phone number";
		else
			$return['msg'] .= "phone number";
	}
}
if (isset($return['error'])) {
	$return['msg'] .= " is already in use";
}
else {
	$return['error'] = false;
	$return['msg'] = "Updated !";
	require("../conf.php");
	$update_query = "UPDATE users SET user_Name = '$newuser', user_Password = '$password', user_RealName = '$realname', user_Email ='$email', user_Phone = '$tel', user_Address = '$address', user_Postal = '$postal' WHERE user_Name = '$user'";
	mysqli_query($connect, $update_query);
}

echo json_encode($return);
mysqli_close($connect);
?>