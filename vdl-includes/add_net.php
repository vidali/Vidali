<?php
	include ("core_main.class.php");
	include ("vdl-core/core_network.class.php");
	$core = new CORE_NETWORK();
	$core -> add_net($_POST["net_name"],$_POST["net_sdesc"],$_POST["net_desc"],$_POST["net_admin"]);
?>
