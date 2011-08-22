<?php 
include("core_main.class.php");
include("vdl-core/core_profile.class.php");
$contact = new CORE_PROFILE();
if($_GET["action"] == "delete"){
	$delete=$contact->manage_friend("delete", $_POST["id_main"], $_POST["id_friend"],'6');
	if($delete)
		header("location: ../index.php?alert=dftrue");
}
if($_GET["action"] == "add"){
	$add=$contact->manage_friend("add", $_POST["id_main"], $_POST["id_friend"],'5');
	if($add)
	header("location: ../index.php?alert=aftrue");
	
}
if($_GET["action"] == "block"){
	$contact->manage_friend("block", $_POST["id_main"], $_POST["id_user"],'7');
}
?>