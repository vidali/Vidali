<?php
//invocamos a la clase login para iniciar la sesion
	include("vdl-core/core_security.class.php");
	$core= new CORE_SECURITY();
	$core->login($_POST['user'],$_POST['passwd']);
?>
