<?
sleep(3);
require("../conf.php");
session_start();

$user = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE admin_Name = '$user' and admin_Password = '$password'";

$result = mysqli_query($connect, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) {
	$return['error'] = false;
	$return['msg'] = "Login Succeeded! You can start using Admin Panel now";
	$_SESSION['admin'] = $user;
}
else {
	$return['error'] = true;
	$return['msg'] = "Username or Password is incorrect";
}

echo json_encode($return);
mysqli_close($connect);

?>