<?php
//~ echo dirname(__file__);

//~ if(file_exists($inc = dirname(__file__).'/dir/include.php'))
 //~ inlclude($inc); // evita el @ para un error_reporting mas flexible
//~ else
//~ echo 'Falta la inclusión';
 
//Comprobar si no esta instalado y cargar elementos base
include_once 'vdl-include/vdl-core/core_main.class.php';
include_once 'vdl-include/vdl-core/core_security.class.php';

ini_set('mssql.charset', 'UTF-8');
if(!file_exists("vdl-include/vdl-core/db.ini"))
	header("location: install/index.php"); 
if(!isset($_GET['action']))
	$action=null;
else
	$action=$_GET['action'];

$SEC = new CORE_SECURITY();
$SEC->clear_url_nav(); //Limpiamos la URL

$MAIN = new CORE_MAIN();
$MAIN->load();
//Cargamos las funciones de complementos

//Cargamos el idioma
$MAIN->load_lang();
//detectamos compatibilidad html5 en el navegador
$MAIN->get_interface();


//Comprobar si no hay sesion iniciada
$loged = 0;
$visitor = " ";
if(isset($_COOKIE['pass_c'])){
	$SEC->login($_COOKIE['nick_c'],$_COOKIE['pass_c'],2);
}
else{
	session_start();
}
if(isset($_SESSION['loged'])){
	$loged = $_SESSION['loged'];
	$visitor = $_SESSION['nick'];
	include_once 'vdl-include/vdl-core/core_profile.class.php';
	include_once 'vdl-include/vdl-core/core_groups.class.php';
}

if($loged){
	include_once("vdl-themes/".THEME."/index.php");	
}
else{
	if($action == 'register'){
		include_once("vdl-themes/".THEME."/register.php");		
	}
	else{
		include_once("vdl-themes/".THEME."/index.html");
	}
}
?>
