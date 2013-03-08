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
	<link rel="shortcut icon" href="../vdl-themes/Default/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../vdl-themes/Default/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../vdl-themes/Default/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="../vdl-themes/Default/css/style.css" />
	<script type="text/javascript" src="../vdl-themes/Default/js/jquery.js" ></script>
	<script type="text/javascript" src="../vdl-themes/Default/js/bootstrap.js" ></script>
	<link rel="stylesheet" href="../vdl-themes/Default/js/jquery-ui.css" id="theme" />
	<script type="text/javascript" src="../vdl-themes/Default/js/less.js"></script>
	<script type="text/javascript" src="../vdl-themes/Default/js/script_default.js"></script>
	<script>

	</script>
</head>
<body>
	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
			<div class="span2"><a class="brand" href="#"><img src="../vdl-themes/Default/img/logo.png"></a></div>
			<ul class="nav pull-right">
				<li><a href="http://vdli.wordpress.com/">Blog</a></li>
				<li><a href="https://github.com/vidali/Vidali/wiki">Wiki</a></li>
				<li><a href="https://github.com/vidali/Vidali">Github</a></li>
				<li><a href="http://twitter.com/VidaliSN">Twitter</a></li>
			</ul>
		</div>
	  </div>
	</div>

	<!-- Desde aki -->
<section class="container-fluid">
	<div class="row-fluid show-grid">
		<div class="span12">
			<?php
				if(isset($_GET["empty"])){
					for($i=1;$i<=$_GET["empty"];$i++){
						echo '<div class="alert">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Advertencia!</strong> '.$_GET["emp$i"].' no ha sido rellenado.
						</div>';
					}
				}
			?>
		</div>
		<div class="span6">
			<form id="installForm" class="form-horizontal" method="post" onsubmit="doInstall(); return false;">
				<fieldset>
					<h3> Instalador de Vidali </h3>
						<dd><p> Bienvenido al instalador de Vidali para servidores. </p></dd>
						<dd><p> Por favor, rellena los siguientes datos: </p></dd>
						<dd><p><h4> Paso 1: Datos de servidor </h4></p></dd>
							<div class="control-group">
								<label class="control-label" for="input07">Direccion_BD</label>
								<div class="controls">
									<input name="DB_DIR" type="text"  placeholder="example: localhost" class="input-xlarge" id="BD_DIR">
									<span id="confirm7"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input07">Nombre_BD</label>
								<div class="controls">
									<input name="DB_NAME" type="text" placeholder="example: Vidali" class="input-xlarge" id="BD_NAME">
									<span id="confirm7"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input07">Usuario_BD</label>
								<div class="controls">
									<input name="DB_USER" type="text" placeholder="User" class="input-xlarge" id="BD_USER">
									<span id="confirm7"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input07">Pass_BD</label>
								<div class="controls">
									<input name="DB_PASS" type="password" placeholder="●●●●●" class="input-xlarge" id="BD_PASS">
									<span id="confirm7"></span>
								</div>
							</div>

						<dd><p><h4> Paso 2: Configuración del nodo </h4></p></dd>
							<div class="control-group">
								<label class="control-label">Tipo de registro</label>
								<div class="controls">
									<label class="radio inline">
										<input name="optionsRadios" id="optionsRadios1" value="public" checked="checked" type="radio">
										Público
									</label>
									<label class="radio inline">	
										<input name="optionsRadios" id="optionsRadios2" value="request" type="radio">
										Invitación
									</label>
									<label class="radio inline">	
										<input name="optionsRadios" id="optionsRadios3" value="private" type="radio">
										Privado
									</label>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Privacidad por defecto</label>
								<div class="controls">
									<label class="radio inline">
										<input name="optionsRadios2" id="optionsRadios1" value="high" checked="checked" type="radio">
										Alta
									</label>
									<label class="radio inline">	
										<input name="optionsRadios2" id="optionsRadios2" value="mid" type="radio">
										Media
									</label>
									<label class="radio inline">	
										<input name="optionsRadios2" id="optionsRadios2" value="low" type="radio">
										Baja
									</label>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="optionsCheckboxList">Indexado de buscadores</label>
								<div class="controls">
								  <label class="checkbox">
									<input name="index_bots" value="yes" type="checkbox">
									Activar
								  </label>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="optionsCheckboxList">Sincronizar con Onvidali</label>
								<div class="controls">
								  <label class="checkbox">
									<input name="central_sync" value="yes" type="checkbox">
									Activar
								  </label>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Almacenamiento por defecto:</label>
								<div class="controls">
									<label class="radio inline">
										<input name="optionsRadios3" id="optionsRadios1" value="option1" checked="checked" type="radio" disabled>
										Servidor
									</label>
									<label class="radio inline">	
										<input name="optionsRadios3" id="optionsRadios2" value="option2" type="radio" disabled>
										Dropbox
									</label>
									<label class="radio inline">	
										<input name="optionsRadios3" id="optionsRadios2" value="option2" type="radio" disabled>
										Google Services
									</label>
								</div>
							</div>
							
							<div class="control-group">
								<div id="alert" style="display:none;">
									<strong>¡Error!</strong>
									<span></span>
								</div>
							</div>
							
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">!Comenzar!</button>
							</div>
				</fieldset>

			</form>
		</div> 
		<div class="span4">
			<form class="well">
				<h2>Información</h2>
				<p>Aquí van los consejos de instlación</p>
				<p>...</p>
				<p>...</p>
				<p>...</p>
				<p>...</p>
				<p>...</p>
				<p>Añadir Disclaimer de uso de Vidali</p>
				<p>...</p>
				<p>...</p>
				<p>...</p>
				<p>...</p>
				<p>...</p>
			</form>
		</div>
	</div>
</section>

	<footer class="footer">
	  <div class="container">
		<p class="pull-right"><img src="../vdl-themes/Default/img/html5.png"><img src="../vdl-themes/Default/img/agpl.png"></p>
		<h6>Powered by Vidali.</h6>
	  </div>
	</footer>


</body>
</html>
