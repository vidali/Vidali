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

include("vdl-core/core_main.class.php");
include("vdl-core/core_profile.class.php");
$contact = new CORE_PROFILE();
if($_GET["action"] == "acept"){
	echo $_POST["id_sender"].'\n';
	$delete=$contact->manage_friend("acept", $_POST["id_main"], $_POST["id_sender"],$_POST["id_not"]);
	if($delete)
		header("location: ../index.php?alert=dftrue");
}
if($_GET["action"] == "delete"){
	$delete=$contact->manage_friend("delete", $_POST["id_main"], $_POST["id_friend"],'6');
	if($delete)
		header("location: ../index.php?alert=dftrue");
}
if($_GET["action"] == "add"){
	$add=$contact->manage_friend("add", $_POST["id_main"], $_POST["id_friend"],'5');
	if($add)
	header("location: ../index.php?alert=aftrue");
	
}
if($_GET["action"] == "block"){
	$contact->manage_friend("block", $_POST["id_main"], $_POST["id_user"],'7');
}
?>
