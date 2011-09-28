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

//Cargamos las funciones basicas
if(!file_exists("vdl-includes/vdl-core/db.ini"))
	header("location: install/index.php"); 

include_once 'vdl-includes/core_main.class.php';
include_once 'vdl-includes/vdl-core/core_profile.class.php';
include_once 'vdl-includes/vdl-core/core_network.class.php';
include_once 'vdl-includes/vdl-core/core_security.class.php';
$MAIN = new CORE_MAIN();
$MAIN->load();
//Cargamos las funciones de complementos
//Proximamente...
//Cargamos el idioma
$MAIN->load_lang();
//detectamos compatibilidad html5 en el navegador
$MAIN->get_interface();
//comprobamos estado de la sesion
///===>Start session var and check if we are loged, in other case,we block private info.
session_start();
$loged = 0;
$visitor = " ";
if(isset($_SESSION['loged'])){
	$loged = $_SESSION['loged'];
	$visitor = $_SESSION['nickname'];
}
//Llamamos a core_security para realizar rutinas de seguridad.
$SEC = new CORE_SECURITY();
$SEC->clear_url_nav(); //Limpiamos la URL

//Cargamos página correspondiente
if ($loged == 0)
	include("vdl-themes/".THEME."/login.php");
else
//Cargamos el tema
include_once("vdl-themes/".THEME."/index.php");
?>
