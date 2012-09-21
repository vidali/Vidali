<!DOCTYPE HTML>
<html id="todo" xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Vidali</title>
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    {{LROUTES}}
</head>
 <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
			<div class="span2"><a class="brand" href="#"><img src="img/logo.png"></a></div>
			<div class="pull-right">
				<ul class="nav pull-right">
					<li><a href="./register.html">Registrate</a></li>
					<li class="divider-vertical"></li>
					<li class="drop down">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Iniciar Sesion <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
								{{LOGIN}}
								<input id="user" name="user" class="input" type="text" placeholder="Email" autofocus="autofocus">
								<input id="password" name="password" class="input" type="password" placeholder="Contrase&ntilde;a">
								<label class="string optional" for="user_remember_me">
									<input type="checkbox" id="remember" name="remember" value="1"> Recordar mi sesión
								</label>
								<label class="string optional" for="forgotten_password">
									<a href="#"> He olvidado mi contraseña</a>
								</label>
								<button class="btn btn-large btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" value="ok" type="submit">Iniciar sesi&oacute;n</button>
							</form>
						</div>
					</li>
				</ul>
			</div>
			<ul class="nav pull-right">
				<li><a href="http://vdli.wordpress.com/">Blog</a></li>
				<li><a href="https://github.com/vidali/Vidali/wiki">Wiki</a></li>
				<li><a href="https://github.com/vidali/Vidali">Github</a></li>
				<li><a href="http://twitter.com/VidaliSN">Twitter</a></li>
			</ul>
        </div>
      </div>
    </div>

	<div id="container" class="container">
		<div id="fondoC" class="hero-unit">
			<div class="row">
				<div class="span16">
						<div id="alert" style="display:none;">
							<strong>&iexcl;Error!</strong> <span></span>
						</div>
						<img src="img/skyline.jpg">
				</div>
				<div class="span16">
					<div class="span3 offset1">
						<h2><img src="img/world.png"> Comparte</h2>
						Multimedia, historias, noticias, etc.
					</div>
					<div class="span3">
						<h2><img src="img/users.png"> Comun&iacute;cate</h2>
						Con tus amigos, grupos. Crea tus propias redes.
					</div>
					<div class="span3">
						<h2><img src="img/www.png"> Control</h2>
						M&aacute;s privacidad, m&aacute;s comodidad.
					</div>
				</div>
				<div class="span15 offset1">
					<h2>¿Vidali?</h2>
					Una nueva red distribu&iacute;da con la que compartir contenidos con gente  
					que comparte gustos y aficiones. Tu eres el due&ntilde;o de tus datos, &iexcl;usalos como quieras!
				</div>
			</div>
		</div>
	</div>

    <footer class="footer">
      <div class="container">
        <p class="pull-right"><img src="img/html5.png"><img src="img/agpl.png"></p>
        <p>Powered by Vidali.</p>
      </div>
    </footer>

	<div id="background">
		<div id="loading">
				<img src="img/logo_black.png" width="100%">
				<img src="img/loading.gif">
		</div>
	</div>

  </body>
</html>
