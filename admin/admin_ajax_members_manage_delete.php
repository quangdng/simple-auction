<?
sleep(1);

require("../conf.php");

$user = $_POST['user'];

$sql = "DELETE FROM users WHERE user_Name = '$user'";

mysqli_query($connect, $sql);

$return['msg'] = "Deleted!";

echo json_encode($return);

mysqli_close($connect);
?>