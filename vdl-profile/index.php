<?php
//Carga de datos...
	include("vdl-includes/vdl-core/core_user.class.php");		
	$prof = new CORE_USER();
	$author = $prof->get_profile($_SESSION["user_id"],$visitor);
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
	{
		$bday = $data['bday'];
		$age = $data['age'];
	}
	else
	{
		$bday ="";
		$age = "";
	}
	$bio = $data['bio'];
	$photo = $data['img_prof'];
?>

<div class="grid_4">
	<div class="basic_photo">
		<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_big.jpg">'; ?>
	</div> 
		<div class="basic3">
			<div class="pr_titles">
				<h1><?php echo $name.' (@'.$nickname.')';?></h1>
			</div>
			<?php echo '<article id="info-pr">';
				echo $genre.'<br/>';
				echo $age." ". P_AG2 .' (';
				echo $bday.')<br/>';
				echo $location.'<br/>';
				//echo '<img src="' . $grav_url . '" alt="User Gravatar">';
				echo '<a href="mailto:'.$email.'">'.$email.'</a><br/>';
				echo '<a href="http://'.$website.'">'.$website.'</a><br/>';
				echo $bio . '</br>';
		}
		echo '<div class="clear"></div>';
	echo "</article>";
?>
		</div>
	
	<div class="basic_tb">
		<div class="pr_titles">
			Amigos (0)
		</div>
		<br/>
		Sin amigos...
	<?php //	<div id="button">Ver todos</div> ?>
		<br/><br/>
	</div>

	<div class="basic_tb">
		<div class="pr_titles">
			redes (0)
		</div>
		<br/>
		Sin redes...
<?php /*		<img src="vdl-media/vdl-images/prof_def_tb.jpg">
		<div id="button">Ver todos</div>*/?>
	</div> 

</div>

<div class="grid_11 prefix_1"> 
	<div class="basic3">
		<div class="pr_titles">
			Actividad Reciente:
		</div>
		<?php
		include("vdl-includes/vdl-core/updates.class.php");
		$upd_class= new Update("ADMIN");
		$sql = mysql_query ("SELECT * FROM vdl_updates ORDER BY id DESC");
		$last_id = @mysql_num_rows($sql);
		if($last_id > 0){
			$last_upd = $upd_class->get_update($last_id);
			if($last_upd["user_id"] == $_SESSION["user_id"])
			{?>
			<article id="last-upd">
				<section class ="upd_tb grid_1">
					<?php echo '<img src="vdl-media/vdl-images/'. $photo . '_tb.jpg">';?>
				</section>
				<section class="upd-msg grid_9">
					<section class="id_sender">
						<?php echo '@'.$nickname;?>
						<section class="upd-info">
							<?php echo $last_upd["date"];?>
						</section>
					</section>
					<?php echo $last_upd["upd_msg"];?>
				</section>
			</article>
			<?php include ("vdl-profile/vdl-updates/index.php");
		}
		}
		else
			echo '<h2>No has introducido ningun estado en tu perfil</h2>';
		?>
		</div> 
	</div> 
</div> 
<div class="clear"></div>
