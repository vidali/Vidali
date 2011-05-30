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
	<script type="text/javascript" src="js/jquery.js" ></script>
	<script type="text/javascript" src="js/jquery-ui.js" ></script>
	<link type="text/css" href="js/css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
	<link rel="stylesheet" type="text/css" media="all" href="style/grid/code/css/960.css" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/style.php" />
	<link rel="stylesheet" type="text/css" href="vdl-themes/default/form.css" />
	<?php load_mainscripts();
		include("vdl-themes/default/scripts/script1.html");
	?>
		<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
	

				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 680,
					height: 280,
					resizable: false,
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});
			});
		</script>
</head>
<body>
<header>
	<div id="line">
		<div class="container_16">
			<div id = "logo" class="grid_4">
					<a href="index.php"><img src="vdl-media/vdl-images/logo.png" border="0">Alfa 0.5</a>
			</div>
			<div id="menu" class="grid_7 prefix_5">
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
						<?php if($pg == "n") 
							echo '<li class="active">';
						else
							echo '<li>';?>
							<a href="?pg=n">Redes</a></li>
						<?php if($pg == "p") 
							echo '<li class="active">';
						else
							echo '<li>';?>							
							<a href="?pg=p&nick=<?php echo $_SESSION["nickname"] ?>"><?php echo M_PRF; ?></a></li>
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
					else if ($_GET['pg'] == "p")
						echo "Home > Perfil </h4> Perfil";
					else if ($_GET['pg'] == "notes")
						echo "Home > Notas </h4> Notas";
					else if ($_GET['pg'] == "media")
						echo "Home > Archivos </h4> Archivos";
					else if ($_GET['pg'] == "n")
						echo "Home > Redes </h4> Redes";
				?>
			</div>
			<span id="recargar"><?php include("vdl-includes/content.php");?></span>
		</div>	
	</div>
</section>

<?php 
	include_once("footer.php");
?>


<div id="dialog" title="Comentar">
		<form id="vdl-form" name="vdlreply" class="grid_8" action="vdl-includes/reply.php" method="post">
			Comentario:<br/>
			<textarea name="bio" rows="5" cols="60" placeholder="Escribe tu comentario..." ></textarea><br/>
			<input type="submit" value="Enviar">
		</form>
</div>


<div id="globo">
<span>Actualiza tu estado:</span><br>
<textarea id="mensaje" style="width:388px;" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea><br>
<span style="float:right;"><span id="contador"></span>
<input type="button" value="Actualiza!" OnClick="actualiza(document.getElementById('mensaje').value)">
</span>
</div>

<?php 
	include_once("taskbar.php");
?>

</body>
</html>
