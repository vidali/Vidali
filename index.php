<?php

//Comprobar si no esta instalado y cargar elementos base
if(!file_exists("vdl-include/vdl-core/db.ini")){
	header("location: install/index.php"); 
	}
if(!isset($_GET['action']))
	$action=null;
else
	$action=$_GET['action'];
if($action == "logout")
	include_once("vdl-include/log.php");
if(isset($_COOKIE['pass_c'])){
	define("PASS_C",$_COOKIE['pass_c']);
	define("NICK_C",$_COOKIE['nick_c']);	
}

//Cargamos el nucleo de leafwork
include_once 'leaf/run.php';


$temp_var['BASEDIR'] = BASEDIR;
echo lw('tpl')->parse( 'index:basevalues' , $temp_var );
//~ if($loged){
	//~ include_once("./vdl-themes/".THEME."/index.php");	
//~ }
//~ else{
	//~ if($action == 'register'){
		//~ include_once("./vdl-themes/".THEME."/register.php");		
	//~ }
	//~ else{
		//~ include_once("./vdl-themes/".THEME."/index.html");
	//~ }
//~ }
	//lw('html')->init();
?>
