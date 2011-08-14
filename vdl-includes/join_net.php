<?php
	include ("core_main.class.php");
	include ("vdl-core/core_network.class.php");
	$core = new CORE_NETWORK();
	$core -> join_net($_GET["net"],$_GET["user"]);
?>
