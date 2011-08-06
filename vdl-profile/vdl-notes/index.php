<?php
	if ($loged==1){
		echo '<a href="vdl-profile/vdl-notes/add.php" class="boxy" title="Publicar anotación">Nueva nota   </a>';
		echo '<a href="vdl-profile/vdl-notes/manage.php" class="boxy" title="Organizar">Organizar notas</a>';
	}
	include("./vdl-includes/vdl-core/notes.class.php");
	$note_class= new Notes();
	$paginas = 5;
	$sql = mysql_query ("SELECT * FROM vdl_notes ORDER BY id DESC");
	$total = mysql_num_rows ($sql);
	$data = mysql_fetch_assoc($sql);
	$ultimo = $data["id"];
	if (isset($_GET["pagina"]))
		$actual = $_GET["pagina"];
	else{ 
			 $actual=1; 
	} 

	if ($actual == 1) {
		$desde = $ultimo;
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
		echo "No hay Entradas escritas!<br/>";
	}
	else{
		$notes = $note_class->get_notes($paginas,$desde);
		foreach ($notes as $note){
			echo '<div id="note">';
				echo '<div class="title-note"><h3><a href="?pg=notes&notes=note&n='.$note["id"]. '">' .$note["title"].'</a></h3></div>';
				echo '<div class="resume">'.$note["resume"].'</div>';
				echo '<div class="cont">'.str_replace("&lt;br/&gt;","<br/>",$note["content"]).'</div>';
				echo '<div class="info-note">'.$note["date"]." Escrito por ".$note["author"]." | categorias:".$note["groups"] .'</div>';
//				echo "<section class='info'> Escrito por ".$note["author"]." | categorias:".$note["groups"] . "</section>";
			echo "</div>";
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
	echo '<a href="?pg=notes&pagina='.($actual-1)."\">&lt; Página anterior</a> | ";
	}
	else {
	echo "|";
	}
	for ($i = 1; $i <= $tp;$i++) {
	if ($i == $actual) {
	echo " <b>".$i."</b> | ";
	}
	else {
	echo '<a href="?pg=notes&pagina='.$i."\"> ".$i."</a> |";
	}
	}
	if ($siguiente) {
	echo '<a href="?pg=notes&pagina='.($actual+1)."\"> Página siguiente &gt;</a>";
	}

?>
