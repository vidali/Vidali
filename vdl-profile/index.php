<?php
/*	Vidali, Social Network Open Source.
This file is part of Vidali.

Vidali is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Vidali is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.*/

/*
 * ¿Que hay que hacer aqui?
 * 
 * -Mostrar la información ampliada de nuestro perfil.
 * 
 * -Falta paginar las actualizaciones del perfil (esto implica cambiar
 *  la función get_updates, donde debería recibir parámetros con el
 *  número de entradas a mostrar, y la página en la que nos encontramos.
 * 
 * -Crear un sistema de comentarios para el perfil, donde nuestras
 *  "amistades" podrán dejarnos mensajes en nuestro perfil o comentar
 *  en nuestros estados.
 * 
 * -Arreglar el bug por el que el año de la fecha de nacimiento no se
 *  muestra correctamente.
 * 
 * -Implementar las funciones necesarias para mostrar nuestras amistades
 * 
 * -Implmentar el botón y las funciones necesarias para agregar como
 *  "contacto" a un usuario.
 * 
 * -Enlazar desde la imagen de perfil a nuestro contenido multimedia para
 *  cambiar nuestro avatar por otro.
 * 
 * -Cambiar la visualización de esta página para personas que no estén
 *  en nuestra lista de contactos.
 */
 
//Carga de datos...
	$prof = new CORE_PROFILE();
	if(isset($_GET["@"]))
		$author = $prof->get_profile($_GET["@"],$visitor);
	else
		$author = $prof->get_profile($_SESSION["user_id"],$visitor);
	$id = $author[2]['id'];
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

<div class="grid_4">
	<div class="basic_photo">
		<?php echo '<a class="modal" href="vdl-includes/upl.php" title="Cambiar Avatar"><img src="vdl-media/vdl-images/'. $photo . '_big.jpg"></a>'; ?>
	</div> 
		<div class="basic3">
			<div class="pr_titles">
				<h1><?php echo $name.' (@'.$nickname.')';?></h1>
			</div>
			<?php
				//mostramos la información de nuestro perfil, falta mostrar información ampliada.
				echo '<article id="info-pr">';
				echo $genre.'<br/>';
				echo $age." ". P_AG2 .' (';
				echo $bday.')<br/>';
				echo $location.'<br/>';
				//echo '<img src="' . $grav_url . '" alt="User Gravatar">';
				echo '<a href="mailto:'.$email.'">'.$email.'</a><br/>';
				echo '<a href="http://'.$website.'">'.$website.'</a><br/>';
				echo $bio . '</br>';
				if($_SESSION["nickname"] != $nickname){
					if($prof->is_friend($_SESSION["id"],$id) != '6'){
						?>
						<form action="vdl-includes/manage_friend.php?action=delete" method="post">
						<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
						<input id="id_friend" name="id_friend" type="hidden" value="<?php echo $id ?>"><br/>
						<input type="submit" value="Eliminar Amigo">
						</form>
						<?php 
					}
					else{
						?>
						<form action="vdl-includes/manage_friend.php?action=add" method="post">
						<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
						<input id="id_friend" name="id_friend" type="hidden" value="<?php echo $id ?>"><br/>
						<input type="submit" value="Agregar Contacto">
						</form>
						<?php 
					}
					?>
					<form action="vdl-includes/manage_friend.php?action=block" method="post">
					<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
					<input id="id_user" name="id_user" type="hidden" value="<?php echo $id ?>"><br/>
					<input type="submit" value="Bloquear usuario">
					</form>
					<?php
				}
			echo '<div class="clear"></div>';
	echo "</article>";
?>
		</div>
	
	<div class="pr_titles">
		Amigos (<?php echo $frs; ?>)
	</div>
	<div class="basic_tb">
		<?php 
		if($frs = 0)
			echo "No has agregado ning�n amigo todavia...";
		foreach ($friends as $f){
			echo '<article id="net">';
				echo '<a href="?pg=p&nick='. $f["nickname"] .'">';
				echo '<div id="net_photo"><img src="vdl-media/vdl-images/'.$f["img_prof"].'_tb.jpg"></div>';
				echo '<div id="net_id_p">'.$f["nickname"].'</div></a>';
				echo '<div class="clear"></div>';
			echo '</article>';
		}
		?>
			<?php /*if()
		echo '<div id="button">Añadir...</div>';*/
	?>
		<?php //<div id="button">Ver mas...</div>?>
	</div>

	<div class="pr_titles">
		Redes (<?php echo $nets; ?>)
	</div>
	<div class="basic_tb">
		<?php
		//mostramos las redes del usuario, se debería mostrar solo 5 y un boton para mostrar todas las redes.
		if($nets = 0)
			echo "Sin Redes...";
		foreach ($networks as $n){
			echo '<article id="net">';
				echo '<a href="?pg=n&name='. $n["net_name"] .'">';
				echo '<div id="net_photo"><img src="vdl-media/vdl-images/'.$n["net_img"].'_tb.jpg"></div>';
				echo '<div id="net_id_p">'.$n["net_name"].'</div>';
				echo '<div id="net_info_p">'.$n["net_sdesc"].'</div></a>';
				echo '<div class="clear"></div>';
			echo '</article>';
		}
		?>
<?php /*		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<div id="button">Ver todos</div>*/?>
	</div> 

</div>

<div class="grid_11 prefix_1"> 
	<div id="actv" class="basic3">
<!--NO QUITAR LA LINEA DE ABAJO - SISTEMA DINAMICO DE ACTUALIZACION -->
<!--B -->
		<div class="pr_titles">
			Actividad Reciente:
		</div>
		<?php
		//mostramos las actualizaciones del usuario
		$updates = $prof -> get_updates($_GET["@"],$visitor);
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
	</div> 
</div> 
<div class="clear"></div>
