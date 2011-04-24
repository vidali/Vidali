<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
		Instalación de Vidali
	</title>
	<link rel="stylesheet" type="text/css" media="all" href="../style/grid/code/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="../style/grid/code/css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="../style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="../style/style-install.php" />
	<link rel="stylesheet" type="text/css" href="../style/form.css" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
<div id="line">
	<div class="container_16">
		<div class="grid_11">
			<img src="../vdl-media/vdl-images/logo-grande.png">Alpha 0.5 - Instalación
		</div>
		<div class="clear"></div>
	</div>
</div>
</header>
<section>
<div id="line-cont">
	<div id="install" class="container_16">
		<form id="vdl-form" class="grid_4" action="install.php" method="post">
			<h2>Base de datos:</h2><br/>
				Direccion de la BD:<br/>
				<input id ="db_dir" name="db_dir" type="text" autofocus /><br/>
				Nombre de la BD:<br/>
				<input id ="db_name" name="db_name" type="text" /><br/>
				Usuario de la BD:<br/>
				<input id ="db_uname" name="db_uname" type="text" /><br/>
				Contraseña de la BD:<br/>
				<input id ="db_upass" name="db_upass" type="password" /><br/>
			<h2>Usuario Administrador:</h2><br/>
				Nick:<br/>
				<input id ="nickname" name="nickname" type="text" /><br/>
				Contraseña:<br/>
				<input id ="password" name="password" type="password" /><br/>
				Nombre:<br/>
				<input id ="name" name="name" type="text" /><br/>
				Email:<br/>
				<input id="email" name="email" type="email"><br/>
				Ubicación:<br/>
				<input id="location" name="location" type="text"><br/>
				Sexo:<br/>
				<input id="sex" name="sex" type="radio" value="1">Male
				<input id="sex" name="sex" type="radio" value="2"> Female<br/>
				Fecha de Nacimiento:<br/> <h3>(yyyy-mm-dd)</h3>
				<input id="birthdate" name="birthdate" type="date"><br/>
				Descripción:<br/><textarea id="bio" name="bio" rows="5" cols="20" placeholder="Describete!" ></textarea><br/>
<?php	
/*			<h2>Otra Configuración (NO ACTIVADO DE MOMENTO):</h2>
				Nivel de privacidad:<input id="priv" name="priv" type="radio" value="low">low
				<input id="priv" name="priv" type="radio" value="medium"> medium
				<input id="priv" name="priv" type="radio" value="high"> high<br/>
				Metodo de registro de usuarios:<input id="musers" name="musers" type="radio" value="on"> Libre
				<input id="musers" name="musers" type="radio" value="off"> Invitación
				<input id="musers" name="musers" type="radio" value="off"> Cerrado<br/>
				Ruta de la carpeta principal:<input id ="basedir" name="basedir" type="text" /><br/>*/?>
				<input type="submit" value="Comenzar!">
		</form>
		<div id="info-box" class="grid_10 prefix_1">
			<h1>Bienvenido al instalador de Vidali</h1><br/>
			<p>
				Hola, este es el instalador de Vidali, por favor rellena el formulario para
				completar la instalación.
				<br/>
				Recuerda eliminar la carpeta install en el servidor una vez haya finalizado la instalación.
				<br/>
				Proximamente se ampliarán las opciones iniciales de configuración de la red.
				<br/>
				<br/>
				Ten en cuenta las siguientes consideraciones al usar Vidali:
				<br/>
				<ul>
					<li>Se trata de una versión ALFA, por lo que no se recomienda su uso en entornos de producción.</li>
					<li>El código está en continuo cambio, por lo que se recomienda actualizar los archivos con frecuencia.</li>
					<li>El proyecto cuenta con pocos desarrolladores, por favor, contribuye a mejorarlo.</li>
					<li>Disfruta de Vidali y sobretodo comparte tu ideas!.</li>
				</ul>
			</p>
		</div>
		<div class="clear"></div>
	</div>
</div>
</section>
<footer>
	<div id="line-footer">
			<div class="container_16">
				Vidali Social Network. Cristopher D. Caamana Gómez, 2011.<br/>
				<img src="../vdl-media/vdl-images/agpl.png">
				<img src="../vdl-media/vdl-images/html5.png">
			</div>
	</div>
</footer>
</body>
</html>
