<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
		Vidali - Registro de usuarios
	</title>
	<script type="text/javascript" src="js/jquery.js" ></script>
	<script type="text/javascript" src="js/jquery-ui.js" ></script>
	<link type="text/css" href="js/css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/style.php" />
	<link rel="stylesheet" type="text/css" href="style/form.css" ></link>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<!--Script para el uso de Datepicker de JQquery UI -->	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeYear: true,	
			
		});
	});
	</script>
<!--Fin Script -->
	<script type="text/javascript">
	function valida(elque)
	{
		if(elque == "pass1" || elque == "pass2")
		{
			var Exp = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;
			if ((document.vdlreg.pass1.value.match(Exp)) && (document.vdlreg.pass1.value!='')) 
			{  
				document.getElementById('confirm1').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>"; 
			}
			else
			{
				document.getElementById('confirm1').innerHTML = "";
				document.getElementById('confirm2').innerHTML = "";
			}
	
			if ((document.vdlreg.pass1.value!='') && (document.vdlreg.pass2.value!='') && (document.vdlreg.pass2.value==document.vdlreg.pass1.value)) 
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
			if(document.vdlreg.nick.value != 0)
			{
			xmlHttp = new XMLHttpRequest();

			xmlHttp.open("POST", "vdl-includes/register_ajax.php", true);
			xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
			xmlHttp.send("user="+document.vdlreg.nick.value);
			
			xmlHttp.onreadystatechange=function(){
			if (xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				if(xmlHttp.responseText == 0)
				{
					document.getElementById('confirm3').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
				}
				else
				{
					document.getElementById('confirm3').innerHTML = "<img style='padding-left: 5px;' src='style/icons/mal.png' alt='Incorrecto'>";
				}
			}
			}
			}
			else
			{
				document.getElementById('confirm3').innerHTML = "";
			}
		
		}
		if(elque == "email")
		{
			if(document.vdlreg.email.value != 0 && document.vdlreg.email.value.match("[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"))
			{
			xmlHttp = new XMLHttpRequest();

			xmlHttp.open("POST", "vdl-includes/register_ajax.php", true);
			xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
			xmlHttp.send("email="+document.vdlreg.email.value);
			
			xmlHttp.onreadystatechange=function(){
			if (xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				if(xmlHttp.responseText == 0)
				{
					document.getElementById('confirm4').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
				}
				else
				{
					document.getElementById('confirm4').innerHTML = "<img style='padding-left: 5px;' src='style/icons/mal.png' alt='Incorrecto'>";
				}
			}
			}
			}
			else
			{
				document.getElementById('confirm4').innerHTML = "";
			}
		}		
		if(elque == "fecha")
		{
			if(document.vdlreg.birthdate.value != 0 && document.vdlreg.birthdate.value.match("[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])"))
			{
				document.getElementById('confirm5').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
			}
			else
			{
				document.getElementById('confirm5').innerHTML = "";
			}			
		}
		if(elque == "name")
		{
			if(document.vdlreg.name.value != 0)
			{
				document.getElementById('confirm6').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
			}
			else
			{
				document.getElementById('confirm6').innerHTML = "";
			}
		}
		if(elque == "location")
		{
			if(document.vdlreg.location.value != 0)
			{
				document.getElementById('confirm7').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
			}
			else
			{
				document.getElementById('confirm7').innerHTML = "";
			}
		}
		if(elque == "sex")
		{
			if(document.vdlreg.sex.value != 0)
			{
				document.getElementById('confirm8').innerHTML = "<img style='padding-left: 5px;' src='style/icons/tick.png' alt='Ok'>";
			}
			else
			{
				document.getElementById('confirm8').innerHTML = "";
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
		<form id="vdl-form" name="vdlreg" class="grid_4" action="vdl-includes/reg.php" method="post">
			Nick:<br/> 
			<input name="nick" type="text" onkeyup="valida('user')"/><span id="confirm3"></span><br/>
			Password:<br/>
			<input name="pass1" type="password" onkeyup="valida('pass1')"/><span id="confirm1"></span><br/>
			Repite Contraseña:<br/>
			<input name="pass2" type="password" onkeyup="valida('pass2')"/><span id="confirm2"></span><br/><br/>
			Nombre:<br/>
			<input name="name" type="text" onkeyup="valida('name')"/><span id="confirm6"></span><br/>
			E-mail:<br/>
			<input name="email" type="email" onkeyup="valida('email')"/><span id="confirm4"></span><br/>
			Fecha de Nacimiento<br />(yyyy-mm-dd):<br/>
			<input <?php //id="datepicker"?> name="birthdate" type="date" onkeyup="valida('fecha')"><span id="confirm5"></span><br/>
			Ubicación:<br/>
			<input name="location" type="text" onkeyup="valida('location')"><span id="confirm7"></span><br/>
			Sexo:<br/>
			<input name="sex" type="radio" value="1" onclick="valida('sex')">Male
			<input name="sex" type="radio" value="2" onclick="valida('sex')"> Female&nbsp;&nbsp;<span id="confirm8"></span><br/>
			Descripción:<br/>
			<textarea name="bio" rows="5" cols="20" placeholder="Describete!" ></textarea><br/>
			<input type="submit" value="Enviar">
		</form>
		<div id="info-box" class="grid_10 prefix_1">
			Información sobre el registro:<br><br>
			
			La contraseña a introducir tiene que tener entro 8-10 carateres alfanumericos (Numeros y Letras)
		</div>
	</div>
</section>

<?php 
	include_once("vdl-themes/default/footer.php");
?>

</body>
</html>
