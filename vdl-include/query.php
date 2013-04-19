<?php
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
if(isset($_POST['query'])){
	if($_POST['query'] == 'wall'){
		$data = $USER_ACTIVE->get_home_wall(NICK);
		echo $data;
	}
	if($_POST['query'] == 'profile'){
		if((!isset($_POST['extra'])) || ($_POST['extra'] == '')){
			$data = $USER_ACTIVE->get_profile();
		}
		else{
			$user = new USER($_POST['extra']);
			$data = $USER_ACTIVE->get_profile();			
		}
		echo $data;
	}
	if($_POST['query'] == 'inbox'){
		echo json_encode('a:1');
	}
	if($_POST['query'] == 'routes'){
		echo json_encode('a:1');
	}
	if($_POST['query'] == 'set_profile'){
		$data = $USER_ACTIVE->get_profile();
		echo $data;
	}
}

?>