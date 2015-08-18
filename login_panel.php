<?php
session_start();
if (isset($_SESSION['username'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8" />
    <title>SimpleAuction - Login Panel</title>

    <!-- Include CSS -->
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link href="./css/slimbox2.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <link href="./css/start/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />

    <!-- Include Scripts -->	
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.lite.min.js"></script>
    <script type="text/javascript" src="js/jquery.pngFix.pack.js"></script>
    <script type="text/javascript" src="js/jquery.color.js"></script>
    <script type="text/javascript" src="js/hoverIntent.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/slimbox2.js"></script>
    <script type="text/javascript" src="js/slides.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>	
 	<script type="text/javascript" src="./js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
			$("#dialog-login").dialog("destroy");
			$("#login").click(function(){
				$("#dialog-login").dialog({
					height: 200,
					width: 200,
					modal: true,
					buttons: {
						"Sign In": function() {
							$("#login-form").submit();
						},
						"Cancel": function() {
							$(this).dialog("close");
						}
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
    <?
		if (isset($_SESSION['error'])) {
	?>
    	<script type="text/javascript">
			alert("Username or Password is incorrect");
		</script>
	<?		
			$_SESSION['error'] = 0;
		}
	?> 
</head>
<body onload="MM_preloadImages('images/buttons/login_hover.png')">

<!-- START HEADER -->
<div id="header">

	<div class="container">
    
    	<div id="primary-nav" class="header-right">
        
            <ul class="sf-menu">
                <li class="current"><a href="./index.php">Home</a></li>                <li><a href="./ended.php">Ended Auctions</a></li>
                <li><a href="./about.php">About Us</a></li>	
                <?php
				if (isset($_SESSION['username']))
					echo '<li id="member"><a href="./member.php">Member</a></li>';
				
				?>
                
             </ul>
        </div>
        
        <!-- LOGO -->        
    	<a href="./index.php"><img src="./images/logo.png" border="0" alt="Simple Auction" /></a>
        
        <br class="clear" />
 
    </div>
    
</div><!-- END HEADER -->


<!-- HEADER DIVIDER -->
<div id="head-break">
<div class="outer">
<div id="login-reg">
	<a id="login" href="./login_panel.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('login_button','','images/buttons/login_hover.png',1)"><img src="images/buttons/login.png" name="login_button" width="100" height="34" border="0" id="login_button" /></a>
	<a id="register" href="./register.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('signup_button','','images/buttons/signup_hover.png',1)"><img src="images/buttons/signup.png" name="signup_button" width="100" height="34" border="0" id="signup_button" /></a>	
</div>		
</div>
</div><!-- END HEADER DIVIDER -->


<!-- START MAIN CONTAINER -->
<div class="centerBox">
<div class="container">
	<div id="loginBox">
    	<h4> User Login </h4>
    	<form id="login-form" action="login.php" method="POST">
        	<table>
            <tr>
        		<td><label for="username">Username</label></td>
            	<td><input type="text" required="required" name="username" id="username" class="input" /></td>			
            </tr>
            <tr>
            	<td><label for="password">Password</label></td>
            	<td><input type="password" required="required" name="password" id="password" class="input" /></td>
           	</tr>
            </table><br />
            <input type="image" src="./images/buttons/login.png" value="Submit" name="submit" id="submit" />
        </form>
    </div>
    <div id="register-box">
    <a href="./register.php"><img src="./images/signup_banner.png" /></a>
    </div>
    
    
    <br class="clear" />
    <br class="clear" />
    <br class="clear" />
    
</div><!-- END MAIN CONTAINER -->


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