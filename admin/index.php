<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SimpleAuction - Admin Panel</title>
    
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
				$("#admin-login-form").hide(0);
				$("#message_admin_login").hide(0);
					
				$.ajax({
					type: 'POST',
					url: './ajax_admin_login_process.php',
					dataType: 'json',
					data: {
						username: $("#username").val(),
						password: $("#password").val()
					},
					success: function(data) {
						$(".loading").hide(500);
						$("#message_admin_login").removeClass();
							if (data.error === true) {
								$("#message_admin_login").addClass("message-error");
								$("#message_admin_login").text(data.msg).show(500);
								$("#admin-login-form").show(500);
							}
							else { 
								$("#message_admin_login").addClass("message-success");
								$("#login_head").hide(0);
								$("#admin_navigation").show(1000);
							}
						},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(".loading").hide(500);
						$("#message_admin_login").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
						$("#admin-login-form").show(500);
					}
				});
				return false;
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

<body>

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
<h1>Admin Panel</h1>
<h1>You are allowed to edit or change your own profile here</h1>
</div>
</div>

</div><!-- END HEADER -->


<div class="centerBox">
<!-- START MAIN CONTAINER -->
<div class="container">
<div class="admin_info">
<?
	if (!isset($_SESSION['admin'])) {
?>
<h1 id="login_head"> Login </h1>
<div id="message_admin_login" style="display:none;">
 </div>
 <div id="admin-login-form">
<form method="post" action="join.php">
    <table>
    	<tr>
    		<td class="label"><h4>Username</h4></td>
    		<td class="field"><input class="input" autofocus="autofocus" id="username" required="required" name="username" type="text" /></td>
        	<td class="status"></td>
    	</tr>
        
    	<tr>
        	<td class="label"><h4>Password</h4></td>
    		<td class="field"><input class="input" id="password" required="required"name="password" type="password" /></td>
            <td class="status"></td>
        </tr>
    </table>
    <input type="image" src="../images/submit.png" value="Submit" name="submit" id="submit" />
    </form>
</div>
<div id="admin_navigation" style="display:none">
	<a href="./admin_members.php"><h1> MEMBER MANAGEMENT </h1></a>
    <a href="./admin_items.php"><h1> ITEM MANAGEMENT </h1></a>
    <a id="logout" href="./admin_logout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('logout_button','','../images/buttons/logout_hover.png',1)"><img src="../images/buttons/logout.png" name="logout_button" width="100" height="34" border="0" id="logout_button" /></a>
</div>
<?
	}
else {
	?>
<div id="admin_navigation">
	<a href="./admin_members.php"><h1> MEMBER MANAGEMENT </h1></a>
    <a href="./admin_items.php"><h1> ITEM MANAGEMENT </h1></a>
    <a id="logout" href="./admin_logout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('logout_button','','../images/buttons/logout_hover.png',1)"><img src="../images/buttons/logout.png" name="logout_button" width="100" height="34" border="0" id="logout_button" /></a>
</div>
<?
}
?>
<div class="loading" style="display:none">
    Please wait<br />
    <img src="../images/ajax-loader.gif" title="Loader" atl="Loader" />
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