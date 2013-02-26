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
	<a class="btn btn-primary btn-large">
		Nuevo mensaje
	</a>
</div>
<div class="tabbable tabs-left">
	<ul class="nav nav-tabs">
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
	<div class="tab-content">
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
		<form class="navbar-form">
			<input type="text" class="span6">
			<button type="submit" class="btn">Enviar</button>
		</form>
	</div>
</div>
