<?php
/*	Vidali, Social Network Open Source.
This file is part of Vidali.

Vidali is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Vidali is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.*/

	include ("vdl-core/core_main.class.php");
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
		include_once "vdl-core/core_security.class.php";
		$SEC = new CORE_SECURITY();
		$date = date($_POST["birthdate"]);
		$nick = $SEC->clear_text_strict($_POST["nick"]);
		$name = $SEC->clear_text_strict($_POST["name"]);
		$location = $SEC->clear_text_strict($_POST["location"]);
		$bio = $SEC->clear_text_strict($_POST["bio"]);
		$core-> add_user($_POST["email"],$nick,$_POST["password"],$name,$date,$_POST["sex"],$location,$bio);
		header("Location:../index.php?pg=home&wellcome=true");
	}
	else 
	{
		popup('El password no coincide, se le devuelve a la pagina anterior',$_SERVER['HTTP_REFERER']);
	}
?>