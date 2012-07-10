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
$prof = new CORE_PROFILE();

if ($group == "empty"){
	echo "hola pagina de grupos";
}
else{
	echo '<h2>'.$_GET["q"].'</h2>';
	foreach ($group as $upd){?>
		<article id="upd">	
				<section class="upd-info">
				<?php echo '@'.$upd["nick"];?>
				<?php echo $upd["date_published"];?>
				</section>
			<section class ="upd_tb span1">
				<?php echo '<img src="vdl-media/vdl-images/'. $upd["avatar_id"] . '_tb.jpg">';?>
			</section>
			<section class="upd-msg span8">
				<?php echo $prof->meta_text($upd["text"]);?>
			</section>
		</article>
<?php 	}
}?>
