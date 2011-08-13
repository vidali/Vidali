<?php 
include("core_main.class.php");
include("vdl-core/core_profile.class.php");
if($_GET["action"] == "delete"){
	$core= new CORE_PROFILE();
	$core->manage_friend($_req, $_main, $_candidate, $_range);
}
if($_GET["action"] == "add"){
	
}
if($_GET["action"] == "block"){
	echo "¿Realmente deseas bloquear a este usuario?";
}
?>