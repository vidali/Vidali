<div class="row">
	<section class="span10">
	<div class="pr_titles">
		Actividad Reciente:
	</div>
	<?php
	//mostramos las actualizaciones del usuario
	$updates = $prof -> get_updates($_GET["@"],$visitor);
	$upd_cont = count($updates);
	foreach($updates as $upd){ ?>
		<article id="upd">	
				<section class="upd-info">
				<?php echo '@'.$nickname;?>
				<?php echo $upd["date"];?>
				</section>
			<section class ="upd_tb span1">
				<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_tb.jpg">';?>
			</section>
			<section class="upd-msg span8">
				<?php echo $prof->meta_text($upd["upd_msg"]);?>
			</section>
		</article>
	<?php $upd_cont--;
	}
	?>
	</section>
	<section class="span4">
	sidebar
	</section>
</div>