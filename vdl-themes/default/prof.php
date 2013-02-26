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
		<article id="upd" class="span12">
			<section class="span12">
				<div class="span1">
				<?php //echo '<img src="vdl-media/vdl-images/'. $upd["avatar_id"] . '_tb.jpg">';
					$size = 50;
					$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($upd["email"]) )."&size=".$size;
					echo '<img src="'.$grav_url.' class="thumbnail">';
				?>				
				</div>
				<div class="upd-info span11">
					<?php echo '<a href="?pg=p&!=all&@='.$upd["nick"].'">@'.$upd["nick"].'</a> - '.$upd["date_published"];?>
				</div>
			</section>
			<section class="upd-msg span12">
				<?php echo $prof->meta_text($upd["text"]);?>
			</section>
		</article>
	<?php $upd_cont--;
	}?>
	</section>
</div>
