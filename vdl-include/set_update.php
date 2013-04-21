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
session_start();
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
$MAIN = new CORE_MAIN();
$MAIN->load();
define("ID",$_SESSION["id"]);
define("NICK",$_SESSION["nick"]);
define("NAME",$_SESSION["name"]);
define("MAIL",$_SESSION["mail"]);
define("LOGED",$_SESSION['loged']);

$USER_ACTIVE = new USER_ACTIVE(NICK,$_SESSION["nick"]);
$ACTIONS = new CORE_ACTIONS();
	//AQUI SE COMPROBARÁ SI EL ESTADO CONTIENE ALGUN @REPLY, #HASTAG, !RED, @>MENSAJE, #> MENSAJE, SE SEPARARÁ LOS LINKS DEL MENSAJE Y
	// SE PODRÁ FILTRAR 1 LINK, 1 VIDEO Y/O 1 IMAGEN
$SEC = new CORE_SECURITY();
$message = $SEC->clear_text($_POST['update']);
$message = $ACTIONS->meta_text($message);
$message =  nl2br($message);
if(strlen($message)==0){
	echo $message . ' no ha sido entregado';
}
else{
	$USER_ACTIVE->update(NICK,$message,session_id());
	echo 'done';
}
?>
