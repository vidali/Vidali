<?php
	$paginas = 4;
	$sql = mysql_query ("SELECT * FROM vdl_updates ORDER BY id DESC");
	$total = mysql_num_rows ($sql);
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
			echo '<article id="upd">';
				echo '<section class="upd-msg">'.$update["upd_msg"].'</section><section class="upd-info">'.$update["date"]."</section>";
			echo '</article>';
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
	if ($anterior) {
	echo '<a href="?pg=prof&pagina='.($actual-1)."\">&lt; ".U_PPA."</a> | ";
	}
	if ($siguiente) {
	echo '<a href="?pg=prof&pagina='.($actual+1)."\">".U_NPA." &gt;</a>";
	}

?>
