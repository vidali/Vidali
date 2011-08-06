<?php
	include ("../vdl-includes/vdl-core/core_security.class.php");
	echo $_POST["name"];
	$core = new CORE_SECURITY();
	$core->load_dbconf();
	$connection= $core->bd_connect();

	$pass1 = mysql_real_escape_string(sha1(md5(trim($_POST["pass1"]))));
	if (mysql_real_escape_string(sha1(md5(trim($_POST["pass1"])))) == mysql_real_escape_string(sha1(md5(trim($_POST["pass2"])))))
		$password = $pass1;
	else
		echo "contraseña mal escrita";
		
	$date = date($_POST["birthdate"]);
	$core-> add_user($_POST["nick"],$password,$_POST["nick"],$_POST["name"],$_POST["location"],$_POST["sex"],$date,$_POST["email"],$_POST["bio"]);
		header("Location:../index.php?pg=home&wellcome=true");

?>
