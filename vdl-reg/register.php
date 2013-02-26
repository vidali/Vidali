<?php
//Comprobar si no esta instalado y cargar elementos base
include_once '/vdl-include/vdl-core/core_main.class.php';
include_once '/vdl-include/vdl-core/core_security.class.php';

ini_set('mssql.charset', 'UTF-8');
if(!file_exists("../vdl-include/vdl-core/db.ini"))
	header("location: ../install/index.php"); 

$SEC = new CORE_SECURITY();
$SEC->clear_url_nav(); //Limpiamos la URL

$MAIN = new CORE_MAIN();
$MAIN->load();
//Cargamos las funciones de complementos

//Cargamos el idioma
$MAIN->load_lang();
//detectamos compatibilidad html5 en el navegador
$MAIN->get_interface();
include_once("vdl-themes/".THEME."/register.php");	
?>
