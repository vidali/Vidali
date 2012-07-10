<div class="row">
	<section class="span12">
	<div class="pr_titles">
		Actividad Reciente:
	</div>
	<?php
	//mostramos las actualizaciones del usuario
	$updates = $prof -> get_updates($_GET["@"],$visitor);
	$upd_cont = count($updates);
	foreach($updates as $upd){ ?>
		<article id="upd">
			<section class="upd-info span12">
				<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_tb.jpg">';?>
				<?php echo '@'.$nickname.'<br/>';?>
				<?php echo $upd["date_published"];?>
			</section>
			
			<section class="upd-msg span6">
				<?php echo $prof->meta_text($upd["text"]);?>
			</section>
		</article>
	<?php $upd_cont--;
	}
	?>
	</section>
</div>
