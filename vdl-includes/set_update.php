<?php
	include("vdl-core/core_user.class.php");
	include("vdl-core/core_security.class.php");
	$message=htmlspecialchars($_POST['update']);
	//conectar a base de datos
	$core= new CORE_USER();
	$core->add_update($_GET['sender'],$message);
?>
