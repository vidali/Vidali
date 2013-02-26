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
$prof = new CORE_PROFILE(NICK,$_SESSION["nick"]);

?>
<div class="row">
	<section class="span12">
		<div class="pr_titles">
<?php
if ($group == "empty"){
	echo "hola pagina de grupos";?>
		</div>	
	</section>	
<?php
}
else{
	echo '<h2>'.$_GET["q"].'</h2>';?>
		</div>	
	</section>
<?php
	foreach ($group as $upd){?>
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
					<?php echo '<a href="?pg=p&!=all&@='.$upd["nick"].'">@'.$upd["nick"].'</a> - '.$upd["date_published"];?>
				</div>
			</section>
			<section class="upd-msg span12">
				<?php echo $prof->meta_text($upd["text"]);?>
			</section>
		</article>
	<?php
	}
}?>
</div>
