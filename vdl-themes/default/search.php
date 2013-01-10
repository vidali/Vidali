<h1>Ola ke dise</h1>
<?php
	//aqui encajar todo lo visual, y comprueben como se envian las cosas
	$c_user = new CORE_USER();
	$found_users = $c_user->search_users($_GET['p2']);
?>

<div>
	<ul>
		<?php
			foreach ($found_users as $found){
				echo '<li>';
				echo '<img src="'.BASEDIR."/vdl-files/".$found[1].'.jpg" width="60" height="60" >';
				echo $found[0];
				echo '</li>';
			}
		?>
	</ul>
</div>