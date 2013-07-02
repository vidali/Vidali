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
ini_set('mssql.charset', 'UTF-8');
include_once 'class/CORE_DB.php';
include_once 'class/CORE_MAIN.php';
include_once 'class/CORE_SECURITY.php';
include_once 'class/CORE_ELEMENTS.php';
include_once 'class/CORE_ACTIONS.php';
include_once 'class/CORE_ADMIN.php';
include_once 'class/CORE_OBJECTS.php';
include_once 'class/CORE_PLUGINS.php';
include_once 'class/GROUP.php';
include_once 'class/USER.php';
include_once 'class/PROFILE.php';
include_once 'class/USER_ACTIVE.php';
include_once 'class/GROUP_ACTORS.php';
include_once 'class/USER_ACTORS.php';
include_once 'class/UFILE.php';
include_once 'class/EVENT.php';
include_once 'class/PLACE.php';
include_once 'class/UPDATE.php';
include_once 'class/PRIVATE_TALK.php';
include_once 'class/PRIVATE_MSG.php';
$ACT = new CORE_ACTIONS();
$SEC = new CORE_SECURITY();
$SEC = new CORE_SECURITY();
$MAIN = new CORE_MAIN();
$MAIN->load();
$nick = $SEC->clear_text_strict($_POST["r_nick"]);
$date = getdate();
$password = mysqli_real_escape_string($connection,sha1(md5(trim($_POST["r_pass"]))));
if($core-> add_user($_POST["r_email"],$nick,$password,"Your name",$date,"male","Your location","Your description") == true)
	echo "Done";
else {
	echo "Fail";
}
?>