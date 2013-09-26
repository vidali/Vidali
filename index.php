<?php

//Comprobar si no esta instalado y cargar elementos base
if(!file_exists("vdl-include/class/db.ini")){
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
require 'vendor/autoload.php';
include_once 'leaf/run.php';
?>
