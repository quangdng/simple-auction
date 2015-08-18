<link href="./css/ajax.css" rel="stylesheet" type="text/css" />
<?
session_start();
require("./conf.php");

$userid = $_SESSION['userid'];

$sql = "SELECT * FROM bid WHERE user_ID = '$userid' ORDER BY UNIX_TIMESTAMP(bid_Date) DESC";

$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_array($result)) {
	$username[] = $row['user_Name'];
	$itemname[] = $row['item_Name'];
	$date[] = $row['bid_Date'];
	$price[] = $row['bid_Price'];
}
?>
<div id="auction_history">
<h1> Auction History </h1>
<table>
<tr>
<th>Auction Date</th>
<th>Item Name</th>
<th>Price</th>
</tr>
<?
if (isset($username)) {
for($i=0; $i<count($username); $i++) {
	echo "<tr>";
	echo "<td>$date[$i]</td>";
	echo "<td>$itemname[$i]</td>";
	echo "<td>S$$price[$i]</td>";
	echo "</tr>";
}
}
mysqli_close($connect);
?>
</table>
</div>