<?
require("./conf.php");

$itemid = $_REQUEST['itemid'];
$userid = $_REQUEST['userid'];

$sql = "SELECT * FROM bid WHERE item_ID = '$itemid' ORDER BY UNIX_TIMESTAMP(bid_Date) DESC";

$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_array($result)) {
	$username[] = $row['user_Name'];
	$date[] = $row['bid_Date'];
	$price[] = $row['bid_Price'];
}
?>
<h5> Bidding History </h5>
<table>
<tr>
<th>Bidders</th>
<th>Bidding Date</th>
<th>Price</th>
</tr>
<?
if (isset($username)) {
for($i=0; $i<count($username); $i++) {
	echo "<tr>";
    echo "<td>$username[$i]</td>";
    echo "<td>$date[$i]</td>";
	echo "<td>S$".$price[$i]."</td>";
	echo "</tr>";
}
}
mysqli_close($connect);
?>
</table>