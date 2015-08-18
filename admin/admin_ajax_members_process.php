<?
require("../conf.php");

$user = $_POST['username'];
$userid = $_POST['userid'];

$sql = "SELECT * FROM users WHERE user_Name = '$user' OR user_ID = '$userid'";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if ($count == 1) {
	header("Location: admin_members_management.php?username=".$row['user_Name']);
}
else {
	header("Location: admin_members_management.php?error=1");
}
mysqli_close($connect);
?>