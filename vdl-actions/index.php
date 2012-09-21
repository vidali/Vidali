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
	$home_a = array("Amigos", "Grupos", "Perfil");
	$inbox_a = array("Recibidos", "Enviados", "Otros");
	$groups_a = array("Tendencias", "Grupos", "Mis grupos");
	$files_a = array("Archivos", "Musica", "Vídeos");
	$settings_a = array("Información", "Soporte", "Reportar");
	
	switch ($type) {
    case 'home':
		$a1=$home_a[0];
		$a2=$home_a[1];
		$a3=$home_a[2];
        break;
    case 'inbox':
		$a1=$inbox_a[0];
		$a2=$inbox_a[1];
		$a3=$inbox_a[2];
        break;
    case 'groups':
		$a1=$groups_a[0];
		$a2=$groups_a[1];
		$a3=$groups_a[2];
        break;
    case 'files':
		$a1=$files_a[0];
		$a2=$files_a[1];
		$a3=$files_a[2];
        break;
    case 'settings':
		$a1=$settings_a[0];
		$a2=$settings_a[1];
		$a3=$settings_a[2];
        break;
	}
	echo '<ul class="nav nav-tabs">
		<li class="active">
			<a href="#">'.$a1.'</a>
		</li>
		<li>
			<a href="#">'.$a2.'</a>
		</li>
		<li>
			<a href="#">'.$a3.'</a>
		</li>
	</ul>';
}


if($pg==''){
	make_tabs('home');
	?>
	<div class="basic_tb">
		<?php 
		if($user->prof_friends() == 0)
			echo "No has agregado ningún amigo todavia...";
		foreach ($friends as $f){
			echo '<article id="net">';
				echo '<a href="?pg=p&@='. $f["nick"] .'">';
				echo '<div id="net_photo"><img src="vdl-media/vdl-images/'.$f["avatar_id"].'_tb.jpg"></div>';
				echo '<div id="net_id_p">'.$f["nick"].'</div></a>';
				echo '<div class="clear"></div>';
			echo '</article>';
		}
		?>
	</div>
<?php
}
elseif($pg=='m'){
	make_tabs('inbox');
}
elseif($pg=='g'){
	make_tabs('groups');
	echo "Grupos<br>";
	foreach($groups as $gr){
		$link = ucwords(strtolower($gr["group_name"]));
		echo '<h3><a href="/Vidali/?pg=g&q=%23'.$link.'">'.$gr["group_name"]."</a></h3>";
	}
	
	echo "Temas Destacados<br>";
	foreach($trending as $trend){
		$link = ucwords(strtolower($trend["topic"]));
		echo '<h3><a href="/Vidali/?pg=g&q=%23'.$link.'">'.$trend["topic"]."</a></h3>";
	}
}
elseif($pg=='f'){
	make_tabs('files');
}
elseif($pg=='s'){
	make_tabs('settings');
}

?>
