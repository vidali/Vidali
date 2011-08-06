<?php
//===> Profile URL controler
if (!isset($_GET['prof'])) {
    include("vdl-profile/index.php");
}
else{
	include("vdl-profile/".$_GET['prof'].".php");
}
?>
