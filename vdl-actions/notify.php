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
<ul id="notify-tab" class="nav nav-tabs">
  <li class="active">
    <a href="#Requests" data-toggle="tab">Solicitudes</a>
  </li>
  <li>
    <a href="#Replies" data-toggle="tab">Replys</a>
  </li>
  <li>
    <a href="#Events" data-toggle="tab">Eventos</a>
  </li>
</ul>

<div id="" class="tab-content">
	<div id="Requests" class="inbox-tab tab-pane fade active in">
	<?php
	//~ $val = $user->get_notify($_SESSION["nick"]);
	foreach ($val as $not){
		if($not["type"]== 1){
			echo $not["user_sender"] . " te ha enviado una petición de amistad<br>";?>
			<form action="vdl-include/manage_friend.php?action=acept" method="post">
			<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
			<input id="id_sender" name="id_sender" type="hidden" value="<?php echo $not["user_sender"] ?>"><br/>
			<input id="id_not" name="id_not" type="hidden" value="<?php echo $not["id"] ?>"><br/>
			<input type="submit" value="Aceptar">
			</form>
			<form action="vdl-include/manage_friend.php?action=delete" method="post">
			<input id="id_main" name="id_main" type="hidden" value="<?php echo $_SESSION["id"] ?>"><br/>
			<input id="id_friend" name="id_friend" type="hidden" value="<?php echo $id ?>"><br/>
			<input type="submit" value="Denegar">
			</form>
		<?php
		}
	}
	?>
	</div>
	<div id="Replies" class="inbox-tab tab-pane fade">
		Respuestas
	</div>
	<div id="Events" class="inbox-tab tab-pane fade">
		Eventos
	</div>
</div>
