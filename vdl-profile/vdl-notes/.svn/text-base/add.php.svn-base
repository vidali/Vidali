<?php
session_start();
if(isset($_SESSION)){
	$loged = $_SESSION['loged'];
	$visitor = $_SESSION['nickname'];
}
?>
<article>
	<form action="vdl-includes/add_note.php" method="post">
		<label>Titulo:</label><br/><input id ="title" name="title" size="75" type="text" /><br/>
		<label>Imagen Principal:</label><br/><input id ="img" name="img" size="60" type="text" /><br/>
		<label>Resumen:</label><br/><textarea id="resume" name="resume" rows="5" cols="60" placeholder="Inserta un pequeño resumen..." ></textarea><br/>
		<label>Contenido:</label><br/><textarea id="post" name="post" rows="5" cols="80" placeholder="Inserta tu mensaje" ></textarea><br/>
		<?php
			echo '<input id ="user" name="user" value ="' . $visitor . '" type="hidden" />';
		?>
		<label>Tags:</label><input type="Text" name="tags"><br>
		<label>Categorias:</label><br/>
		<?php
		include("../vdl-functions/notes.class.php");
		$note_class= new Notes();
		$count = 0;
			foreach ($note_class->get_sections() as $cat)
			{
			$count = $count + 1;
				echo '<input type="checkbox" name="categs[]" value="' . $cat["id"] . '">' . $cat["group_name"] . "<br/>";
			}
		?>
		Nuevas categorias:<input type="Text" name="add_cat"> Agregar<input type="checkbox" name="add_cat_ok"><br>
		<center><input type="submit" value="Publicar"></center>
	</form>
</article>
