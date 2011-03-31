<?php
//Carga de datos...
	include("vdl-core/core_user.class.php");
	$prof = new CORE_USER();
	$author = $prof->get_profile("demo",$visitor);
	foreach ($author as $data){
		if (isset($data['email']))
			$email = $data['email'];
		else
			$email ="";
	$nickname = $data["nickname"];
//	$size = 200;
//	$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($email) )."&size=".$size;
	$website = $data['website'];
	if (isset($data['name']))
		$name = $data['name'];
	else
		$name ="";
	if (isset($data['location']))
		$location = $data['location'];
	else
		$location ="";
	$genre = $data['genre'];
	if (isset($data['bday']))
		$bday = $data['bday'];
	else
		$bday ="";
	$bio = $data['bio'];
?>

<div class="grid_4">
	<div class="basic_photo">
		<img src="vdl-media/vdl-images/prof_def_big.jpg">
	</div> 
		<div class="basic3">
			<div class="pr_titles">
				<h1><?php echo $name.'(@'.$nickname.')';?></h1>
			</div>
			<?php echo '<article id="info-pr">';
				echo $genre.'<br/>';
				echo ' 21 '. P_AG2 .' (';
				echo $bday.')<br/>';
				echo $location.'<br/>';
				//echo '<img src="' . $grav_url . '" alt="User Gravatar">';
				echo '<a href="mailto:'.$email.'">'.$email.'</a><br/>';
				echo '<a href="http://'.$website.'">'.$website.'</a><br/>';
				echo $bio .'<br/>...Ver perfil completo.';
		}
		echo '<div class="clear"></div>';
	echo "</article>";
?>
		</div>
	
	<div class="basic_tb">
		<div class="pr_titles">
			Amigos:
		</div>
		<br/>
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<br/><br/>
	</div>

	<div class="basic_tb">
		<div class="pr_titles">
			redes:
		</div>
		<br/>
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<h4>Ver todos (100)</h4>
	</div> 

</div>

<div class="grid_11 prefix_1"> 
	<div class="basic3">
		<div class="pr_titles">
			Actividad Reciente:
		</div>
		<?php
		include("vdl-core/updates.class.php");
		$upd_class= new Update(ADMIN);
		$sql = mysql_query ("SELECT * FROM vdl_updates ORDER BY id DESC");
		$last_id = mysql_num_rows ($sql);
		$last_upd = $upd_class->get_update($last_id);
		echo '<article id="last-upd">';
				echo '<section class="upd-msg">'.$last_upd["upd_msg"].'</section><section class="upd-info">'.$last_upd["date"]."</section>";
		echo '</article>';
		include ("vdl-profile/vdl-updates/index.php");
		/*echo '<section id="up-info">';
					echo '<form action="vdl-includes/set_update.php" method="post">
							<input id ="update" name="update" type="text" size="90" placeholder="'.U_ASK.'" >
							<input type="submit" value="Actualiza!">
						</form>';
		echo "</section>";*/
?>
		</div> 
	</div> 
</div> 
<div class="clear"></div>
