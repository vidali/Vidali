	ola k ase
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
session_start();
	include("vdl-core/core_main.class.php");
	include("vdl-core/core_conver.class.php");
	include("vdl-core/core_user.class.php");
	include("vdl-core/core_msg_conver.class.php");
	
	$IDC=$_POST['conversacion'];
	$IDU=$_POST['usuario'];
	
	$c_msg = new CORE_MSG_CONVER();
	$c_msg->set_conver_hide($IDC,$IDU);
	
	header("Location:".$_SERVER['HTTP_REFERER']);
	
?>
