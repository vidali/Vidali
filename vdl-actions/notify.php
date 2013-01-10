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
		<ul class="unstyled">
			<?php
				$c_user = NEW CORE_USER();
				$myrequest = $c_user->check_request(ID);
				if (count($myrequest) == 0)
					echo "No hay ninguna solicitud...";
				else{
					foreach($myrequest as $req){
						$nick = $c_user->get_nick($req[0]);
						$img = $c_user->get_img($req[0]);
						echo '<pre><li><form id="confirmar_amigo" class="navbar-form" method="post" action="/Vidali/vdl-include/confirm_friend.php">';
						echo '<img src="'.BASEDIR."/vdl-files/".$img[0].'.jpg" width="60" height="60" >'." ".$nick[0];
						echo '<br><button type="submit" name="action" value="1" class="btn btn-link"> Aceptar</button><input type="hidden" name="usuario" value="'.ID.'"/><input type="hidden" name="amigo" value="'.$req[0][0].'"/>';
						echo '<button type="submit" name="action" value="2" class="btn btn-link"> Rechazar</button><input type="hidden" name="usuario" value="'.ID.'"/><input type="hidden" name="amigo" value="'.$req[0][0].'"/></form></li></pre>';
					}
				}
			
			
			/*$val = $user->get_notify($_SESSION["nick"]);
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
			}*/
			?>
		</ul>
	</div>
	<div id="Replies" class="inbox-tab tab-pane fade">
		Respuestas
	</div>
	<div id="Events" class="inbox-tab tab-pane fade">
		Eventos
	</div>
</div>
