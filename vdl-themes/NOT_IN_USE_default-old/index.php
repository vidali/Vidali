<?php
//	include("vdl-includes/mainfunctions.php");
///===>Start session var and check if we are loged, in other case,we block private info.
	session_start();
	$loged = 0;
	$visitor = " ";
	if(isset($_SESSION['loged'])){
		$loged = $_SESSION['loged'];
		$visitor = $_SESSION['nickname'];
	}
//	open_session();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>
	<?php echo TITLE; ?>
	</title>
	<link href="vdl-themes/default/style.css" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<?php load_mainscripts();
		include("vdl-themes/default/scripts/script1.html");
	?>
</head>
<body>
<div id="header-bar"></div>
<div id="main_cont">
	<div id=header>
		<div class=logo>
			<a href="index.php"><img src="vdl-media/vdl-images/logo-alt.png" border="0"></a>
		</div>
		<div class=title>
			<?php echo'<h1><a href="index.php">'. TITLE . ": " . DESCR ."</h1></a>";?>
		</div>
		<div class=buttons>
		<?php if ($loged==0){ ?>
			<div class=button>
				<?php echo'<a href="vdl-includes/log.php?func=login" class="boxy" title="'.M_LIN.'">Login</a>';?>
			</div>
		<?php }
		else{ ?>
			<div class=button>
				<?php echo'<a href="vdl-includes/log.php?func=logout" class="boxy" title="'.M_LOU.'">Logout</a>';?>
			</div>
			<div class=button>
				<a href="?pg=conf">Conf.</a>
			</div>
			<div class=button>
				Inbox
			</div>
			<div class=button>
				Not.
			</div>
		<?php	} ?>
		</div>
	</div>
	<div id="side">
	<section id="prof-photo">
		<img src="vdl-media/vdl-images/prof_default.jpg">
	</section>
	<ul id="menu">
		<li><a href="?pg=updat"><?php echo M_UPD; ?></a></li>
		<li><a href="?pg=prof"><?php echo M_PRF; ?></a></li>
		<li><a href="?pg=notes"><?php echo M_NOT; ?></a></li>
		<li><a href="?pg=media"><?php echo M_MED; ?></a></li>
<?php
		if ($loged==1){
			echo '<li><a href="vdl-includes/upl.php" class="boxy" title="Subir archivo multimedia">Subir...</a> </li>';
		}
	echo '</ul>';
echo '</div>';

echo '<div id="container">';
///===>Last update and basic info about profile owner.
		echo '<div id="up-info">';
			if ($loged==1 && $ $visitor="USER"){
					echo '<form action="vdl-includes/set_update.php" method="post">
							<input id ="update" name="update" type="text" size="100" placeholder="'.U_ASK.'" >
							<input type="submit" value="Actualiza!">
						</form>';
			}
			else{
				echo "AQUI DESCRIPCION CORTA DEL USUARIO.";
			}
		echo "</div>";
//===> last update of administrator
		include("vdl-functions/updates.class.php");
//		include("vdl-functions/bd_connect.php");
		$upd_class= new Update(USER);
		$sql = mysql_query ("SELECT * FROM vdl_updates ORDER BY id DESC");
		$last_id = mysql_num_rows ($sql);
		$last_upd = $upd_class->get_update($last_id);
		echo '<article id="last-upd">';
				echo '<section class="upd-msg">'.$last_upd["upd_msg"].'</section><section class="upd-info">'.$last_upd["date"]."</section>";
		echo '</article>';


	include("vdl-includes/content.php");
echo '</div>';

echo '<div id="side-panel">';
//===> Networks & friends panel
	echo "Amigos<br/>";
	echo "Redes<br/>";
echo '</div>';
?>
	<div id="footer">
		<h5>Vidali, Open Social Network. Copyright (c) 2010. Cristopher Caamana. AGPLv3 License</h6>
	</div>
</div>
</body>
</html>
