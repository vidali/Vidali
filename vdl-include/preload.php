<?php
ini_set('mssql.charset', 'UTF-8');
include_once 'vdl-core/core_main.class.php';
include_once 'vdl-core/core_security.class.php';
include_once 'vdl-core/core_profile.class.php';
include_once 'vdl-core/core_groups.class.php';

$SEC = new CORE_SECURITY();
$MAIN = new CORE_MAIN();
$MAIN->load();
$MAIN->load_lang();
$MAIN->get_interface();

if(isset($_SESSION['loged'])){
	define("LOGED",$_SESSION['loged']);
	define("USER",$_SESSION['nick']);
	lw('config')->set( 'template' , 'vdl-themes/'.THEME.'/index.php');
}
elseif(defined('PASS_C')){
	$SEC->login(NICK_C,PASS_C,2);
	lw('config')->set( 'template' , 'vdl-themes/'.THEME.'/index.php');
}
else{
	lw('config')->set( 'template' , 'vdl-themes/'.THEME.'/login.php');
 }
?>
