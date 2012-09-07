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

	$prof = new CORE_PROFILE(NICK,$_SESSION["nick"]);
	$author = $prof->get_card($_SESSION["nick"]);
	$nick = $prof->nickname();
	$p_visits = $prof->prof_visits();
	$p_friends = $prof->prof_friends();
	$p_nets = $prof->prof_nets();
	$photo = $prof->img_prof();

?>

<section class="row-fluid">
	<div class="span3">
		<?php
			  $size = 50;
			  $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($_SESSION["mail"]) )."&size=".$size;
			  echo '<a href="http://es.gravatar.com/site/signup/" target="_blank"><img src="'.$grav_url.'"></a>';?>
	</div>
	<div class="span9">
		<?php echo "@".$nick; ?><br/>
		<?php echo $p_visits; ?> visitas 
		<?php echo $p_friends; ?> Amigos
		<?php echo $p_nets; ?> Grupos
	</div>
</section>
