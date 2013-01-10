<?php
	$c_user = new CORE_USER();
	$found_users = $c_user->search_users($_GET['p2']);
	//header("Location:".$_SERVER['HTTP_REFERER']."search/");
?>
