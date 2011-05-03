<?php
include("vdl-includes/vdl-core/core_network.class.php");
$core_n = new CORE_NETWORK();

if(isset($_GET["name"])){
	//falta mostrar la página de una red de manera correcta, con imagen para la red, descripcion, comentarios e hilos.
	$nets = $core_n->get_network_page($_GET["name"]);
	echo '<h1>'.$nets["net_name"].'</h1>';
	echo $nets["net_desc"];
	echo $nets["net_img"];
	
}
else{
?>
<form id="vdl-form" class="grid_4" action="vdl-includes/add_net.php" method="post">
	<h1>Crear Red nueva:</h1>
	Nombre de la red:<br/> 
	<input id="net_name" name="net_name" type="text"><br/>
	Descripción:<br/>
	<textarea id="net_desc" name="net_desc" rows="5" cols="20" placeholder="Describe la red en pocas palabas..." ></textarea><br/>
	<input id="net_admin" name="net_admin" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
	<input type="submit" value="Enviar">
</form>

<div id="network" class="grid_10 prefix_1">
	<h1>Lista de redes existentes:</h1><br/>
<?php
//Carga de datos...
	$nets = $core_n->list_nets();
	foreach ($nets as $n){
		echo '<img src="vdl-media/vdl-images/'.$n["net_img"].'_tb.jpg">';
		echo $n["net_name"].':';
		echo $n["net_desc"].'<br/>';
	}
?>
</div>

<?php }?>
