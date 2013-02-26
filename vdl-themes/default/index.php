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
</head>
<body>
<header class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner container-fluid">
		<div class="row">
            {{HEADER}}
		</div>
	</div>
</header>

<div id="nav" class="navbar">
  <div class="navbar-inner">
	  {{MENU}}
  </div>
</div>

<div class="container-fluid">
	{{CONTENT}}
	<div class="row-fluid">
		<div id="din">
			<aside class="span3"> 
				{{ACTIONS}}
			</aside>
			<div class="span6">
				{{PAGE}}
			</div>
		</div>
		<aside class="span3">
			{{NOTIFY}}
		</aside>
	</div>
</div>
		
<footer class="footer container">
		<p class="pull-right"><img src="img/html5.png"><img src="img/agpl.png"></p>
		<p class="pull-left">Powered by Vidali.</p>
</footer>

<div id="feedbar">
	<div class="container-fluid">
		<div class="row-fluid">
			<aside class="span3">
				<div id="invisible" class="well sidebar">
					{{CARD}}
				</div>
			</aside>
			<div class="span6">
                {{UPDATE}}
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
