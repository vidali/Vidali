<?php
	include("../vdl-functions/core_user.class.php");
	include("../vdl-functions/core_security.class.php");
	$message=htmlspecialchars($_POST['update']);
	//conectar a base de datos
	$core1= new CORE_SECURITY();
	$core= new CORE_USER();
	$core1->load_dbconf('../vdl-config/db.ini');
	$core->add_update(USERID,$message);
?>
