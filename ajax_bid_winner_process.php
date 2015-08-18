<?
require("./conf.php");

$itemid = $_POST['itemid'];

$sql = "UPDATE items SET item_Status = 1 WHERE item_ID = '$itemid'";

mysqli_query($connect, $sql);

mysqli_close($connect);
?>