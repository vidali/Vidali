<?php
	//aqui encajar todo lo visual, y comprueben como se envian las cosas
	$ID = ID;
	$c_user = new CORE_USER();
	$found_users = $c_user->search_users($_GET['p2']);
?>

<div>
	<ul>
		<?php
			foreach ($found_users as $found){
				echo '<li><form id="agregar_amigo" class="navbar-form" method="post" action="/Vidali/vdl-include/add_friend.php">';
				echo '<img src="'.BASEDIR."/vdl-files/".$found[1].'.jpg" width="60" height="60" >';
				echo $found[0];
				echo '<button type="submit" class="btn btn-link">+ Agregar como amigo</button><input type="hidden" name="usuario" value="'.$ID.'"/><input type="hidden" name="amigo" value="'.$found[0].'"/></form></li>';
			}
		?>
	</ul>
</div>
