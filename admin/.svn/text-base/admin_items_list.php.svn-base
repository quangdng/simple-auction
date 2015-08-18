<?
session_start();
if ($_SESSION['admin'] == "") {
	header("Location: index.php");
}
require("../conf.php");
$sql = "SELECT * FROM items";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
	$itemid[] = $row['item_ID'];
	$itemname[] = $row['item_Name'];
	$itempath[] = $row['item_Path'];
}
if ($_GET['act'] == 'del') {
	$id = $_GET['id'];
	$path = mysqli_query($connect, "SELECT * FROM items WHERE item_ID = '$id'");
	$path = mysqli_fetch_array($path);
	unlink($path['item_Path']);
	$delete_query = "DELETE FROM items WHERE item_ID = '$id'";
	mysqli_query($connect, $delete_query);
?>
	<script type="text/javascript">
		window.location = 'admin_items_list.php';
    </script>
<?
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SimpleAuction - Item List</title>
    
    <!-- Include CSS -->
    <link href="../css/reset.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="./css/ajax.css" rel="stylesheet" type="text/css" />
    <link href="../css/slimbox2.css" rel="stylesheet" type="text/css" />
    <link href="../css/start/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700' rel='stylesheet' type='text/css' />

    <!-- Include Scripts -->
  	<script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.cycle.lite.min.js"></script>
    <script type="text/javascript" src="../js/jquery.pngFix.pack.js"></script>
    <script type="text/javascript" src="../js/jquery.color.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/hoverIntent.js"></script>
    <script type="text/javascript" src="../js/superfish.js"></script>
    <script type="text/javascript" src="../js/slimbox2.js"></script>
    <script type="text/javascript" src="../js/slides.min.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>	
    <script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="../js/tiny_mce/jquery.tinymce.js"></script>
    <script type="text/javascript">
		function delete_confirm(id) {
			$( "#dialog-confirm" ).dialog({
					resizable: false,
					height:140,
					modal: true,
					buttons: {
						"Delete": function() {
							$(this).dialog("close");
							window.location='./admin_items_list.php?act=del&id='+id;
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						},
						}
				});
		}
		function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
	</script>
    <meta charset="UTF-8"></meta>
	

</head>

<body onLoad="MM_preloadImages('../images/buttons/edit_hover.png','../images/buttons/delete_hover.png')">

<!-- START HEADER -->
<div id="header">

	<div class="container">
    
    	<div id="primary-nav" class="header-right">
        
            <ul class="sf-menu">
                <li class="current"><a href="./index.php">Home</a></li>
                <li><a href="./admin_members.php">Member Management</a></li>
                <li><a href="./admin_items.php">Items Management</a></li>
          	</ul>
        </div>
        
        <!-- LOGO -->        
    	<a href="../index.php"><img src="../images/logo.png" border="0" alt="SimpleAuction" /></a>
        
        
        
    </div>
    
</div><!-- END HEADER -->


<!-- HEADER DIVIDER -->
<div id="head-break">
<div class="outer">
<div class="announcement">
<h1>Items Management</h1>
<h1>Add / Edit / Delete Auction Items</h1>
</div>
</div>

</div><!-- END HEADER -->


<div class="centerBox">
<!-- START MAIN CONTAINER -->
<div class="container">
<div class="admin_info">
<br />
<h1> Item List </h1>

<table id="item_list">
    <tr>
    	<th><h4>Item ID</h4></th>
        <th><h4>Item Name</h4></th>
        <th><h4>Item Image</h4></th>
        <th><h4>Edit?</h4></th>
        <th><h4>Delete?</h4></th>
     </tr>
     <?
	 for($i=0; $i<count($itemid); $i++) {
		 echo "<tr>";
		 echo "<td>".$itemid[$i]."</td>";
		 echo "<td>".$itemname[$i]."</td>";
		 echo "<td><img src='".$itempath[$i]."'/></td>";
		 ?>
         <td><a href="./admin_items_edit.php?id=<? echo $itemid[$i]; ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('edit_button','','../images/buttons/edit_hover.png',1)"><img src="../images/buttons/edit.png" alt="Edit" name="edit_button" width="100" height="34" border="0" id="edit_button" /></a></td>
         <td><a href="javascript:void(this)" onClick="delete_confirm('<? echo $itemid[$i]; ?>')" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('delete_button','','../images/buttons/delete_hover.png',1)"><img src="../images/buttons/delete.png" name="delete_button" border="0" id="delete_button" /></a></td>        
         <?
		 echo "</tr>";
	 }
	 ?>
</table>

<table>
</table>
<div id="dialog-confirm" title="Delete this item?" style="display:none">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This item will be permantly deleted and could not be recovered. Are you sure?</p>
</div>
    </div>
    
</div>
<br class="clear" />
</div><!-- END MAIN CONTAINER --><br class="clear" />
</div>

<!-- START FOOTER -->
<div id="footer">

	<div class="container">
    
    	<div id="footer-right">
        
        	Created for CP2013 - Software Engineering Project<br />
            <strong>Team Members</strong><br />
            <a href="http://www.facebook.com/phong.thien" class="social facebook">Nguyen Dang Quang</a> <a href="http://www.facebook.com/profile.php?id=1012557458" class="social facebook">Aldo Gushary</a> <a href="http://www.facebook.com/sarathboss" class="social facebook">Sarath Amirtha</a> <a href="http://www.facebook.com/dill.m" class="social facebook">Dillan Martin</a> <a href="http://www.facebook.com/profile.php?id=685749024" class="social facebook">Hansel Gunarto</a> 
            
        </div>
        
        <br class="clear" />
    
  </div>
    
</div><!-- END FOOTER -->

</body>
</html>