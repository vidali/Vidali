<?php
	$user_friends = $c_user->get_friends(ID);
	echo json_encode($user_friends);
?>