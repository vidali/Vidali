<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php echo TITLE; ?>
	</title>
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet/less" type="text/css" href="vdl-themes/default/css/login.less" />
	<script type="text/javascript" src="js/less.js"></script>
<style>
#fondo{
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	background-color: #fff;
  	display:none;
}
#carga_vidali{
	position:fixed;
	width:268px;
	height:200px;
	left:50%;
	top:50%;
	margin-left:-134px;
	margin-top:-200px;
	display:none;
}
</style>
<script>
$(document).ready(function()
{
	$("#send").click(function () 
	{
		$("#fondo").fadeIn(2000);
		$("#footer").fadeOut(2000, function () 
		{
			$("#carga_vidali").fadeIn(300, function () 
			{
				xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    if(xmlhttp.responseText == 1)
				    {
				    	$("#carga_vidali").fadeOut(500, function () 
				    			{window.location='index.php?pg=home';});
				    }
				    else
				    {
				    	$("#carga_vidali").fadeOut(500);
				    	$("#footer").fadeIn(500);
				    	$("#fondo").fadeOut(500);
				    }
				    
				    }
				  }
				xmlhttp.open("POST","vdl-includes/session_start.php",true);
				xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
				xmlhttp.send("user="+document.getElementById('user').value+"&passwd="+document.getElementById('passwd').value);
	        });
        });
	});
}); 
</script>
</head>
<body>
<div id="fondo"></div>
<div id="carga_vidali">
<img src="vdl-media/vdl-images/logo-login.png">
<p align="center"><img src="vdl-media/vdl-images/loading.gif"></p>
</div>
<header>
<div id="line">
	<div class="container_16">
		<div id="logo" class="grid_6">
			<img src="vdl-media/vdl-images/logo-grande.png">
			<div class="clear"></div>
		</div>
		<div class="grid_10">
			<form id="login-form" action="vdl-includes/session_start.php" method="post">
				<ul>
					<li>
						<input id ="user" name="user" type="text" placeholder="Nombre de Usuario" />
					</li>
					<li>
						<input id ="passwd" name="passwd" type="password" placeholder="Password" />
					</li>
					<li>
						<input id = "send" type="button" name="send" value="Iniciar sesion">
					</li>
					<li>
						<input id="remember" name="remember" type="checkbox" value="1"><label class="sub">Recordarme</label>
					</li>
					<li>
						<label class="sub">He perdido mi Password</label>
					</li>
					<div class="clear"></div>
				</ul>
			</form>
		</div>
		<ul id="links" class="grid_10">
			<li>
				<a href="http://vdli.wordpress.com" >Blog</a>
			</li>
			<li>
				<a href="http://github.com/vidali/Vidali" >Github</a>
			</li>
			<li>
				<a href="http://github.com/vidali/Vidali/wiki" >Wiki</a>
			</li>
			<li>
				<a href="http://www.twitter.com/VidaliSN" >@VidaliSN</a>
			</li>
		</ul>
	</div>
</div>
</header>
<section id="line-cont">
	<div id="info" class="container_16">
		<div class="grid_4 prefix_1">
			<h1>&iquest;Que es Vidali?</h1>
			<p>Vidali es una Red social Libre licenciada bajo la AGPLv3, 
			en la que puedes compartir tus fotos, enlaces, videos, musica y archivos con tus amigos, 
			con total libertad de ser el propietario de tus datos.Sabras en todo momento que tus datos no se usan para otros fines 
			y que podras eliminarlos con total facilidad!</p>
		</div>
		<div class="grid_10 prefix_1">
			<div class="grid_2">
				<img src="vdl-media/vdl-images/world.png" >
			</div>
			<div class="grid_6">
				<h2>Comparte:</h2>
				<p>Con tus amigos y tus grupos lo que quieras!</p>
			</div>
		</div>
		<div class="grid_10 prefix_1">
			<div class="grid_2">
				<img src="vdl-media/vdl-images/users.png" >
			</div>
			<div class="grid_6">
				<h2>Comunicate:</h2>
				<p>Conoce gente con gustos afines, o simplemente manten conversaciones entre grupos!</p>
			</div>
		</div>
		<div class="grid_10 prefix_1">
			<div class="grid_2">
				<img src="vdl-media/vdl-images/www.png" >
			</div>
			<div class="grid_6">
				<h2>Control:</h2>
				<p> Sabras en todo momento quien, donde y como ven tu informacion, ademas de poder aplicar filtros
				para mejorar tu privacidad.</p>
			</div>
		</div>
	</div>
	<?php if(isset($_GET["alert"])){?>
	<div id="info" class="container_16">
		<div id="alert-area" class="grid_16">
				Bienvenido a Vidali, por favor, inicia sesion para continuar.
		</div>
	</div>
	<?php }?>
</section>

<footer id="footer">
	<div id="line-footer">
			<div class="container_16">
				<div id="about" class="grid_3 suffix_3">
					Powered by Vidali.
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
	<div class="clear"></div>
</footer>

</body>
</html>
