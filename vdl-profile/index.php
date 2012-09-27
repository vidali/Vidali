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
//Carga de datos...

if(isset($_GET["p2"])){
	$prof = new CORE_PROFILE($_GET["p2"],NICK);
	$author = $prof->get_profile($_GET["p2"],NICK);
}
else
$author = $user->get_profile($_SESSION["nick"],NICK);
$id = $author[2]['id'];
$website = $prof->site();
$name = $prof->name();
$nickname = $prof->nickname();
$location = $prof->location();
if($prof->sex() == "male")
	$genre = "Hombre";
else
	$genre = "Mujer";
$bday = $prof->bday();
$age = $prof->age();
$bio = $prof->bio();
$photo = $prof->img_prof();
$email = $prof->email();
$groups = $prof->prof_groups();
$frs = $prof->prof_friends();
$networks = array();
$networks = $author[0];
$friends = $author[1];
$size = 180;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($email) )."&size=".$size;

echo "hola";
?>
