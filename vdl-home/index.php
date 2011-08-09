<?php
	include("vdl-includes/vdl-core/core_profile.class.php");		
	$prof = new CORE_PROFILE();
	$author = $prof->get_home($_SESSION["user_id"]);
	$nick = $prof->nickname();
	$p_visits = $prof->prof_visits();
	$p_friends = $prof->prof_friends();
	$p_nets = $prof->prof_nets();
	$photo = $prof->img_prof();
?>

<div class="grid_4">
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
<div class="grid_12"> 
	<div id="home_titles"> Actividad Reciente </div>
	<div class="home_breadcumbs"> Amigos | redes | menciones | Titulares</div>
	<div class="home_update"> ejemplo de update</div>
</div>
<div class="clear"></div>
