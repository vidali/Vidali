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

///===>If "pg" var is empty, redirect to MAINPG set in config.php, in other case, link to the selected page.
if (!isset($_GET['pg'])){
    include("vdl-home/index.php");
}
else{
	$pg=$_GET['pg'];
///===>Go to Update page.
	if ($pg == 'home')
		include("vdl-home/index.php");
///===>Go to Profile page.
	if ($pg == 'p'){
		include("vdl-profile/index.php");
}
///===>Go to Networks page.
	if ($pg == 'n'){
		include("vdl-net/index.php");
}
///===>Go to Groups page.
	if ($pg == 'g'){
		include("vdl-groups/index.php");
}
///===>Go to inbox.
	if ($pg == 'media'){
		if (!isset($_GET['action']))
			include("vdl-includes/media.php");
		else{
			$func = $_GET['action'];
			if($func == 'setprim')
				include("vdl-media/set_img.php");
		}
		
		
	}
///===>Go to Configuration page.
	if ($pg == 'conf')
		include("vdl-includes/conf.php");
///===>Go to Administration page.
	if ($pg == 'admin')
		include("vdl-admin/index.php");
}
?>
