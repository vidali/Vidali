<?php
	if(isset($_POST["user"]))
	{
	include("vdl-core/core_user.class.php");
	include("vdl-core/core_security.class.php");
	//conectar a base de datos
	$core= new CORE_USER();
	$exist = $core->exist_user($_POST["user"]);	
	echo $exist;
	}
	if(isset($_POST["email"]))
	{
	include("vdl-core/core_user.class.php");
	include("vdl-core/core_security.class.php");
	//conectar a base de datos
	$core= new CORE_USER();
	$exist = $core->exist_email($_POST["email"]);	
	echo $exist;
	}
?> 
