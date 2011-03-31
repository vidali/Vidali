<?php
	include("../vdl-functions/notes.class.php");
	$note_class= new Notes();
	$message=htmlspecialchars($_POST['post']);
	date_default_timezone_set('Europe/London');
	$date = date("Y-m-d G:i:s");
	$notes = $note_class->set_note($_POST["title"],$_POST["resume"],$message,$_POST["user"],$date,$_POST["categs"],$_POST['add_cat'],$_POST["add_cat_ok"]);

?>
