<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vidali</title>
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	  <script src="js/html5.js"></script>
	<![endif]-->
	<!-- Le styles -->
	{{ROUTES}}
	<link rel="shortcut icon" href="vdl-themes/Default/img/favicon.ico" type="image/x-icon" />
	<script type="text/javascript" src="vdl-themes/Default/js/jquery.js" ></script>
	<link rel="stylesheet" type="text/css" href="vdl-themes/Default/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="vdl-themes/Default/css/bootstrap-responsive.css"/>
	<link rel="stylesheet" href="vdl-themes/Default/css/jquery-ui.css" id="theme" />
	<link rel="stylesheet" type="text/less" href="vdl-themes/Default/css/head.less" />	
	<link rel="stylesheet" type="text/less" href="vdl-themes/Default/css/static.less" />	
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/Default/css/prof.less" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/Default/css/footer.less" />
	<script type="text/javascript" src="vdl-themes/Default/js/less.js"></script>
</head>
<body>
<nav id="side-menu">
	<h3><a href="#"class="btn btn-inverse showMenu"><i class="icon-th-list icon-white"></i> Ocultar</a></h3>
	<form class="form-search" style="margin: 5px !important; margin-bottom: 0px;">
	  <div class="input-append">
		<input type="text" class="search-query" style="width: 110px; padding: 4px 0px !important;">
		<button type="submit" class="btn search-button"><i class="icon-search"></i></button>
	  </div>
	</form>
	<ul>
		<li id="m-status" class="active"><a onclick="link('st');" class="contentLink"><i class="icon-edit icon-white"></i> Mi Estado </a></li>
		<li id="m-home" class="active"><a onclick="link('h');" class="contentLink"><i class="icon-home icon-white"></i> Home </a></li>
		<li id="m-msg"><a onclick="link('m');" class="contentLink"><i class="icon-envelope icon-white"></i> Mensajes </a></li>
		<li id="m-group"><a onclick="link('g');" class="contentLink"><i class="icon-globe icon-white"></i> Grupos</a></li>
		<li id="m-routes"><a onclick="link('r');" class="contentLink"><i class="icon-road icon-white"></i> Rutas</a></li>
		<li id="m-files"><a onclick="link('f');" class="contentLink"><i class="icon-folder-close icon-white"></i> Archivos</a></li>
		<li id="m-set"><a onclick="link('s');" class="contentLink"><i class="icon-wrench icon-white"></i> Ajustes</a></li>
		<li><a onclick="link('l');"><i class="icon-off icon-white"></i> Salir</a></li>
	</ul>
</nav>

<div class="container">
	<header id="nav" class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<div class="row-fluid">
					<div class="span5">
						<a class="btn btn-inverse showMenu"><i class="icon-th-list icon-white"></i> Menu</a>
					</div>
					<div class="span3" style=" margin-top: 5px; margin-bottom: 0px;">
						<img src="/Vidali/vdl-themes/Default/img/logo.png">
					</div>
				</div>
			</div>
	  	</div><!-- /navbar-inner -->
	</header>

	<div id='container' class="container-fluid">
		<div class="row-fluid">
			<div id="din" class="span9">
					<ul id="home-tab" class="nav nav-tabs no-bot-margin">
					</ul>
					<div id="view" class="tab-content">
					</div>
				</div>
			<aside class="span3">
				<ul id="notify-tab" class="nav nav-tabs">
				  <li class="active">
				    <a href="#Requests" data-toggle="tab">Solicitudes</a>
				  </li>
				  <li>
				    <a href="#Replies" data-toggle="tab">Replys</a>
				  </li>
				  <li>
				    <a href="#Events" data-toggle="tab">Eventos</a>
				  </li>
				</ul>

				<div id="notify-side" class="tab-content">
					<div id="Requests" class="inbox-tab tab-pane fade active in">
						Solicitudes
					</div>
					<div id="Replies" class="inbox-tab tab-pane fade">
						Respuestas
					</div>
					<div id="Events" class="inbox-tab tab-pane fade">
						Eventos
					</div>
				</div>
			</aside>
		</div>
	</div>
			
	<footer class="footer container">
			<p class="pull-right"><img src="vdl-themes/Default/img/html5.png"><img src="vdl-themes/Default/img/agpl.png"></p>
			<p class="pull-left">Powered by Vidali.</p>
	</footer>
</div>

<div id="feedbar">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span9">
				<form class="form-inline" onSubmit="update_status(); return false;" method="post">
				    <textarea id="update" name="update" class="span12" rows="2" placeholder="Actualiza tu estado"></textarea>
				    <button class="btn btn-inverse"><i class="icon-star icon-white"></i></button>
				    <button class="btn btn-inverse"><i class="icon-map-marker icon-white"></i></button>
				    <button class="btn btn-inverse"><i class="icon-upload icon-white"></i></button>
				    <button type="submit" class="btn btn-primary pull-right"><i class="icon-ok icon-white"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="background">
	<div id="loading">
			<img src="vdl-themes/Default/img/logo-big.png" width="100%">
			<img src="vdl-themes/Default/img/loading.gif">
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
<script type="text/javascript" src="vdl-themes/Default/js/bootstrap.js" ></script>
<script type="text/javascript" src="vdl-themes/Default/js/main.js" ></script>
<script type="text/javascript" src="vdl-themes/Default/js/gettext.js" ></script>

</body>
</html>
