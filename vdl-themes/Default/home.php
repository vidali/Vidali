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
<ul id="home-tab" class="nav nav-pills no-bot-margin">
  <li class="active">
    <a href="#home-wall" data-toggle="tab">Resumen</a>
  </li>
  <li>
    <a href="#home-me" data-toggle="tab">Global</a>
  </li>
  <li>
    <a href="#home-events" data-toggle="tab">Informer</a>
  </li>
  <li>
    <a href="#home-net" data-toggle="tab">Red</a>
  </li>
</ul>
<div id="" class="tab-content">
	<div id="home-wall" class="tab-pane fade row-fluid active in"> 
		<?php $upd_cont = count($home_upd);
		if (empty($home_upd)){
			echo '<article id="upd" class="span12">';
			echo "<h5>Un gatito oculta tus estados, haz amigos para que las vuelvas a ver!</h5>";
			echo '</article">';
		}
		foreach($home_upd as $upd){ ?>
			<article id="upd" class="span12">
				<section class="span12">
					<div class="span1">
					<?php //echo '<img src="vdl-media/vdl-images/'. $upd["avatar_id"] . '_tb.jpg">';
						$size = 50;
						$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($upd["email"]) )."&size=".$size;
						echo '<img border="0" src="'.$grav_url.' class="thumbnail">';
					?>
					</div>
					<div class="upd-info span11">
						<div class="row-fluid">
							<div class="span11">
								<?php echo '<a href="'.BASEDIR.'/u/'.$upd["nick"].'/">@'.$upd["nick"].'</a> <br> '.$upd["date_published"];?>
							</div>
							<div class="upd-msg span11">
								<?php echo $user->meta_text($upd["text"]);?>
							</div>
						</div>
					</div>
				</section>
			</article>
		<?php $upd_cont--;
		}?>
	</div>

	<div id="home-me" class="tab-pane fade row-fluid">
		mis updates
	</div>

	<div id="home-events" class="tab-pane fade row-fluid">
		mis eventos
	</div>

	<div id="home-net" class="tab-pane fade row-fluid">
		mis mensajes de red
	</div>

	<div id="home-track" class="tab-pane fade row-fluid">
		la fisgona
	</div>
</div>
