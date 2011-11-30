<!DOCTYPE HTML>
<html id="todo" xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php
	$pg = '';
	if (!isset($_GET['pg']))
		echo TITLE; 
	else
		echo "Vidali";
	?>
	</title>

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="../1.3.0/bootstrap.css" rel="stylesheet">

    
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon" />
	<script type="text/javascript" src="js/jquery.js" ></script>
	<script type="text/javascript" src="js/jquery_scroller.js" ></script>
<?php /*<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script> 	
	<script type="text/javascript" src="js/fancybox/jquery.easing-1.4.pack.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.imgareaselect.min.js"></script>
*/?>
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/style.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/home.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/prof.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/net.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/not.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/head.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/body.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/foot.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/other.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/form.less" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" id="theme">
	<link rel="stylesheet" href="js/jquery_file_upload/jquery.fileupload-ui.css">
	<script type="text/javascript" src="js/less.js"></script>
	<?php
		include_once("vdl-themes/default/scripts/script1.html");
	?>
<script>
	$(document).ready(function() {

	/* This is basic - uses default settings */
	
	$("a.modal").fancybox({
	'padding' : 0,
	'type' : 'ajax',
	'titleShow' : false
	});
	
	/* Using custom settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	/* Apply fancybox to multiple items */
	
	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
	
});
</script>

</head>
<body>

<header class="topbar">
	<div class="topbar-inner">
		<div class="container-fluid">
			<div class="row">
				<div id="tittle" class="span4">
					<a class="brand" href="index.php"><img src="vdl-media/vdl-images/logo.png" border="0"></a>
				</div>
				<div class="pull-right">
					<ul class="nav">
						<?php $pg=""; if(isset($_GET['pg'])) $pg=$_GET['pg']; ?>
						<?php if($pg == "") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="index.php"><img src="vdl-media/vdl-images/home.png"></a></li>
						<?php if($pg == "p")
							echo '<li class="active">';
							else
							echo '<li>';?>
							<a href="?pg=p&!=all&@=<?php echo $_SESSION["nickname"] ?>"><img src="vdl-media/vdl-images/profile.png"></a></li>
						<?php if($pg == "g")
							echo '<li class="active">';
							else
							echo '<li>';?>
							<a href="?pg=g"><img src="vdl-media/vdl-images/groups.png"></a></li>
						<?php if($pg == "n")
							echo '<li class="active">';
							else
							echo '<li>';?>
							<a href="?pg=n"><img src="vdl-media/vdl-images/networks.png"></a></li>
						<?php if( $pg == "media") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=media"><img src="vdl-media/vdl-images/files.png"></a></li>
							<li>
								<img src="style/icons/mail.png">
							</li>
							<li>
								<?php echo'<a href="vdl-includes/log.php?func=logout" title="'.M_LOU.'"><img src="style/icons/lock.png"></a>';?>
							</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</header>

<?php include("vdl-includes/content.php"); ?>

<div id="din" class="container-fluid">
	<aside class="sidebar">
		<?php		require_once("vdl-actions/index.php"); ?>
	</aside>
	<div class="content">
       	<div class="hero-unit">
       		<?php 
       		if($pg == "")
				include("vdl-themes/default/home.php");
       		if($pg == "p")
				include("vdl-themes/default/prof.php");
       		if($pg == "g")
				include("vdl-themes/default/groups.php");
       		if($pg == "n")
				include("vdl-themes/default/nets.php");
       		?>
		</div>
		<?php //<a href="#"  onclick="javascript:recargar('grupos'); click('grupos');">recargar</a>?>
		<a href="#"  onclick="javascript:recargar('grupos');">recargar</a>
		<?php include_once("footer.php");?>
	</div>
</div>




<?php 
	include_once("staticbar.php");
?>
<script type="text/javascript">
reformal_wdg_domain    = "vidali";
reformal_wdg_mode    = 0;
reformal_wdg_title   = "Vidali";
reformal_wdg_ltitle  = "Feedback";
reformal_wdg_lfont   = "Verdana, Geneva, sans-serif";
reformal_wdg_lsize   = "11px";
reformal_wdg_color   = "#bac756";
reformal_wdg_bcolor  = "#516683";
reformal_wdg_tcolor  = "#FFFFFF";
reformal_wdg_align   = "right";
reformal_wdg_waction = 0;
reformal_wdg_vcolor  = "#9FCE54";
reformal_wdg_cmline  = "#E0E0E0";
reformal_wdg_glcolor  = "#105895";
reformal_wdg_tbcolor  = "#FFFFFF";
 
reformal_wdg_bimage = "bea4c2c8eb82d05891ddd71584881b56.png";
 
</script>

<script type="text/javascript" language="JavaScript" src="http://idea.informer.com/tab6.js?domain=vidali"></script>
<noscript><a href="http://vidali.idea.informer.com">Vidali feedback </a> 
<a href="http://idea.informer.com">
<img src="http://widget.idea.informer.com/tmpl/images/widget_logo.jpg" /></a>
</noscript>

</body>
</html>
