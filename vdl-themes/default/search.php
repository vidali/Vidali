<?php
	//aqui encajar todo lo visual, y comprueben como se envian las cosas
	$ID = ID;
	$c_user = new CORE_USER();
	$found_users = $c_user->search_users($_GET['p2']);
?>

<div>
	<ul class="unstyled">
		<?php
			foreach ($found_users as $found){
				$id_user = $c_user->get_id($found[0]);
				if (ID != $id_user){
					echo '<pre><li><form id="agregar_amigo" class="navbar-form" method="post" action="/Vidali/vdl-include/add_friend.php">';
					echo '<img src="'.BASEDIR."/vdl-files/".$found[1].'.jpg" width="60" height="60" >';
					echo $found[0];
					$status = $c_user->check_friends(ID);
					$friend = 6;
					foreach ($status as $stat){
						if (($stat[0] == $id_user) || ($stat[1] == $id_user)){
							$friend = $stat[2];
							break;
						}
					}
					if ($friend == 1)
						echo '     Ya es amigo</pre>';
					elseif ($friend == 0)
						echo '     Esperando confirmación</pre>';
					else
						echo '<button type="submit" class="btn btn-link">+ Agregar como amigo</button><input type="hidden" name="usuario" value="'.$ID.'"/><input type="hidden" name="amigo" value="'.$found[0].'"/></form></li></pre>';
				}
			}
		?>
	</ul>
</div>
