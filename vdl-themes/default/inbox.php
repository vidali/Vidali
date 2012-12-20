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
?>



<div align="right">
	<a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary btn-large">Nuevo mensaje</a>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Nuevo Mensaje</h3>
	</div>
	<form id="send_m" method="post" action="/Vidali/vdl-include/send_msg.php">
		<div class="modal-body">
			<h4>Para: </h4>
			<br>
			<input type="text" id="remitte678" name="remitte" class="span12" style="margin: 0 auto;" />
			<br>
			<h4>Mensaje: </h4>
			<br>
			<textarea name="texto" class="span12" rows="10" cols="100" />
			<input type="hidden" name="conver" value="<?= $ID ?>"/>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</form>
</div>

<form id="send_m_direct" class="navbar-form" method="post" action="/Vidali/vdl-include/send_msg_direct.php">
	<div class="tabbable tabs-left" >
		<ul class="nav nav-tabs" >
			<?php
				$active = 1;
				foreach ($convers as $conv){
					if ($active == 1) {
						echo '<li class="active">';
					} else {
						echo '<li>';
					}
					echo '<a href="#A'.$active.'" data-toggle="tab">';
					$cont = 1;
					while ($conv[$cont] != null){
						
						if (ID != $conv[$cont]) {
							$userprueba = $c_user->get_nick($conv[$cont]);
							$img = $c_user->get_img($conv[$cont]);
							echo '<img src="'.BASEDIR."/vdl-files/".$img[0].'.jpg" width="60" height="60" >';
							echo $userprueba[0] . '<br>';
						}
						$cont++;
					}
					$active++;
					echo '</a></li>';
				}
			?>
		</ul>
		<div id="ab" class="tab-content" style="overflow: auto; height: 400px;">
			<?php
				$active = 1;
				foreach ($convers as $conv){
					$messages = $c_msg->get_messages($conv[0]);
					echo '<div class="tab-pane';
					if ($active == 1) {
						echo ' active';
					}
					echo '" id="A'.$active.'">';
					foreach ($messages as $mess){
						$img = $c_user->get_img($mess[1]);
						echo '<p><img src="'.BASEDIR."/vdl-files/".$img[0].'.jpg" width="30" height="30" >';
						$usermsg = $c_user->get_nick($mess[1]);
						echo '<font color = "blue">'.$usermsg[0].'</font><br>'.$mess[3].'<br><font color = "grey">'.$mess[2].'</font><br></p>';
					}
					echo '</div>';
					$active++;
				}
			?>
			<div align="right">
				<textarea name="textdirect" rows="3" style="width:82%"  />
			<button type="submit" class="btn" style="height: 70px" autofocus>Enviar</button>
		</div>
		</div>
	</div>
	<input type="hidden" name="usuario" value="<?= $ID ?>"/>
</form>

