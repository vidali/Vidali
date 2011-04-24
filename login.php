<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php echo TITLE; ?>
	</title>
	<link rel="stylesheet" type="text/javascript" href="js/jquery.js" />
	<link rel="stylesheet" type="text/css" href="style/style-login.php" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="style/style-login.php" />
	<link rel="stylesheet" type="text/css" href="style/form.css" ></link>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	
<header>
<div id="line">
	<div class="container_16">
		<div class="grid_9">
			<img src="vdl-media/vdl-images/logo-grande.png">Alpha 0.5
			<div class="clear"></div>
		</div>
		<form id="vdl-form" class="grid_6" action="vdl-includes/session_start.php" method="post">
			<ul>
				<li>
					<label>Usuario:</label><input id ="user" name="user" size="15" type="text" /><br/>
				</li>
				<li>
					<label>Contraseña:</label><input id ="passwd" name="passwd" size="15" type="password" /><br/>
				</li>
				<li>
					<input id="remember" name="remember" type="checkbox" value="1">Recordarme
					<input type="submit" class="button green square" name="button-1" value="Iniciar sesion">
				</li>
			</ul>
		</form>
	</div>
</div>
</header>
<section>
<div id="line-cont">
	<div id="info" class="container_16">
		<div class="grid_4 prefix_2">
			<img src="vdl-media/vdl-images/c1.png">
			Controla tu información. ¡Elige que hacer con tus datos!
		</div>
		<div class="grid_4">
			<img src="vdl-media/vdl-images/c2.png">
			Conectate con todas las redes. ¡Comunicate facilmente!
		</div>
		<div class="grid_4 suffix_2">
			<img src="vdl-media/vdl-images/c3.png">
			Comparte tus ideas, disfruta de una red actualizada.
		</div>
		<div class="grid_16">
			<a href="register.php"><br/><h1>Registrate</h1></a>
		</div>
		<div class="clear"></div>
	</div>
</div>
</section>
<footer>
	<div id="line-footer">
			<div class="container_16">
				Vidali Social Network. Cristopher D. Caamana Gómez, 2011.<br/>
				<img src="vdl-media/vdl-images/agpl.png">
				<img src="vdl-media/vdl-images/html5.png">
			</div>
	</div>
</footer>
</body>
</html>
