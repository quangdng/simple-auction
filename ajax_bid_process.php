<?
require('./conf.php');

$userid = $_POST['userid'];
$username = $_POST['username'];
$itemid = $_POST['itemid'];
$currentdate = date("Y/m/d H:i:s");

// Select Items Data
$sql_item = "SELECT * FROM items WHERE item_ID = '$itemid'";
$result_item = mysqli_query($connect, $sql_item);
$row_item = mysqli_fetch_array($result_item);

// Select Users Data
$sql_user = "SELECT * FROM users WHERE user_ID = '$userid'";
$result_user = mysqli_query($connect, $sql_user);
$row_user = mysqli_fetch_array($result_user);

if ( $row_item['user_Name'] ==  $username ) {
	$return['error'] = 1;
}
else if ($row_user['user_Credit'] < 1) {
	$return['error'] = 2;
}
else 
{
//Updated Bidding Data
$actual_price = $row_item['item_Actual_Price'] + $row_item['item_Increment_Price'];
$itemclosedate = $row_item['item_Close_Date'];
$itemclosedate = strtotime($itemclosedate);
$itemclosedate = strtotime("+30 second", $itemclosedate);
$itemclosedate = date("Y/m/d H:i:s", $itemclosedate);
$itemname = $row_item['item_Name'];

// Record bidding in Bid Table
$sql_update_bid = "INSERT INTO bid (user_ID, item_ID, user_Name, item_Name, bid_Date, bid_Price) VALUES ('$userid', '$itemid', '$username', '$itemname', '$currentdate', '$actual_price')";
mysqli_query($connect, $sql_update_bid);

// Update Items Table
$sql_update_item = "UPDATE items SET item_Close_Date = '$itemclosedate', item_Actual_Price = '$actual_price', user_Name = '$username', item_Status = 0 WHERE item_ID = '$itemid'";
mysqli_query($connect, $sql_update_item);

//Update Users Table
$sql_update_user = "UPDATE users SET user_Credit = user_Credit - 1 WHERE user_ID = '$userid'";
mysqli_query($connect, $sql_update_user);
}
echo json_encode($return);
mysqli_close($connect);
?>