<?php
///===>If "pg" var is empty, redirect to MAINPG set in config.php, in other case, link to the selected page.
if (!isset($_GET['pg'])){
    include("vdl-home/index.php");
}
else{
	$pg=$_GET['pg'];
///===>Go to Update page.
	if ($pg == 'home')
		include("vdl-home/index.php");
///===>Go to Profile page.
	if ($pg == 'p'){
		include("vdl-profile/index.php");
}
///===>Go to Profile page.
	if ($pg == 'n'){
		include("vdl-net/index.php");
}
///===>Go to inbox.
	if ($pg == 'notes')
		include("vdl-includes/notes.php");
///===>Go to Configuration page.
	if ($pg == 'conf')
		include("vdl-includes/conf.php");
///===>Go to Administration page.
	if ($pg == 'admin')
		include("vdl-admin/index.php");
}
?>
