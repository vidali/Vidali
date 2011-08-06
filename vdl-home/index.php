<?php
	include("vdl-includes/vdl-core/core_profile.class.php");		
	$prof = new CORE_PROFILE();
	$author = $prof->get_profile($_SESSION["user_id"],$visitor);
	foreach ($author as $data){
		$photo = $data['img_prof'];
	}
?>

<div class="grid_5">
	<div class="basic">
		<div id="pr_thumb">
			<?php echo '<img src="vdl-media/vdl-images/' . $photo . '.jpg">'; ?>
		</div>
		<div id="pr_card">
			Usuario de Muestra<br/>
			0 visitas <br/>
			0 Amigos<br/>
			0 Redes<br/>
		</div>
	</div>			
</div>
<div class="grid_11"> 
	<div class="basic">
		<div class="home_titles">
			Estadísticas de Perfil
		</div>
		<p><h1>PROXIMAMENTE...</h1></p>
	</div>
</div>
<div class="clear"></div>
<div class="grid_8"> 
	<div class="basic2">
		<div class="home_titles">
			Actualizaciones amigos
		</div>
			<br/><h2>Sin amigos todavia... :(</h2>
	</div>
</div>
<div class="grid_8"> 
	<div class="basic2">
		<div class="home_titles">
			Actualizaciones redes
		</div>
		<br/><h2>Sin redes todavia... :(</h2>
	</div>
</div>			
	<div class="clear"></div>
