<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php echo TITLE; ?>
	</title>
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="style/style-login.php" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
<div id="line">
	<div class="container_16">
		<div class="grid_10 suffix_1">
			<img src="vdl-media/vdl-images/logo-grande.png">Alpha 0.5
			<div class="clear"></div>
		</div>
		<div id="login-form" class="grid_5">
			<ul>
				<form action="vdl-includes/session_start.php" method="post">
					<li>
						<label>usuario:</label><br/><input id ="user" name="user" size="15" type="text" /><br/>
						<input id="remember" name="remember" type="checkbox" value="1"><label>Recordarme</label>
					</li>
					<li>
						<label>contraseña:</label><br/><input id ="passwd" name="passwd" size="15" type="password" /><br/>
						<input type="submit" value="Iniciar sesion">
					</li>
				</form>
			</ul>
		</div>	
		<div class="clear"></div>
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
