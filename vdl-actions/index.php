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
	if(isset($_GET['!']))
		$stream='all';
?>
<form id="set_status" action="vdl-include/set_update.php" method="post">
	<span>Actualiza tu estado:</span>
	<span>
		<input type="hidden" id="sender" name="sender" value="<?php echo $_SESSION['nick']?>">
		<textarea id="update" name="update" style="width:180px;" maxlength="512" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea><br>
		<input class="btn primary" type="submit" value="Actualiza!">
		<span id="contador"></span><br>
	</span>
</form>

<?php 	
	if(!isset($_GET["@"])){
		if(!isset($_GET["pg"])){
?>
		<section class="p_resume">
			<div id="p_thumb">
				<?php
					  $size = 100;
					  $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($_SESSION["mail"]) )."&size=".$size;
					  echo '<a href="http://es.gravatar.com/site/signup/" target="_blank"><img src="'.$grav_url.'"></a>';?>
			</div>
			<div id="p_info">
				<?php echo "@".$nick; ?><br/>
				<?php echo $p_visits; ?> visitas <br/>
				<?php echo $p_friends; ?> Amigos<br/>
				<?php echo $p_nets; ?> Redes<br/>
			</div>
		</section>
<?php	}
		else{
			if($_GET["pg"] == 'g'){
				echo "Temas Destacados<br>";
				foreach($trending as $trend){
					$link = ucwords(strtolower($trend["topic"]));
					echo '<h3><a href="?pg=g&!=all&q=%23'.$link.'">'.$trend["topic"]."</a></h3>";
				}
			}
			if($_GET["pg"] == 'media'){
				echo "MEDIA";
			}			
		}
	}
	else{
			?>
	<div class="basic_photo">
		<img src="<?php echo $grav_url ?>">
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
				if($_SESSION["nick"] != $nickname){
					if($prof->is_friend($_SESSION["id"],$id) != '6'){
						?>
						<form action="vdl-include/manage_friend.php?action=delete" method="post">
						<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
						<input id="id_friend" name="id_friend" type="hidden" value="<?php echo $id ?>"><br/>
						<input type="submit" value="Eliminar Amigo">
						</form>
						<?php 
					}
					else{
						?>
						<form action="vdl-include/manage_friend.php?action=add" method="post">
						<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
						<input id="id_friend" name="id_friend" type="hidden" value="<?php echo $id ?>"><br/>
						<input type="submit" value="Agregar Contacto">
						</form>
						<?php 
					}
					?>
					<form action="vdl-include/manage_friend.php?action=block" method="post">
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
				echo '<a href="?pg=p&@='. $f["nick"] .'">';
				echo '<div id="net_photo"><img src="vdl-media/vdl-images/'.$f["avatar_id"].'_tb.jpg"></div>';
				echo '<div id="net_id_p">'.$f["nick"].'</div></a>';
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
	}?>
