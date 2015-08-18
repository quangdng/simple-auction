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
    <title>SimpleAuction - Member -> Change Address</title>
    <!-- Include CSS -->
    <link href="./css/ajax.css" rel="stylesheet" type="text/css" />
    
    <!-- Include Scripts -->	
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
		$(document).ready(function(e) {
			$("#submit_address").click(function() {
				$(".loading").show(500);
				$("#user-address-form").hide(0);
				$("#message_address").hide(0);
					
				$.ajax({
					type: 'POST',
					url: 'ajax_member_address.php',
					dataType: 'json',
					data: {
						user: '<? echo $row['user_Name']; ?>',
						address: $("#address").val(),
						postal: $("#postal").val()
					},
					success: function(data) {
						$(".loading").hide(500);
						$("#message_address").removeClass();
						if (data.error === true) {
							$("#message_address").addClass("message-error");
						}
						else $("#message_address").addClass("message-success");
							$("#message_address").text(data.msg).show(500);
							$("#user-address-form").show(500);
						},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(".loading").hide(500);
						$("#message_address").removeClass().addClass("message-error").text("There was an AJAX error").show(500);
						$("#user-address-form").show(500);
					}
				});
				return false;
			});
		});
 
	</script>
</head>
<body>
<!-- START MAIN CONTAINER -->
<div class="centerBox">
<div class="container">
<h1>Change Address</h1>
	<div id="message_address" style="display:none;">
    </div>
	<div class="form-container">
      		<form id="user-address-form" class="common-form">
    <table>
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
    <p align="left">
    <input type="image" src="./images/submit.png" value="Submit" name="submit_address" id="submit_address" />
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