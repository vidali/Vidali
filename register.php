<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
		Vidali - Registro de usuarios
	</title>
	<script type="text/javascript" src="/js/jquery.js" ></script>
	<script type="text/javascript" src="/js/jformer.js" ></script>
	<link rel="stylesheet" type="text/css" href="style/jformer.css" ></link>
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/style.php" />
	<link rel="stylesheet" type="text/css" href="style/form.css" ></link>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<script type="text/javascript"> 
	function valida(elque)
	{
		if(elque == "pass1" || elque == "pass2")
		{
			var Exp = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;
			if ((document.getElementById('pass1').value.match(Exp)) && (document.getElementById('pass1').value!='')) 
			{  
				document.getElementById('confirm1').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>"; 
			}
			else
			{
				document.getElementById('confirm1').innerHTML = "";
				document.getElementById('confirm2').innerHTML = "";
			}
	
			if ((document.getElementById('pass1').value!='') && (document.getElementById('pass2').value!='') && (document.getElementById('pass2').value==document.getElementById('pass1').value)) 
			{  
				document.getElementById('confirm2').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>"; 
			}
			else
			{
				document.getElementById('confirm2').innerHTML = "";
			}
		}
		
		if(elque == "user")
		{
			xmlHttp = new XMLHttpRequest();

			xmlHttp.open("POST", "vdl-includes/register_ajax.php", true);
			xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
			xmlHttp.send("user="+document.getElementById('nick').value);
			
			if(xmlHttp.responseText == 0)
			{
				document.getElementById('confirm3').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
			}
			else
			{
				document.getElementById('confirm3').innerHTML = "";
			}
		}
		
	}
	</script>
</head>
<body>
<header>
<div id="line">
	<div class="container_16">
		<div class="grid_16">
			<img src="vdl-media/vdl-images/logo-grande.png">Alpha 0.5
		</div>
			<div class="clear"></div>
	</div>
</div>
</header>

<section>
<div id="container-line">
	<div id="info" class="container_16">
		<form id="vdl-form" class="grid_4" action="vdl-includes/reg.php" method="post">
			Nick:<br/> 
			<input id="nick" name="nick" type="text" onkeyup="valida('user')"/><span id="confirm3"></span><br/>
			Password:<br/>
			<input id="pass1" name="pass1" type="password" onkeyup="valida('pass1')"/><span id="confirm1"></span><br/>
			Repite Contraseña:<br/>
			<input id="pass2" name="pass2" type="password" onkeyup="valida('pass2')"/><span id="confirm2"></span><br/><br/>
			Nombre:<br/>
			<input id="name" name="name" type="text" /><br/>
			E-mail:<br/>
			<input name="email" type="email" /><br/>
			Fecha de Nacimiento (yyyy-mm-dd):<br/>
			<input id="birthdate" name="birthdate" type="date"><br/>
			Ubicación:<br/>
			<input id="location" name="location" type="text"><br/>
			Sexo:<br/>
			<input id="sex" name="sex" type="radio" value="1">Male
			<input id="sex" name="sex" type="radio" value="2"> Female<br/>
			Descripción:<br/>
			<textarea id="bio" name="bio" rows="5" cols="20" placeholder="Describete!" ></textarea><br/>
			<input type="submit" value="Enviar">
		</form>
		<div id="info-box" class="grid_10 prefix_1">
			Información sobre el registro:<br><br>
			
			La contraseña a introducir tiene que tener entro 8-10 carateres alfanumericos (Numeros y Letras)
		</div>
	</div>
</section>

<footer>
	<div id="line-footer">
			<div class="container_16">
				Vidali Social Network. Cristopher D. Caamana Gómez, 2011.<br/><img src="vdl-media/vdl-images/agpl.png"><img src="vdl-media/vdl-images/html5.png">				
			</div>
			
	</div>
</footer>
</body>
</html>
