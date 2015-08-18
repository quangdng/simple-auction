<?php
session_start();
require("conf.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE user_Name = '$username'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
mysqli_close($connect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8" />
    <title>SimpleAuction - Member -> Change Password</title>
    <!-- Include CSS -->
    <link href="./css/ajax.css" rel="stylesheet" type="text/css" />
    
    <!-- Include Scripts -->	
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.min.js"></script>
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
		$(document).ready(function(e) {
			$("#user-password-form").validate({
				rules: {
					current_password: {
						required: true,
						minlength: 5,
						remote: "ajax_check_password.php"
					},
					password_new: {
						required: true,
						minlength: 5
					},
					password_new_confirm: {
						required: true,
						minlength: 5,
						equalTo: "#password_new"
					}
				},
				messages: {
					current_password: { 
						required: "Enter current password",
                		minlength: "Enter at least 5 characters",
						remote: "Password mismatch"
            		},
					password_new: {
						required: "Provide a password",
						minlength: "Enter at least 5 characters"
					},
					password_new_confirm: {
						required: "Provide a password",
						minlength: "Enter at least 5 characters",
						equalTo: "Enter the same password as above"
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
			$("#submit_password").click(function() {
				if ($("#user-password-form").valid() == true) {
					$(".loading").show(500);
					$("#user-password-form").hide(0);
					$("#message_password").hide(0);
					
					
					$.ajax({
						type: 'POST',
						url: 'ajax_member_password.php',
						dataType: 'json',
						data: {
							user: '<? echo $row['user_Name']; ?>',
							password: $("#current_password").val(),
							password_new: $("#password_new").val()
						},
						success: function(data) {
							$(".loading").hide(500);
							$("#message_password").removeClass();
							if (data.error === true) {
								$("#message_password").addClass("message-error");	
							}
							else $("#message_password").addClass("message-success");
							$("#message_password").text(data.msg).show(500);
							if (data.error === true) {
								$("#user-password-form").show(500);
							}
							else {
								$("#message_reload").show(500);
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							$(".loading").hide(500);
							$("#message_password").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
							$("#user-password-form").show(500);
							
						}
					});
				}
				return false;
			});
		});
 
	</script>
</head>
<body>
<!-- START MAIN CONTAINER -->
<div class="centerBox">
<div class="container">
<h1>Change Password</h1>
	<div id="message_password" style="display:none">
    </div>
    <div id="message_reload" style="display:none">
    <br />
    <a style="vertical-align:middle;"id="logout" href="./logout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('logout_button','','images/buttons/logout_hover.png',1)"><img src="images/buttons/logout.png" name="logout_button" width="100" height="34" border="0" id="logout_button" /></a> <h5 style="display:inline;"> to try new password </h5>
    </div>
	<div class="form-container">
      		<form id="user-password-form" class="common-form">
    <table>
    	<tr>
    		<td class="label"><h4>Current Password</h4></td>
    		<td class="field"><input class="input" autofocus="autofocus" id="current_password" name="current_password" type="password" /></td>
        	<td class="status"></td>
    	</tr>
        
    	<tr>
        	<td class="label"><h4>New Password</h4></td>
    		<td class="field"><input class="input" id="password_new" name="password_new" type="password" /></td>
            <td class="status"></td>
        </tr>
        <tr>
        	<td class="label"><h4>Retype New Password</h4></td>
            <td class="field"><input class="input" id="password_new_confirm" name="password_new_confirm" type="password" /></td>
            <td class="status"></td>
        </tr>
 
	</table>
    <p align="left">
    <input type="image" src="./images/submit.png" value="Submit" name="submit_password" id="submit_password" />
    </p>
    </form>
	</div>
    <div class="loading" style="display:none">
    Please wait<br />
    <img src="images/ajax-loader.gif" title="Loader" atl="Loader" />
    </div>
  </div>
       <br class="clear" />
       <br class="clear" />
    </div>
    
</div><!-- END MAIN CONTAINER -->


</body>
</html>