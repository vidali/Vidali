<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Vidali</title>
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	  <script src="js/html5.js"></script>
	<![endif]-->
	<!-- Le styles -->
	{{ROUTES}}
	<link rel="shortcut icon" href="vdl-themes/Default/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/latest/jquery.mobile.css" media="only screen and (max-width:780px)" />
	<script type="text/javascript" src="vdl-themes/Default/js/jquery.js" ></script>
	<script type="text/javascript" src="vdl-themes/Default/js/jquery.mobile.js" ></script>
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

<div class="container">
	<header id="nav" class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><img width="60" height="60"  src="/Vidali/vdl-themes/Default/img/logo.png"></a>
				<form class="form-search span4" style=" margin-top: 5px; margin-bottom: 0px;">
				  <div class="input-append">
					<input type="text" class="span3 search-query">
					<button type="submit" class="btn search-button">Search</button>
				  </div>
				</form>
				<div class="nav-collapse navbar-responsive-collapse collapse" style="height: 0px;">
					<nav class="nav pull-right">
						<ul class="nav main-menu">
						  <li id="m-home" class="active"><a  onclick="link('h');"><i class="icon-home"></i></a></li>
						  <li id="m-msg"><a  onclick="link('m');"><i class="icon-envelope"></i></a></li>
						  <li id="m-group"><a onclick="link('g');"><i class="icon-globe"></i></a></li>
						  <li id="m-files"><a onclick="link('f');"><i class="icon-folder-open"></i></a></li>
						  <li id="m-set"><a onclick="link('s');"><i class="icon-cog"></i></a></li>
						  <li><a  href="/Vidali/?action=logout"><i class="icon-off"></i></a></li>
						</ul>
					</nav>
			</div><!-- /.nav-collapse -->
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

				<div id="" class="tab-content">
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
			<aside class="span3">
				<div id="invisible" class="well sidebar">
					{{CARD}}
				</div>
			</aside>
			<div class="span6">
				<form class="form-inline" onSubmit="update_status(); return false;" method="post">
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
