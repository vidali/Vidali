<?php

	include("vdl-includes/vdl-core/core_profile.class.php");
	$prof = new CORE_PROFILE();
	if(isset($_GET["nick"]))
		$author = $prof->get_profile($_GET["nick"],$visitor);
	else
		$author = $prof->get_profile($_SESSION["user_id"],$visitor);
	$website = $prof->site();
	$name = $prof->name();
	$nickname = $prof->nickname();
	$location = $prof->location();
	$genre = $prof->sex();
	$bday = $prof->bday();
	$age = $prof->age();
	$bio = $prof->bio();
	$photo = $prof->img_prof();
	$email = $prof->email();
	$nets = $prof->prof_nets();
	$frs = $prof->prof_friends();
	$networks = array();
	$networks = $author[0];
	$friends = $author[1];
	?>
<div id="actv" class="basic3">
<!--NO QUITAR LA LINEA DE ABAJO - SISTEMA DINAMICO DE ACTUALIZACION -->
<!--B -->
		<div class="pr_titles">
			Actividad Reciente:
		</div>
		<?php
		//mostramos las actualizaciones del usuario
		$updates = $prof -> get_updates($_GET["nick"],$visitor);
		$upd_cont = count($updates);
		foreach($updates as $upd){
			if($upd_cont == count($updates))
				echo '<article id="last-upd">';
			else
				echo '<article id="upd">';?>
				<section class ="upd_tb grid_1">
					<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_tb.jpg">';?>
				</section>
				<section class="upd-msg grid_9">
					<section class="id_sender">
						<?php echo '@'.$nickname;?>
						<section class="upd-info">
							<?php echo $upd["date"];?>
						</section>
					</section>
					<?php echo $upd["upd_msg"];?>
				</section>
				<section class="reply grid_2">
					<?php echo '<a class="modal" href="vdl-includes/comment.php?idcom='.$upd["id"].'&idsender='.$_SESSION["user_id"].'" title="Comentar">Comentar</a>'; ?>
			</article>
		<?php $upd_cont--;
		}
		?>
<!--NO QUITAR LA LINEA DE ABAJO - SISTEMA DINAMICO DE ACTUALIZACION -->
<!--B -->
		</div> 