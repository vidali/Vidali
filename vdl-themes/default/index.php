<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php
	$pg = '';
	if (!isset($_GET['pg']))
		echo TITLE; 
	else
		echo "Vidali";
	?>
	</title>
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/style.php" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<?php load_mainscripts();
		include("vdl-themes/default/scripts/script1.html");
	?>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript"> 
<!--Jquery animacion//-->
$(document).ready(function(){ 
var si = 1;
	$('#pulsa').click(function() {
		if(si){
			$('#globo').animate({
			opacity: 1
			}, 600, function() {});
			si = 0;
		}
		else
		{
			$('#globo').animate({
			opacity: 0
			}, 600, function() {});
			si = 1;
		}
});
});
<!--Envio de update por AJAX//-->
function actualiza(mensaje)
{
if (mensaje=="")
  {
  alert('Update vacio!');
  return;
  } 
	xmlHttp = new XMLHttpRequest();

    xmlHttp.open("POST", "vdl-includes/set_update.php", true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
    xmlHttp.send("update="+mensaje);
    
    $('#globo').animate({
			opacity: 0
			}, 600, function() {location.reload()});
}

function cuenta()
{
document.getElementById('contador').innerHTML = document.getElementById('mensaje').value.length;
}
</script>
</head>
<body>
<header>
	<div id="line">
		<div class="container_16">
			<div id = "logo" class="grid_4">
					<a href="index.php"><img src="vdl-media/vdl-images/logo.png" border="0">Alfa 0.5</a>
			</div>
			<div id="menu" class="grid_5 prefix_7">
				<nav>
					<ul>
						<?php $pg=""; if(isset($_GET['pg'])) $pg=$_GET['pg']; ?>
						<?php if( $pg == "media") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=media"><?php echo M_MED; ?></a></li>
						<?php if($pg == "notes") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=notes"><?php echo M_NOT; ?></a></li>
						<?php if($pg == "prof") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=prof"><?php echo M_PRF; ?></a></li>
						<?php if($pg == "") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="index.php">Home</a></li>
					</ul>
				</nav>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>

<section id="container">
	<div id="container-line">
		<div class="container_16">
		<div id ="page_name" class="grid_16">
			<h4>
			<?php
				if (!isset($_GET['pg']))
					echo "Home </h4> Inicio";
				else if ($_GET['pg'] == "prof")
					echo "Home > Perfil </h4> Perfil";
				else if ($_GET['pg'] == "notes")
					echo "Home > Notas </h4> Notas";
				else if ($_GET['pg'] == "media")
					echo "Home > Archivos </h4> Archivos";
			?>
			</div>
			<?php include("vdl-includes/content.php");?>
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

<div id="globo">
<span>Actualiza tu estado:</span><br>
<textarea id="mensaje" style="width:388px;" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea><br>
<span style="float:right;"><span id="contador"></span>
<input type="button" value="Actualiza!" OnClick="actualiza(document.getElementById('mensaje').value)">
</span>
</div>

<div id=taskbar>
	<nav id=buttons>
		<div class="grid_1">
		<span id="pulsa">Habla!</span>
		</div>
		<div class="grid_1">
			Inbox
		</div>
		<div class="grid_1">
			Not.
		</div>
		<div class="grid_1">
			<?php echo'<a href="vdl-includes/log.php?func=logout" title="'.M_LOU.'">Logout</a>';?>
		</div>
		<?php if ($visitor == ADMIN){?>
			<div class="grid_1">
					<a href="index.php?pg=admin" title="Panel de Administración">Admin.</a>
				</div>
		<?php } ?>
	</nav>
</div>
</body>
</html>
