<?php
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
$MAIN->load_lang();

if(isset($_SESSION['loged'])){
	define("ID",$_SESSION["id"]);
	define("NICK",$_SESSION["nick"]);
	define("NAME",$_SESSION["name"]);
	define("MAIL",$_SESSION["mail"]);
	define("LOGED",$_SESSION['loged']);
	lw('config')->set( 'template' , 'vdl-themes/'.THEME.'/index.html');
}
elseif(defined('PASS_C')){
	$ACT->login(NICK_C,PASS_C,2);
	lw('config')->set( 'template' , 'vdl-themes/'.THEME.'/index.html');
}
else{
	lw('config')->set( 'template' , 'vdl-themes/'.THEME.'/login.html');
 }
?>
