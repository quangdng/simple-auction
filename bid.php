<?php
session_start();
require("conf.php");
if ($_SESSION['username'] == "" )
	header("Location: login_panel.php");
else {
	$itemid = $_GET['id'];
	$user = $_SESSION['username'];
	
	$sql_user = "SELECT * FROM users WHERE user_Name = '$user'";
	
	$result_user = mysqli_query($connect, $sql_user);
	
	$row_user = mysqli_fetch_array($result_user);
	
	$sql_item = "SELECT * FROM items WHERE item_ID = '$itemid'";
	
	$result_item = mysqli_query($connect, $sql_item);
	
	$row_item = mysqli_fetch_array($result_item); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8" />
    <title>SimpleAuction - Bidding</title>

    <!-- Include CSS -->
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link href="./css/slimbox2.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <link href="./css/start/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
     <link href="./css/jquery.countdown.css" rel="stylesheet" type="text/css" />

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
    <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="./js/jquery.countdown.js"></script>
    <script type="text/javascript">
	setInterval("update()", 1000);
	function update() {
		$.getJSON('ajax_bid_update.php',{itemid: <? echo $itemid; ?>, userid: <? echo $_SESSION['userid']; ?>},function(data) {
			$("#highest_bidder").text(data.bidder);
			$("#actual_price").text(data.price);
			if(data.status == 1) {
				$("#time_box").countdown("destroy");
				$("#bid").hide(0);
				$("#ended").show(0);
			}
			else {
				$("#time_box").countdown('change', {
					until: new Date(data.date)
				});
			}
			$("#simoleon").text(data.simoleon);
			$("#bid_history").load('ajax_bid_history.php', {itemid: <? echo $itemid; ?>, userid: <? echo $_SESSION['userid']; ?>} );
		});
	}
	function highlight(periods) {
		if ($.countdown.periodsToSeconds(periods) <= 30) { 
        	$(this).addClass('highlight'); 
    	}
		else {
			$(this).removeClass('highlight');
		}
	}
	
	$(document).ready(function() {
		 <?
		if ($row_item['item_Status'] == 0) {
        ?>
		$("#time_box").countdown({
			until: new Date("<? echo $row_item['item_Close_Date'] ?>"),
			onTick: highlight,
			onExpiry: function() {
				$.ajax({
					type: 'POST',
					url: 'ajax_bid_winner_process.php',
					data: {
						itemid: <? echo $itemid; ?>
					},
					dataType: 'json',
					success: function(data) {
						$("#bid").hide(0);
						$("#ended").show(0);
						$("#time_box").countdown("destroy");
					}
				});
			}
		});
		<?
		}
		?>
		$("#bid").click(function() {
			$.ajax({
				type: 'POST',
				url: 'ajax_bid_process.php',
				data: {
					userid: <? echo $_SESSION['userid']; ?>,
					username: '<? echo $user; ?>',
					itemid: <? echo $itemid; ?>
				},
				dataType: 'json',
				success: function(data) {
					if (data.error === 1) {
						alert("You are already the highest bidder");
					}
					else if (data.error === 2) {
						alert("You are out of simoleons");
					}
					else {
						update();
						$("#time_box").removeClass('highlight');
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
				if($_SESSION['username'] != "")
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
				if($_SESSION['username'] == "") {
	?>
	<a id="login" href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('login_button','','images/buttons/login_hover.png',1)"><img src="images/buttons/login.png" name="login_button" width="100" height="34" border="0" id="login_button" /></a>
	<a id="register" href="./register.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('signup_button','','images/buttons/signup_hover.png',1)"><img src="images/buttons/signup.png" name="signup_button" width="100" height="34" border="0" id="signup_button" /></a>
	<?
	}
	else {
		$username = $_SESSION['username'];
		$sql = "SELECT user_Name, user_Credit FROM users WHERE user_Name = '$username'";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($result);
		echo "<h6>Weclome back , <b>".$row[0]."</b></h6>";
		echo "<h6>You have : <b><span id='simoleon'>".$row[1]."</span> Simoleons</b> in your account. </h6>";
	?>
    	<a id="logout" href="./logout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('logout_button','','images/buttons/logout_hover.png',1)"><img src="images/buttons/logout.png" name="logout_button" width="100" height="34" border="0" id="logout_button" /></a>
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
    <h1>Auction Details</h1>
  <div id="itemContain" class="itemContain">
  		
    	<div id="bid_image">
        	<img src="<? echo str_replace("..",".",$row_item['item_Path']); ?>" />
            <h1><? echo $row_item['item_Name']; ?></h1>
        </div>
        
        <div id="bid_history" style="text-align:center"></div>
       
        <div id="bid_box">
         <h5 style="margin:0px;">Current Highest Bidder<br /><span id="highest_bidder" style="color:orange"><? echo $row_item['user_Name']; ?></span></b></h5>
         <h5 style="margin:0px;color:red">S$<span id="actual_price"><? echo $row_item['item_Actual_Price']; ?></span></h5>  
        <div id="time_box">
        </div>
        <?
		if ($row_item['item_Status'] == 0) {
        echo '<img id="bid" style="margin-top:20px;" src="./images/buttons/bid.png" /><br />';
		}

		?>
        <span id="ended" style="display: none;"><img style="margin-top:20px;" src="./images/buttons/ended.png" /><br /></span>
         <?
		if ($row_item['item_Status'] == 0) {
			?>
        <b><span id="price_per_bid" style='color: green'>S$<? echo $row_item['item_Increment_Price']; ?></b> per bid</span>
        <?
		}
		?>
        </div>
        <div id="bid_description">
        	<h3> Description </h3>
        	<? echo $row_item['item_Description']; ?>
        </div>
        </div>
    </div>

  <!-- END Auction Item CONTAINER -->
    
    
    
</div><!-- END MAIN CONTAINER -->

 <br class="clear" />
  <br class="clear" />
   <br class="clear" />
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
<?
mysqli_close($connect);
?>