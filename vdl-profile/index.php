<?php
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
	include("vdl-includes/vdl-core/core_profile.class.php");
	$prof = new CORE_PROFILE();
	if(isset($_GET["nick"]))
		$author = $prof->get_profile($_GET["nick"],$visitor);
	else
		$author = $prof->get_profile($_SESSION["user_id"],$visitor);
	foreach ($author as $data){
		if (isset($data['email']))
			$email = $data['email'];
		else
			$email ="";
	$nickname = $data["nickname"];
//	$size = 200;
//	$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($email) )."&size=".$size;
	$website = $data['website'];
	if (isset($data['name']))
		$name = $data['name'];
	else
		$name ="";
	if (isset($data['location']))
		$location = $data['location'];
	else
		$location ="";
	$genre = $data['genre'];
	if (isset($data['bday']))
	{
		$bday = $data['bday'];
		$age = $data['age'];
	}
	else
	{
		$bday ="";
		$age = "";
	}
	$bio = $data['bio'];
	$photo = $data['img_prof'];
	$nets =$data['prof_nets'];
?>

<div class="grid_4">
	<div class="basic_photo">
		<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_big.jpg">'; ?>
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
		}
		echo '<div class="clear"></div>';
	echo "</article>";
?>
		</div>
	
	<div class="pr_titles">
		Amigos (0)
	</div>
	<div class="basic_tb">
		No disponible...<br/>
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
			$prof = new CORE_USER();
			if(isset($_GET["nick"]))
				$net = $prof->get_networks($_GET["nick"],$visitor);
			else
				$net = $prof->get_networks($_SESSION["user_id"],$visitor);
			if(empty($net))
				echo "Sin Redes...";
			foreach ($net as $n){
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
	<div class="basic3">
		<div class="pr_titles">
			Actividad Reciente:
		</div>
		<?php
		//mostramos las actualizaciones del usuario
		$updates = $prof -> get_updates($_GET["nick"],$visitor);
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
		</div> 
	</div> 
</div> 
<div class="clear"></div>
