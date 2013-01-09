<?php
	//AQUI lo de llamar al core y too el jaleo
	//por ultimo llamar al header index.php y eso (con ?action=search
	session_start();
	include("vdl-core/core_main.class.php");
	include("vdl-core/core_user.class.php");
	$c_user = new CORE_USER();
	$found_users = $c_user->search_users("tes");
	for ($i = 0; $i < count($found_users); $i++){
		print_r($found_users[$i]);
	}
	header("Location: /Vidali/search/tes");
?>
