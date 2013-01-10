<?php
	//AQUI lo de llamar al core y too el jaleo
	//por ultimo llamar al header index.php y eso (con ?action=search
	//$c_user = new CORE_USER();
	//$found_users = $c_user->search_users($_POST['search']);
	header("Location: /Vidali/search/".$_POST['search']."/");
?>
