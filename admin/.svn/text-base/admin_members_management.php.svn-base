<?
session_start();
if ($_SESSION['admin'] == "") {
	header("Location: index.php");
}
require("../conf.php");
	
$user = $_GET['username'];
	
$sql = "SELECT * FROM users WHERE user_Name = '$user'";
	
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);


mysqli_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SimpleAuction - Member Management</title>
    
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
    <script type="text/javascript">
		$(document).ready(function(e) {
			$("#submit").click(function() {
				$(".loading").show(500);
				$("#member-manage-form").hide(0);
				$("#message_admin_member_management").hide(0);
					
					
				$.ajax({
					type: 'POST',
					url: 'admin_ajax_members_manage_process.php',
					dataType: 'json',
					data: {
						user: '<? echo $user;?>',
						newuser: $("#username").val(),
						realname: $("#realname").val(),
						password: $("#password").val(),
						email: $("#email").val(),
						tel: $("#telephone").val(),
						address: $("#address").val(),
						postal: $("#postal").val()
					},
					success: function(data) {
						$(".loading").hide(500);
						$("#message_admin_member_management").removeClass();
						if (data.error === true) {
							$("#message_admin_member_management").addClass("message-error");
						}
						else 
							$("#message_admin_member_management").addClass("message-success");
						$("#message_admin_member_management").text(data.msg).show(500);
						$("#member-manage-form").show(500);
						},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(".loading").hide(500);
						$("#message_admin_member_management").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
						$("#member-manage-form").show(500);
					}
				});
				return false;
			});
			$("#delete_button").click(function() {
				$( "#dialog-confirm" ).dialog({
					resizable: false,
					height:140,
					modal: true,
					buttons: {
					"Delete": function() {
						$(this).dialog("close");
						$(".loading").show(500);
				$("#member-manage-form").hide(0);
				$("#message_admin_member_management").hide(0);
						$.ajax({
					type: 'POST',
					url: 'admin_ajax_members_manage_delete.php',
					dataType: 'json',
					data: {
						user: '<? echo $user;?>'
					},
					success: function(data) {
						$(".loading").hide(500);
						$("#message_admin_member_management").removeClass();
					
						$("#message_admin_member_management").addClass("message-success");
						$("#message_admin_member_management").text(data.msg).show(500);
						$("#back").show(500);
						},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(".loading").hide(500);
						$("#message_admin_member_management").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
						$("#member-manage-form").show(500);
					}
				});
				return false;
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				}
				});
			});
		});
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

<body onload="MM_preloadImages('../images/button/delele_hover.png','../images/buttons/back_hover.png')">

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
<h1>Member Management</h1>
<h1>Edit member by modifying members field</h1>
</div>
</div>

</div><!-- END HEADER -->


<div class="centerBox">
<!-- START MAIN CONTAINER -->
<div class="container">
<div class="admin_info">
<? 
if ($_GET['error'] == 1) {
	echo '<h1 style="margin-top: 60px">No UserName or User ID found.</h1>';
?>
<a href="./admin_members.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('back_button','','../images/buttons/back_hover.png',1)"><img src="../images/buttons/back.png" alt="Back" name="back_button" width="100" height="34" border="0" id="back_button" /></a>
<?
}
else {
?>
<div id="message_admin_member_management">
</div>
<form id="member-manage-form" class="common-form">
    <table>
    	<tr>
    		<td class="label"><h4>Login ID</h4></td>
    		<td class="field"><input class="input" value="<? echo $row['user_Name']; ?>" id="username" name="username" autofocus="autofocus" type="text" /></td>
        	<td class="status"></td>
    	</tr>
        <tr>
        	<td class="label"><h4>Real Name</h4></td>
    		<td class="field"><input class="input" value="<? echo $row['user_RealName']; ?>" id="realname" name="realname" type="text" /></td>
            <td class="status"></td>
        </tr>
    	<tr>
        	<td class="label"><h4>Password</h4></td>
    		<td class="field"><input class="input" value="<? echo $row['user_Password']; ?>" id="password" name="password" type="password" /></td>
            <td class="status"></td>
        </tr>
    	<tr>
        	<td class="label"><h4>E-mail address</h4></td>
    		<td class="field"><input class="input" id="email" value="<? echo $row['user_Email']; ?>" name="email" type="email" /></td>
            <td class="status"></td>
        </tr>
    	<tr>
        	<td class="label"><h4>Contact Number</h4></td>
    		<td class="field"><input class="input" id="telephone" value="<? echo $row['user_Phone']; ?>" name="telephone" type="tel" /></td>
            <td class="status"></td>
        </tr>
        <tr>
    		<td class="label"><h4>Address</h4></td>
    		<td class="field"><textarea class="input" id="address" name="address" rows="4"><? echo $row['user_Address']; ?></textarea></td>
        	<td class="status"></td>
    	</tr>
        
    	<tr>
        	<td class="label"><h4>Postal Code</h4></td>
    		<td class="field"><input class="input" value="<? echo $row['user_Postal']; ?>" id="postal" name="postal" type="text" /></td>
            <td class="status"></td>
        </tr>
	</table>
    <p class="button" align="left">
    <input type="image" src="../images/submit.png" value="Submit" name="submit" id="submit" />
    <img onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('delete_button','','../images/buttons/delete_hover.png',1)" src="../images/buttons/delete.png" alt="Delete" name="delete_button" border="0" id="delete_button" />    </p>
    </form>
<?
}
?>
<div class="loading" style="display:none; margin-top: 50px;">
    Please wait<br />
    <img src="../images/ajax-loader.gif" title="Loader" atl="Loader" />
</div>
<div id="back" style="display:none">
  <a href="./admin_members.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('back_button','','../images/buttons/back_hover.png',1)"><img src="../images/buttons/back.png" alt="Back" name="back_button" width="100" height="34" border="0" id="back_button" /></a></div>
<div id="dialog-confirm" title="Delete this user?" style="display:none">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be permantly deleted and could not be recovered. Are you sure?</p>
</div>
</div>

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