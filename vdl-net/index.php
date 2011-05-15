<?php
include("vdl-includes/vdl-core/core_network.class.php");
$core_n = new CORE_NETWORK();

if(isset($_GET["name"])){
	//falta mostrar la página de una red de manera correcta, con imagen para la red, descripcion, comentarios e hilos.
	$nets = $core_n->get_network_page($_GET["name"]);
	echo '<div class="grid_10">';
		echo '<div id="net_photo"><img src="vdl-media/vdl-images/'.$nets["net_img"].'.jpg"></div>';
		echo '<h1>' . $nets["net_name"] . '</h1>';
		echo '<h2>' . $nets["net_sdesc"] . '</h2>';
		echo $nets["net_desc"];
	echo '</div>';
	echo '<div class="grid_5 prefix_1">';
		echo '<h1>Usuarios:</h1>';
		$joined = false;
		$users = $core_n->get_users_net($nets["id"]);
		foreach ($users as $user){
			if ($user["user_id"] == $_SESSION["nickname"])
				$joined = true;
			echo '<div id="user">';
			echo '<a href=?pg=p&nick='.$user["user_id"].'>';
			echo '<img src="vdl-media/vdl-images/'.$user["img_prof"].'_tb.jpg">';
			echo $user["nickname"];
			echo '</a></div>';
		}
		if ($joined == false)
			echo '<div id="button"><a href="vdl-includes/join_net.php?net='.$nets["id"].'&user='. $_SESSION["id"] .'">Unirse</a></div><br/>';
	echo '</div>';
}
else{
?>
<form id="vdl-form" class="grid_4" action="vdl-includes/add_net.php" method="post">
	<h1>Crear Red nueva:</h1>
	Nombre de la red:<br/> 
	<input id="net_name" name="net_name" type="text"><br/>
	Descripción:<br/>
	<input id="net_sdesc" name="net_sdesc" type="text" placeholder="Descripción corta..."><br/>
	<textarea id="net_desc" name="net_desc" rows="5" cols="20" placeholder="Descripción completa!" ></textarea><br/>
	<input id="net_admin" name="net_admin" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
	<input type="submit" value="Enviar">
</form>

<div id="network" class="grid_10 prefix_1">
	<h1>Lista de redes existentes:</h1><br/>
<?php
//Carga de datos...
	$nets = $core_n->list_nets();
	foreach ($nets as $n){
		echo '<article id="net">';
			echo '<a href="?pg=n&name='. $n["net_name"] .'">';
			echo '<div id="net_photo"><img src="vdl-media/vdl-images/'.$n["net_img"].'_tb.jpg"></div>';
			echo '<div id="net_id">'.$n["net_name"].'</div>';
			echo '<div id="net_info">'.$n["net_sdesc"].'</div></a>';
			echo '<div class="clear"></div>';
		echo '</article>';
	}
?>
</div>

<?php }?>
