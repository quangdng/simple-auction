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
    <title>SimpleAuction - Member -> User Information</title>
    <!-- Include CSS -->
    <link href="./css/ajax.css" rel="stylesheet" type="text/css" />
    
    <!-- Include Scripts -->	
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
		$(document).ready(function(e) {
			$("#user-mem-form").validate({
				rules: {
					tel: {
						required: true,
						digits: true,
						minlength: 8
					},
					email: {
						required: true,
						email: true,
					}
				},
				messages: {
					email: { 
                		required: "Please enter a valid email address", 
                		email: "Please enter a valid email address"
            		},
					tel: {
						required: "Please enter a phone number",
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
			$("#submit_user").click(function() {
				if ($("#user-mem-form").valid() == true) {
					$(".loading").show(500);
					$("#user-mem-form").hide(0);
					$("#message_user").hide(0);
					
					
					$.ajax({
						type: 'POST',
						url: 'ajax_member_user.php',
						dataType: 'json',
						data: {
							user: '<? echo $row['user_Name']; ?>',
							email: $("#email").val(),
							realname: $("#realname").val(),
							tel: $("#tel").val()
						},
						success: function(data) {
							$(".loading").hide(500);
							$("#message_user").removeClass();
							if (data.error === true) {
								$("#message_user").addClass("message-error");
							}
							else $("#message_user").addClass("message-success");
							$("#message_user").text(data.msg).show(500);
							$("#user-mem-form").show(500);
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							$(".loading").hide(500);
							$("#message_user").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
							$("#user-mem-form").show(500);
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
<h1>User Information</h1>
	<div id="message_user" style="display:none">
    </div>
	<div class="form-container">
      		<form id="user-mem-form" class="common-form">
    <table>
    	<tr>
    		<td class="label"><h4>Login ID</h4></td>
    		<td class="field"><input class="input" disabled="disabled" value="<? echo $row['user_Name']; ?>" id="username" name="username" type="text" /></td>
        	<td class="status"></td>
    	</tr>
        
    	<tr>
        	<td class="label"><h4>Real Name</h4></td>
    		<td class="field"><input class="input" value="<? echo $row['user_RealName']; ?>" id="realname" name="realname" type="text" /></td>
            <td class="status"></td>
        </tr>
        <tr>
        	<td class="label"><h4>Contact Number</h4></td>
            <td class="field"><input class="input" value="<? echo $row['user_Phone']; ?>"  id="tel" name="tel" type="text" /></td>
            <td class="status"></td>
        </tr>
    	<tr>
        	<td class="label"><h4>E-mail address</h4></td>
    		<td class="field"><input class="input" value="<? echo $row['user_Email']; ?>" id="email" name="email" type="text" /></td>
            <td class="status"></td>
        </tr>
 
	</table>
    <p align="left">
    <input type="image" src="./images/submit.png" value="Submit" name="submit_user" id="submit_user" />
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