<?php
session_start();
require("conf.php");
if (isset($_SESSION['username']))
	header("Location: index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8" />
    <title>SimpleAuction - Registration</title>

    <!-- Include CSS -->
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
     <link href="./css/ajax.css" rel="stylesheet" type="text/css" />
    <link href="./css/slimbox2.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <link href="./css/start/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />

    <!-- Include Scripts -->	
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./js/jquery.cycle.lite.min.js"></script>
    <script type="text/javascript" src="./js/jquery.pngFix.pack.js"></script>
    <script type="text/javascript" src="./js/jquery.color.js"></script>
    <script type="text/javascript" src="./js/hoverIntent.js"></script>
    <script type="text/javascript" src="./js/superfish.js"></script>
    <script type="text/javascript" src="./js/slimbox2.js"></script>
    <script type="text/javascript" src="./js/slides.min.js"></script>
    <script type="text/javascript" src="./js/custom.js"></script>	
 	<script type="text/javascript" src="./js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
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
$(document).ready(function() {
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
			$("#register-form").validate({
				rules: {
					username: {
						required: true,
						remote: "ajax_check_username.php",
						minlength: 3
					},
					mypassword: {
						required:true,
						minlength: 5
					},
					password_confirm: {
						required: true,
						minlength: 5,
						equalTo: "#mypassword"
					},
					email: {
						required: true,
						email: true,
						remote: "ajax_check_email.php"
					},
					email_confirm: {
						required: true,
						email: true,
						equalTo: "#email"
					},
					telephone: {
						required: true,
						digits: true,
						remote: 'ajax_check_phone.php',
						minlength: 8
					},
					terms: {
						required: true
					}
				},
				messages: {
					username: {
						required: "Enter an username",
						minlength: jQuery.format("Enter at least {0} characters"),
						remote: "This username is already in use"
					},
					mypassword: {
						required: "Provide a password",
						minlength: jQuery.format("Enter at least {0} characters")
					},
					password_confirm: { 
                		required: "Repeat your password", 
                		minlength: jQuery.format("Enter at least {0} characters"), 
                		equalTo: "Enter the same password as above" 
            		},
					email: { 
                		required: "Please enter a valid email address", 
                		email: "Please enter a valid email address", 
                		remote: "This email is already in use"
            		},
					email_confirm: { 
                		required: "Repeat your email", 
                		email: "Please enter a valid email address", 
                		equalTo: "Enter the same email as above"
            		},
					telephone: {
						remote: "This phone number is already in use",
						minlength: "Please enter an 8-digits phone number"
					}
				},
				errorPlacement: function(error, element) {
					if (element.is(":checkbox")) {
						error.appendTo(element.next().next());
					}
					else {
						error.appendTo(element.parent().next());
							}
					},
				success: function(label) {
					label.addClass("valid");
				} 
			});
			$("#submit").click(function() {
				if ($("#register-form").valid() == true) {
					$(".loading").show(500);
					$("#register-form").hide(0);
					$("#message").hide(0);
					
					
					$.ajax({
						type: 'POST',
						url: 'join.php',
						dataType: 'json',
						data: {
							user: $("#user").val(),
							password: $("#mypassword").val(),
							email: $("#email").val(),
							tel: $("#telephone").val()
						},
						success: function(data) {
							$(".loading").hide(500);
							$("#message").removeClass();
							$("#success").show(500);
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							$(".loading").hide(500);
							$("#message").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
							$("#register-form").show(500);
						}
					});
				}
				return false;
			});
			
		});

    </script>    
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
	<?php
				if(isset($_SESSION['username'])) {
					$username = $_SESSION['username'];
		$sql = "SELECT user_Name, user_Credit FROM users WHERE user_Name = '$username'";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($result);
		echo "<h6>Weclome back , <b>".$row[0]."</b></h6>";
		echo "<h6>You have : <b>".$row[1]." Simoleons</b> in your account. </h6>";
		mysqli_close($connect);
	?>
    	<a id="logout" href="./logout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('logout_button','','images/buttons/logout_hover.png',1)"><img src="images/buttons/logout.png" name="logout_button" width="100" height="34" border="0" id="logout_button" /></a>
    <?
		}	
	else {
		
	?>
	
	<a id="login" href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('login_button','','images/buttons/login_hover.png',1)"><img src="images/buttons/login.png" name="login_button" width="100" height="34" border="0" id="login_button" /></a>
	<a id="register" href="./register.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('signup_button','','images/buttons/signup_hover.png',1)"><img src="images/buttons/signup.png" name="signup_button" width="100" height="34" border="0" id="signup_button" /></a>
    
    <?
	}
	?>
				
</div>
</div>
</div><!-- END HEADER DIVIDER -->


<!-- START MAIN CONTAINER -->
<div class="centerBox">
<div class="container">
	<div id="dialog-login" style="display:none" title="Login Box">
    	<form id="login-form" action="login.php" method="POST">
        <fieldset>
        	<label for="username">Username</label><br />
            <input type="text" name="username" id="username" class="text ui-widget-content ui-corner-all" /><br />
            <label for="password">Password</label><br />
            <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all" />
        </fieldset>
        </form>
    </div>
	<!-- START Auction Item CONTAINER -->
    <h1>Fill in your registration information</h1>
  <div id="itemContain" class="itemContain">
  <div id="message" style="display:none">
    </div>
    <div id="success" style="display:none; text-align: center; margin-top: 150px;">
    <h1>Your Registration Is Succeeded</h1>
    <a href="./login_panel.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('login_button','','images/buttons/login_hover.png',1)"><img src="images/buttons/login.png" name="login_button" width="100" height="34" border="0" id="login_button" /></a>
    </div>
     <div class="form-container" style="margin-top: 15px;">
	<form id="register-form" method="post" action="join.php">
    <table>

    	<tr>
    		<td class="label"><h4>Username</h4></td>
    		<td class="field"><input class="input" id="user" name="username" type="text" /></td>
        	<td class="status"></td>
    	</tr>
        
    	<tr>
        	<td class="label"><h4>Password</h4></td>
    		<td class="field"><input class="input" id="mypassword" name="mypassword" type="password" /></td>

            <td class="status"></td>
        </tr>
        <tr>
        	<td class="label"><h4>Confirm Password</h4></td>
            <td class="field"><input class="input" id="password_confirm" name="password_confirm" type="password" /></td>
            <td class="status"></td>
        </tr>
    	<tr>

        	<td class="label"><h4>E-mail address</h4></td>
    		<td class="field"><input class="input" id="email" name="email" type="email" /></td>
            <td class="status"></td>
        </tr>
    	<tr>
        	<td class="label"><h4>Confirm E-mail</h4></td>
        	<td class="label"><input class="input" id="email_confirm" name="email_confirm" type="email" /></td>
            <td class="status"></td>

        </tr>
    	<tr>
        	<td class="label"><h4>Telephone</h4></td>
    		<td class="field"><input class="input" id="telephone" name="telephone" type="tel" /></td>
            <td class="status"></td>
        </tr>
        <tr>
         	<td class="label">&nbsp;</td>

			<td class="field" colspan="2">
			<div id="termswrap">
        		<input id="terms" type="checkbox" name="terms" />
                <label id="lterms" for="terms">I have read and accept the Terms of Use.</label><b style="padding:15px"></b>
			</div>
             <!-- /termswrap -->
	  		</td>
	  </tr>

	</table>
    <p class="button">
    <input type="image" src="./images/submit.png" value="Submit" name="submit" id="submit" />
    </p>
    </form>
    </div>
    	<div class="loading" style="display:none; width: 100%; margin-top: 150px;">
    Please wait<br />
    <img src="images/ajax-loader.gif" title="Loader" atl="Loader" />
    </div>
  </div>
    </div>

  <!-- END Auction Item CONTAINER -->
    
    
    
</div><!-- END MAIN CONTAINER -->
<br class="clear" />
<br class="clear" /><br class="clear" />
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
