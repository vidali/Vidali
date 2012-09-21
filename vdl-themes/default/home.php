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
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">Resumen</a>
  </li>
  <li>
    <a href="#">Tu</a>
  </li>
  <li>
    <a href="#">Eventos</a>
  </li>
  <li>
    <a href="#">Red</a>
  </li>
  <li>
    <a href="#">Fisgona</a>
  </li>
</ul>

<div id="home_titles" class="row-fluid"> 
	<section class="span12">
		<div class="pr_titles">
			<h2>Actividad Reciente</h2>
		</div>	
	</section>
	<?php $upd_cont = count($home_upd);
	if (empty($home_upd))
		echo '<article id="upd" class="span12">';
		echo "<h5>Un gatito oculta tus estados, haz amigos para que las vuelvas a ver!</h5>";
		echo '<img border=0 src="http://www.fondosgratis.mx/archivos/temp/3916/400_1210305448_gato-malo.jpg">';
		echo '</article">';
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
					<?php echo '<a href="?pg=p&!=all&@='.$upd["nick"].'">@'.$upd["nick"].'</a> <br> '.$upd["date_published"];?>
				</div>
			</section>
			<section class="upd-msg span12">
				<?php echo $prof->meta_text($upd["text"]);?>
			</section>
		</article>
	<?php $upd_cont--;
	}?>
</div>
