<?php
	$id = $_GET["n"];
	if (isset($_GET["public"]))
		$public = $_GET["public"];
	else
		$public ="";
		$data=array("name" => "", "email" => "", "adress" => "", "comment" => "");
	include("vdl-functions/notes.class.php");
	$note_class= new Notes();
		$note = $note_class->get_note($id);
			echo '<div id="note">';
				echo '<div class="title-note"><h3><a href="?pg=notes&notes=note&n='.$note["id"]. '">' .$note["title"].'</a></h3></div>';
				echo '<div class="resume">'.$note["resume"].'</div>';
				echo '<div class="cont">'.str_replace("&lt;br/&gt;","<br/>",$note["content"]).'</div>';
				echo '<div class="info-note">'.$note["date"]." Escrito por ".$note["author"]." | categorias:".$note["groups"] .'</div>';
			echo "</div>";
		echo "<h3>Comentarios:</h3><br/>";
		$comments = $note_class->get_comment($id);
		if (empty($comments)){
			echo "No hay ningún comentario todavía...";
		}
		else{
			foreach ($comments as $row){
				echo '<div id="comment">';
					echo '<div class="title-note"><h3><a href="'.$row["adress"]. '">' .$row["user"].'</a></h3></div>';
					echo '<div class="cont">'.$row["comment"].'</div>';
					echo '<div class="info-note">'.$row["date"].'</div>';
				echo "</div>";
			}
		}
	echo "<h3>Enviar un comentario:</h3>";
	echo "<div id='vdl-form'>";
			if($public == "false"){
				$data=$_SESSION['form'];
			}
			echo '<form method="post" action="vdl-notes/add_com.php"> 
				<input type="hidden" name="postid" value="' . $id . '">
				<label>Nombre:</label> <input type="name" name="user" maxlength="20" size="20" value="'. $data['name'] .'" required autofocus/> <br/>
				<label>Email (Obligatorio, se mantendrá oculto):</label>
				<input name="email" type="email" maxlength="30" size="20" value="'. $data['email'] .'" placeholder="ejemplo@dominio.com" required /> <br/>
				<label>Pagina web (Opcional):</label><input name="adress" type="url" maxlength="40" size="40" value="'. $data['adress'] .'" placeholder="Tu Web (opcional)" required/> <br/>
				<label>Mensaje:</label> <br/>
				<textarea name="comment" cols="70" rows="10" required>'. $data['comment'] .'</textarea> <br/>
					<input type="submit" name="send" value="Enviar Mensaje" /> 
					<input type="reset" name="enviar" value="Borrar datos" /> 
			</form>';
	echo "</div>";
?>
