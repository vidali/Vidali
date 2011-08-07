<?php
	include("vdl-includes/vdl-core/core_profile.class.php");		
	$prof = new CORE_PROFILE();
	$author = $prof->get_home($_SESSION["user_id"]);
	foreach ($author as $data){
		$nick = $data['nickname'];
		$p_visits = $data['prof_visits'];
		$p_friends = $data['prof_friends'];
		$p_nets = $data['prof_nets'];
		$photo = $data['img_prof'];
	}
?>

<div class="grid_5">
	<div class="basic">
		<div id="pr_thumb">
			<?php echo '<img src="vdl-media/vdl-images/' . $photo . '.jpg">'; ?>
		</div>
		<div id="pr_card">
			<?php echo $nick;?><br/>
			<?php echo $p_visits;?> visitas <br/>
			<?php echo $p_friends;?> Amigos<br/>
			<?php echo $p_nets;?> Redes<br/>
		</div>
	</div>			
</div>
<div class="grid_11"> 
	<div class="basic">
		<div class="home_titles">
			Cuadro vacio...
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
			<br/><h2>No implementado</h2>
	</div>
</div>
<div class="grid_8"> 
	<div class="basic2">
		<div class="home_titles">
			Actualizaciones redes
		</div>
		<br/><h2>No implementado</h2>
	</div>
</div>			
	<div class="clear"></div>
