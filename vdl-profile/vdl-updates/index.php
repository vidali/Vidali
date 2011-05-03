<?php
	$paginas = 4;
	$sql2 = mysql_query ("SELECT * FROM vdl_updates WHERE user_id='".$_SESSION["user_id"]."'");
	$sql = mysql_query ("SELECT * FROM vdl_updates ORDER BY id DESC");
	$total = mysql_num_rows ($sql2);
	$data = mysql_fetch_assoc($sql);
	$ultimo = $data["id"];
	if (isset($_GET["pagina"]))
		$actual = $_GET["pagina"];
	else{ 
			 $actual=1; 
	} 

	if ($actual == 1) {
		$desde = $ultimo - 1;
	}
	elseif ($actual != 1) {
		$desde = $total - ($paginas * ($actual - 1));
	}
	$tp = ($total / $paginas);
	if (strstr($tp,'.')){ 
		$tp = explode (".",$tp);
		$tp = ($tp[0]+1);
	}
	if(!isset($desde)){
		echo "No hay actualizaciones disponibles de este usuario!<br/>";
	}
	else{
		$updates = $upd_class->get_updates($paginas,$desde);
		foreach ($updates as $update){
			if($update["user_id"] == $_SESSION["user_id"])
			{?>
			<article id="upd">
				<section class ="upd_tb grid_1">
					<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_tb.jpg">';?>
				</section>
				<section class="upd-msg grid_9">
					<section class="id_sender">
						<?php echo '@'.$nickname;?>
						<section class="upd-info">
							<?php echo $update["date"];?>
						</section>
					</section>
					<?php echo $update["upd_msg"];?>
				</section>
			</article>
<?php		}
		}
	}
	$anterior = true;
	$siguiente = true;
	if (($actual == 1) AND ($actual == $tp)) {
		$anterior = false;
		$siguiente = false;
	}
	elseif ($actual == $tp) {
		$anterior = true;
		$siguiente = false;
	}
	elseif ($actual == 1) {
		$anterior = false;
		$siguiente = true;
	}
	echo '<div class="clear"></div>';
	echo '<div id="buttons" class="grid_9">';
	if ($anterior) {
	echo '<div id="button"><a href="?pg=prof&pagina='.($actual-1)."\">".U_PPA."</a></div>";
	}
	if ($siguiente) {
	echo '<div id="button"><a href="?pg=prof&pagina='.($actual+1)."\">".U_NPA."</a></div>";
	}
	echo '</div>';
?>
