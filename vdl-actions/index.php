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

function make_tabs($type){
	$home_a = array("Inicio", "Perfil", "Grupo");
	$home_r = array("home-friends", "home-groups", "home-profile");
	$inbox_a = array("Recibidos", "Enviados", "Otros");
	$inbox_r = array("inbox-in", "inbox-out", "inbox-others");
	$groups_a = array("Tendencias", "Grupos", "Mis grupos");
	$groups_r = array("groups-trends", "groups-allgroups", "groups-mygroups");
	$files_a = array("Archivos", "Musica", "Vídeos");
	$files_r = array("files-all", "files-music", "files-videos");
	$settings_a = array("Información", "Soporte", "Reportar");
	$settings_r = array("set-info", "set-support", "set-report");
	
	switch ($type) {
    case 'home':
		$a1=$home_a[0];
		$a2=$home_a[1];
		$a3=$home_a[2];
		$r1=$home_r[0];
		$r2=$home_r[1];
		$r3=$home_r[2];
        break;
    case 'inbox':
		$a1=$inbox_a[0];
		$a2=$inbox_a[1];
		$a3=$inbox_a[2];
		$r1=$inbox_r[0];
		$r2=$inbox_r[1];
		$r3=$inbox_r[2];
        break;
    case 'groups':
		$a1=$groups_a[0];
		$a2=$groups_a[1];
		$a3=$groups_a[2];
		$r1=$groups_r[0];
		$r2=$groups_r[1];
		$r3=$groups_r[2];
        break;
    case 'files':
		$a1=$files_a[0];
		$a2=$files_a[1];
		$a3=$files_a[2];
		$r1=$files_r[0];
		$r2=$files_r[1];
		$r3=$files_r[2];
        break;
    case 'settings':
		$a1=$settings_a[0];
		$a2=$settings_a[1];
		$a3=$settings_a[2];
		$r1=$settings_r[0];
		$r2=$settings_r[1];
		$r3=$settings_r[2];
        break;
	}
	echo '<div class="tabbable tabs-left">';
	echo '<ul id="side-tab" class="nav nav-tabs ">
		<li class="active">
			<a href="#'.$r1.'" data-toggle="tab">'.$a1.'</a>
		</li>
		<li>
			<a href="#'.$r2.'" data-toggle="tab">'.$a2.'</a>
		</li>
		<li>
			<a href="#'.$r3.'" data-toggle="tab">'.$a3.'</a>
		</li>
	</ul>';
	echo '</div>';
}

if($pg==''){
	make_tabs('home');
	?>
<div id="" class="tab-content">
	<div id="home-friends" class="friends-tab tab-pane fade active in">
		<?php
		if($data["n_friends"] == 0){
			echo "No has agregado ningún amigo todavia...";
		}
		else{
			foreach ($friends as $f){
				echo '<article id="net">';
					echo '<a href="?pg=p&@='. $f["nick"] .'">';
					echo '<div id="net_photo"><img src="img/'.$f["avatar_id"].'_tb.jpg"></div>';
					echo '<div id="net_id_p">'.$f["nick"].'</div></a>';
					echo '<div class="clear"></div>';
				echo '</article>';
			}
		}
		?>
	</div>
	<div id="home-groups" class="groups-tab tab-pane fade">
		<?php
		if($data["n_views"] == 0)
			echo "No formas parte de ningún grupo...";
		else{
			echo "tienes grupos";
		}
		?>
	</div>
	<div id="home-profile" class="profile-tab tab-pane fade">
		<?php
			echo "Aqui resumen de tu perfil o del perfil elegido";
		?>
	</div>
</div>
<?php
}
if($pg=='u'){
	make_tabs('home');
	?>
<div id="" class="tab-content">
	<div id="home-friends" class="friends-tab tab-pane fade">
		<?php
		if($user->prof_friends() == 0)
			echo "No has agregado ningún amigo todavia...";
		else{
			foreach ($friends as $f){
				echo '<article id="net">';
					echo '<a href="?pg=p&@='. $f["nick"] .'">';
					echo '<div id="net_photo"><img src="img/'.$f["avatar_id"].'_tb.jpg"></div>';
					echo '<div id="net_id_p">'.$f["nick"].'</div></a>';
					echo '<div class="clear"></div>';
				echo '</article>';
			}
		}
		?>
	</div>
	<div id="home-groups" class="groups-tab tab-pane fade">
		<?php
		if($user->prof_groups() == 0)
			echo "No formas parte de ningún grupo...";
		else{
			echo "tienes grupos";
		}
		?>
	</div>
	<div id="home-profile" class="profile-tab tab-pane fade  active in">
		<?php
			echo "Aqui resumen de tu perfil o del perfil elegido";
		?>
	</div>
</div>
<?php
}
if($pg=='h'){
	make_tabs('home');
	?>
<div id="" class="tab-content">
	<div id="home-friends" class="friends-tab tab-pane fade">
		<?php
		if($user->prof_friends() == 0)
			echo "No has agregado ningún amigo todavia...";
		else{
			foreach ($friends as $f){
				echo '<article id="net">';
					echo '<a href="?pg=p&@='. $f["nick"] .'">';
					echo '<div id="net_photo"><img src="img/'.$f["avatar_id"].'_tb.jpg"></div>';
					echo '<div id="net_id_p">'.$f["nick"].'</div></a>';
					echo '<div class="clear"></div>';
				echo '</article>';
			}
		}
		?>
	</div>
	<div id="home-groups" class="groups-tab tab-pane fade">
		<?php
		if($user->prof_groups() == 0)
			echo "No formas parte de ningún grupo...";
		else{
			echo "tienes grupos";
		}
		?>
	</div>
	<div id="home-profile" class="profile-tab tab-pane fade  active in">
		<?php
			echo "Aqui resumen de tu perfil o del perfil elegido";
		?>
	</div>
</div>
<?php
}
elseif($pg=='m'){
	make_tabs('inbox');?>
<div id="" class="tab-content">
	<div id="inbox-in" class="inbox-tab tab-pane fade active in">
		<?php
			echo "Inbox";
		?>
	</div>

	<div id="inbox-out" class="sended-tab tab-pane fade">
		<?php
			echo "Salida";
		?>
	</div>

	<div id="inbox-others" class="othermsg-tab tab-pane fade">
		<?php
			echo "Otros mensajes";
		?>
	</div>
</div>
	
<?php
}
elseif($pg=='g'){
	make_tabs('groups');?>
<div id="" class="tab-content">
	<div id="groups-trends" class="trends-tab tab-pane fade active in">
		<?php
		echo "Tendencias";
		foreach($trending as $trend){
			$link = ucwords(strtolower($trend["topic"]));
			echo '<h3><a href="/Vidali/?pg=g&q=%23'.$link.'">'.$trend["topic"]."</a></h3>";
		}?>
	</div>
	
	<div id="groups-allgroups" class="groups-tab tab-pane fade">
		<?php
		echo "Grupos patrocinados";
		foreach($groups as $gr){
			$link = ucwords(strtolower($gr["group_name"]));
			echo '<h3><a href="/Vidali/?pg=g&q=%23'.$link.'">'.$gr["group_name"]."</a></h3>";
		}?>
	</div>

	<div id="groups-mygroups" class="ugroups-tab tab-pane fade">
		<?php
		echo "Grupos de usuario";
		?>
	</div>
</div>

<?php
}
elseif($pg=='f'){
	make_tabs('files');
	echo "Under construction...";
}
elseif($pg=='s'){
	make_tabs('settings');?>

<div id="" class="tab-content">
	<div id="set-info" class="info-tab tab-pane fade active in">
		Información sobre el software:<br>
		Version: 0.7.9 Pre-beta<br>
		Ultima actualización: 22/09/2012 <br>
		Nº Usuarios: TPI<br>
		Nº Mensajes: TPI<br>
		Nº Archivos: TPI<br>
		<br>
		Disclaimer:<br>
		Aqui va sobre el uso de Vidali.<br>
		Añadir guia de informacion (modal)<br>
		Enlazar a webs de la applicación<br>		
	</div>

	<div id="set-support" class="support-tab tab-pane fade">
		<br>
		Añadir servicios de soporte:<br>
		Reporte de errores<br>
		contacto con desarrolladores <br>
		Formulario (modal) de contacto <br>
	</div>

	<div id="set-report" class="ugroups-tab tab-pane fade">
		<br>
		Lista de repores:<br>
		Acoso<br>
		Contenido ilegal<br>
		Provocaciones<br>
		Incitacion a la violencia<br>
		Derechos de autor<br>
		Cuenta robada<br>
		Cuenta falsa<br>
		Proteccion parental<br>
	</div>
</div>

<?php	
}

?>
