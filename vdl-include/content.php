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

///===>If "pg" var is empty, redirect to MAINPG set in config.php, in other case, link to the selected page.
if (!isset($_GET['pg'])){
    include("vdl-home/index.php");
}
else{
	$pg=$_GET['pg'];
///===>Go to Profile page.
	if ($pg == 'p'){
		include("vdl-profile/index.php");
}
///===>Go to inbox page.
	if ($pg == 'm'){
		include("vdl-inbox/index.php");
}
///===>Go to Groups page.
	if ($pg == 'g'){
		include("vdl-groups/index.php");
}
///===>Go to files.
	if ($pg == 'f'){
		if (!isset($_GET['action']))
			include("vdl-files/index.php");
		else{
			$func = $_GET['action'];
			if($func == 'setprim')
				include("vdl-media/set_img.php");
		}
		
		
	}
///===>Go to Configuration page.
	if ($pg == 's')
		include("vdl-settings/index.php");
///===>Go to Administration page.
	if ($pg == 'admin')
		include("vdl-admin/index.php");
}
?>
