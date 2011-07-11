<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
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
	<script type="text/javascript" src="js/jquery.js" ></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.easing-1.4.pack.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/style.php" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/form.css" />
	<?php load_mainscripts();
		include("vdl-themes/default/scripts/script1.html");
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

<script type="text/javascript">
reformal_wdg_domain    = "vidali";
reformal_wdg_mode    = 1;
reformal_wdg_title   = "Vidali";
reformal_wdg_ltitle  = "Feedback";
reformal_wdg_lfont   = "Verdana, Geneva, sans-serif";
reformal_wdg_lsize   = "11px";
reformal_wdg_color   = "#FFA000";
reformal_wdg_bcolor  = "#516683";
reformal_wdg_tcolor  = "#FFFFFF";
reformal_wdg_align   = "";
reformal_wdg_waction = 0;
reformal_wdg_vcolor  = "#9FCE54";
reformal_wdg_cmline  = "#E0E0E0";
reformal_wdg_glcolor  = "#105895";
reformal_wdg_tbcolor  = "#FFFFFF";
 
reformal_wdg_bimage = "bea4c2c8eb82d05891ddd71584881b56.png";
 
</script>

</head>
<body>
<header>
	<div id="line">
		<div class="container_16">
			<div id = "logo" class="grid_4">
					<a href="index.php"><img src="vdl-media/vdl-images/logo.png" border="0"></a>
			</div>
			<div id="menu" class="grid_7 prefix_5">
				<nav>
					<ul>
						<?php $pg=""; if(isset($_GET['pg'])) $pg=$_GET['pg']; ?>
						<?php /*
						<?php if( $pg == "media") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=media"><?php echo M_MED; ?></a></li>
						<?php if($pg == "notes") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=notes"><?php echo M_NOT; ?></a></li>*/
						?>
						<?php if($pg == "n") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=n">Redes</a></li>
						<?php if($pg == "p") 
							echo '<li class="active">';
						else
							echo '<li>';?>							
							<a href="?pg=p&nick=<?php echo $_SESSION["nickname"] ?>"><?php echo M_PRF; ?></a></li>
						<?php if($pg == "") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="index.php">Home</a></li>
					</ul>
				</nav>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>

<section id="container">
	<div id="container-line">
		<div class="container_16">
			<div id ="page_name" class="grid_16">
				<?php
					if (!isset($_GET['pg']))
						echo "Home";
					else if ($_GET['pg'] == "p")
						echo "Home > Perfil";
					else if ($_GET['pg'] == "notes")
						echo "Home > Notas";
					else if ($_GET['pg'] == "media")
						echo "Home > Archivos";
					else if ($_GET['pg'] == "n")
						echo "Home > Redes";
				?>
			</div>
			<span id="recargar"><?php include("vdl-includes/content.php");?></span>
		</div>	
	</div>
</section>

<?php 
	include_once("footer.php");
?>

<div id="globo">
<span>Actualiza tu estado:</span><br>
<textarea id="mensaje" style="width:388px;" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea><br>
<span style="float:right;"><span id="contador"></span>
<input type="button" value="Actualiza!" OnClick="actualiza(document.getElementById('mensaje').value)">
</span>
</div>


<?php 
	include_once("taskbar.php");
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

<script type="text/javascript" language="JavaScript" src="http://idea.informer.com/tab6.js?domain=vidali">
</script><noscript><a href="http://vidali.idea.informer.com">Vidali feedback </a> 
<a href="http://idea.informer.com">
<img src="http://widget.idea.informer.com/tmpl/images/widget_logo.jpg" /></a>
</noscript>

</body>
</html>
