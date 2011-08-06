<?php
//===> Notes URL controler
if (!isset($_GET['notes'])) {
    include("vdl-profile/vdl-notes/index.php");
}
else{
	include("vdl-profile/vdl-notes/".$_GET['notes'].".php");
}
?>
