<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php echo TITLE; ?>
	</title>
	<link rel="stylesheet" type="text/javascript" href="js/jquery.js" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="style/style-login.php" />
	<link rel="stylesheet" type="text/css" href="style/form.css" ></link>
</head>
<body>
	
<header>
<div id="line">
	<div class="container_16">
		<div class="grid_9 suffix_1">
			<img src="vdl-media/vdl-images/logo-grande.png">
			<div class="clear"></div>
		</div>
		<form id="vdl-form" class="grid_5" action="vdl-includes/session_start.php" method="post">
			<ul>
				<li>
					<label>Usuario:</label><input id ="user" name="user" size="15" type="text" />
				</li>
				<li>
					<label>Contraseña:</label><input id ="passwd" name="passwd" size="15" type="password" />
				</li>
				<li>
					<label>Recordarme</label><input id="remember" name="remember" type="checkbox" value="1">
				</li>
				<input type="submit" name="send" value="Iniciar sesion">
				<div class="clear"></div>
			</ul>
		</form>
	</div>
</div>
</header>
<section id="line-cont">
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
		<div class="clear"></div>
	</div>
</section>

<footer>
	<div id="line-footer">
			<div class="container_16">
				<div id="about" class="grid_3 suffix_3">
					Vidali Team, 2011.
				</div>
				<div id="reg_button" class="grid_3">
					<a href="register.php"><h1>Regístrate</h1></a>
				</div>
				<div class="grid_3 prefix_3">
					<img src="vdl-media/vdl-images/agpl.png">
					<img src="vdl-media/vdl-images/html5.png">
				</div>
			</div>
	</div>
</footer>

</body>
</html>
