<div id="dialog" title="Comentar">
		<form id="vdl-form" name="vdlreply" class="grid_6" action="vdl-includes/reply.php" method="post">
			<?php echo $_GET["idcom"] . " y " . $_GET["idsender"]; ?>
			Comentario:<br/>
			<textarea name="bio" rows="5" cols="77" placeholder="Escribe tu comentario..." ></textarea><br/>
			<input type="submit" value="Enviar">
		</form>
</div>