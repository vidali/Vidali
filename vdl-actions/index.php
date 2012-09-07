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

<?php

//HOME
if(!isset($_GET["pg"])){
	$p_friends = $prof->prof_friends();?>
	<div class="pr_titles">
		Amigos (<?php echo $p_friends; ?>)
	</div>
	<div class="basic_tb">
		<?php 
		if($p_friends == 0)
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
//Mensajes
elseif($_GET["pg"] == 'g'){
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
//Grupos

//Archivos

//Ajustess

?>
