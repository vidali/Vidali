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
				<?php echo '<img src="vdl-media/vdl-images/' . $photo . '.jpg">'; ?>
			</div>
			<div id="p_info">
				<?php echo $nick; ?><br/>
				<?php echo $p_visits; ?> visitas <br/>
				<?php echo $p_friends; ?> Amigos<br/>
				<?php echo $p_nets; ?> Redes<br/>
			</div>
		</section>
<?php	}
		else{
			echo "aqui va elementos para grupos/redes/archivos/etc";
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
				//mostr