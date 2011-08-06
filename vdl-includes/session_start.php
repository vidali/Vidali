<?php
	include_once 'core_main.class.php';
	$MAIN = new CORE_MAIN();
	$MAIN->load();

//invocamos a la clase login para iniciar la sesion
	include("vdl-core/core_security.class.php");
	$core= new CORE_SECURITY();
	$sucess= $core->login($_POST['user'], $_POST['passwd']);
	if($sucess == true)
		header("Location:../index.php?pg=home");
	else
		header("Location:../index.php?msg=loginf");
	
?>
