<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
		Vidali
	</title>

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le styles -->
 
	<link rel="shortcut icon" href="/Vidali/vdl-themes/default/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/Vidali/vdl-themes/default/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/Vidali/vdl-themes/default/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="/Vidali/vdl-themes/default/css/style.css" />
	<script type="text/javascript" src="/Vidali/vdl-themes/default/js/jquery.js" ></script>
	<script type="text/javascript" src="/Vidali/vdl-themes/default/js/bootstrap.js" ></script>
	<script type="text/javascript" src="/Vidali/vdl-themes/default/js/script_default.js" ></script>
	<link rel="stylesheet" href="/Vidali/vdl-themes/default/js/jquery-ui.css" id="theme" />
	<link rel="stylesheet" type="text/less" href="/Vidali/vdl-themes/default/css/head.less" />	
	<link rel="stylesheet" type="text/less" href="/Vidali/vdl-themes/default/css/static.less" />	
	<link rel="stylesheet/less" type="text/css" href="/Vidali/vdl-themes/default/css/prof.less" />
	<script type="text/javascript" src="/Vidali/vdl-themes/default/js/less.js"></script>

</head>
<body>
<header class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<div class="row">
				<div id="tittle" class="span8 offset2">
					<a class="brand" href="/Vidali"><img src="img/logo.png" border="0"></a>
				</div>
				<div id="menu" class="span2">
					<a href="/Vidali/?action=logout" title="logout"><img src="img/lock.png"></a>
				</div>
			</div>
		</div>
	</div>
</header>


<div id="nav" class="navbar">
  <div class="navbar-inner">
	  {{MENU}}
  </div>
</div>
{{CONTENT}}

<div id="din" class="container-fluid">
	<div class="row-fluid">
		<aside class="span3">
			<div class="well sidebar">
				{{ACTIONS}}
			</div>
		</aside>
		<div class="span6">
			<div class="hero-unit">
				{{PAGE}}
			</div>
		</div>
		<aside class="span3">
			<div class="well sidebar">
				Noticias:<br>
					{{NOTIFY}}
			</div>
		</aside>
	</div>
</div>
		
	<footer class="footer">
		<div class="container">
			<p class="pull-right"><img src="img/html5.png"><img src="img/agpl.png"></p>
			<p>Powered by Vidali.</p>
		</div>
	</footer>

<div id="feedbar">
<div id="din" class="container-fluid">
	<div class="row-fluid">
		<aside class="span3">
			<div id="invisible" class="well sidebar">
				{{CARD}}
			</div>
		</aside>
		<div class="span6">
			<form class="form-inline" action="/Vidali/vdl-include/set_update.php" method="post">
				<textarea id="update" name="update" class="span12" rows="2" placeholder="Actualiza tu estado"></textarea>
				<button class="btn btn-inverse"><i class="icon-star icon-white"></i></button>
				<button class="btn btn-inverse"><i class="icon-map-marker icon-white"></i></button>
				<button class="btn btn-inverse"><i class="icon-upload icon-white"></i></button>
				<button type="submit" class="btn btn-primary pull-right"><i class="icon-ok icon-white"></i></button>
			</form>
		</div>
		<aside class="span3">
			<div id="invisible" class="well sidebar">
				<button class="btn btn-inverse"><i class="icon-book icon-white"></i></button>
				<button class="btn btn-inverse"><i class="icon-picture icon-white"></i></button>
				<button class="btn btn-inverse"><i class="icon-picture icon-white"></i></button>
				<button class="btn btn-inverse"><i class="icon-picture icon-white"></i></button>
				<button class="btn btn-inverse"><i class="icon-plus icon-white"></i></button>
			</div>
		</aside>
	</div>
</div>
</div>

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
