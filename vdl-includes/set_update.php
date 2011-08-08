<?php
	include("core_main.class.php");
	include("vdl-core/core_profile.class.php");
	$message=htmlspecialchars($_POST['update']);
	//conectar a base de datos
	$core= new CORE_PROFILE();
	$core->update($_GET['sender'],$message,$_POST["session_id"]);
?>