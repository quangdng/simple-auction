<?
session_start();
if ($_SESSION['admin'] == "") {
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SimpleAuction - Items Management</title>
    
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
<a href="./admin_items_add.php"><h1>ADD ITEM</h1></a>
<a href="./admin_items_list.php"><h1>ITEM LIST</h1></a>
<a href="./index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('back_button','','../images/buttons/back_hover.png',1)"><img src="../images/buttons/back.png" alt="Back" name="back_button" width="100" height="34" border="0" id="back_button" /></a>
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