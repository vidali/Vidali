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
 
	<link rel="shortcut icon" href="vdl-themes/default/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/css/style.css" />
	<script type="text/javascript" src="vdl-themes/default/js/jquery.js" ></script>
	<script type="text/javascript" src="vdl-themes/default/js/bootstrap.js" ></script>
	<script type="text/javascript" src="vdl-themes/default/js/bootstrap-dropdown.js" ></script>
	<link rel="stylesheet" href="vdl-themes/default/js/jquery-ui.css" id="theme" />
	<link rel="stylesheet" type="text/less" href="vdl-themes/default/css/head.less" />	
	<link rel="stylesheet" type="text/less" href="vdl-themes/default/css/static.less" />	
	<script type="text/javascript" src="vdl-themes/default/js/less.js"></script>
    
<!--
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/home.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/prof.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/net.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/not.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/head.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/body.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/foot.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/other.less" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/form.less" />
-->
</head>
<body>

<header class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<div class="row">
				<div id="tittle" class="span4">
					<a class="brand" href="index.php"><img src="vdl-themes/default/img/logo.png" border="0"></a>
				</div>
				<div class="pull-right">
					<ul class="nav">
						<?php $pg=""; if(isset($_GET['pg'])) $pg=$_GET['pg']; ?>
						<?php if($pg == "") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="index.php"><img src="vdl-themes/default/img/home.png"></a></li>
						<?php if($pg == "p")
							echo '<li class="active">';
							else
							echo '<li>';?>
							<a href="?pg=p&@=<?php echo $_SESSION["nick"] ?>"><img src="vdl-themes/default/img/profile.png"></a></li>
						<?php if($pg == "g")
							echo '<li class="active">';
							else
							echo '<li>';?>
							<a href="?pg=g"><img src="vdl-themes/default/img/groups.png"></a></li>
						<?php if( $pg == "media") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=media"><img src="vdl-themes/default/img/files.png"></a></li>
							<li>
								<?php echo'<a href="vdl-include/log.php?func=logout" title="'.M_LOU.'"><img src="vdl-themes/default/img/lock.png"></a>';?>
							</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</header>

<?php include("vdl-include/content.php"); ?>

<div id="din" class="container-fluid">
	<div class="row-fluid">
		<aside class="span3">
			<div class="well sidebar">
				<?php		require_once("vdl-actions/index.php"); ?>
			</div>
		</aside>
		<div class="span6">
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
		</div>
		<aside class="span3">
			<div class="well sidebar">
				NOVEDADES:
			</div>
		</aside>
	</div>
		<?php include_once("footer.php");?>
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
