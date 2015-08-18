<?
require('./conf.php');

// Pull data from Items
$itemid = $_REQUEST['itemid'];
$sql = "SELECT * FROM items WHERE item_ID = '$itemid'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

// Pull data from users
$userid = $_REQUEST['userid'];
$sql_user = "SELECT * FROM users WHERE user_ID = '$userid'";
$result_user = mysqli_query($connect, $sql_user);
$row_user = mysqli_fetch_array($result_user);

//Export data
$username = $row['user_Name'];
$actual_price = $row['item_Actual_Price'];
$itemclosedate = $row['item_Close_Date'];
$simoleon = $row_user['user_Credit'];
$status = $row['item_Status'];

$return['bidder'] = $username;
$return['price'] = $actual_price;
$return['date'] = $itemclosedate;
$return['simoleon'] = $simoleon;
$return['status'] = $status;

echo json_encode($return);

mysqli_close($connect);
?>