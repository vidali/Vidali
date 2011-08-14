<?php
	include ("core_main.class.php");
	include ("vdl-core/core_user.class.php");
	$core = new CORE_USER();

	function popup($vMsg,$vDestination) {
	echo("<html>\n");
	echo("<head>\n");
	echo("<title>System Message</title>\n");
	echo("<meta http-equiv=\"Content-Type\" content=\"text/html;
	charset=iso-8859-1\">\n");

	echo("<script language=\"JavaScript\" type=\"text/JavaScript\">\n");
	echo("alert('$vMsg');\n");
	echo("window.location = ('$vDestination');\n");
	echo("</script>\n");
	echo("</head>\n");
	echo("<body>\n");
	echo("</body>\n");
	echo("</html>\n");
	exit;
	}
	
	if($_POST["pass1"]==$_POST["pass2"])
	{
		$date = date($_POST["birthdate"]);
		$core-> add_user($_POST["nick"],$_POST["pass1"],$_POST["nick"],$_POST["name"],$_POST["location"],$_POST["sex"],$date,$_POST["email"],$_POST["bio"]);
		header("Location:../index.php?pg=home&wellcome=true");
	}
	else 
	{
		popup('El password no coincide, se le devuelve a la pagina anterior',$_SERVER['HTTP_REFERER']);
	}
?>
