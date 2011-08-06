<?php
	include("../vdl-functions/notes.class.php");
	include("../vdl-functions/core_security.class.php");
	$core= new CORE_SECURITY();
	$core->load_dbconf('../vdl-config/db.ini');
	$_SESSION['form']=$_POST; 
	if(isset($_POST['user'])){
		$name = $core->clear_text($_POST['user']);
		if($core->email_val($_POST['email']) == 1){
			$email = $_POST['email'];
			if(isset($_POST['comment'])){
				$comment = $core->clear_text($_POST['comment']);
				$adress = $_POST["adress"];
				$id_post = $_POST['postid'];
				date_default_timezone_set('Europe/London');
				$date = date("Y-m-d G:i:s");
				$com_class= new Notes();
				$comments = $com_class->set_comment($name,$email,$adress,$comment,$id_post);
				echo '<script language=javascript>top.location.href = "'. $_SERVER['HTTP_REFERER'].'&send=true"</script>';				
			}
			else
				echo '<script language=javascript>top.location.href = "'. $_SERVER['HTTP_REFERER'].'&er=12"</script>';				
		}
		else
			echo '<script language=javascript>top.location.href = "'. $_SERVER['HTTP_REFERER'].'&er=11"</script>';				
	}
	else
		echo '<script language=javascript>top.location.href = "'. $_SERVER['HTTP_REFERER'].'&er=10"</script>';				
?>
