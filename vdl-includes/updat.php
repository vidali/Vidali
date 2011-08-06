<?php
//===> Updates URL controler
	if (!isset($_GET['filter'])) {
		 include("vdl-updates/index.php");
	}
	else{
		include("vdl-updates/".$_GET['filter'].".php");
	}
?>
