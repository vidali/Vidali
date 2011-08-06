<?php
//===> Media URL controler
if (!isset($_GET['media'])) {
    include("vdl-media/index.php");
}
else{
	include("vdl-media/".$_GET['media'].".php");
}
?>
