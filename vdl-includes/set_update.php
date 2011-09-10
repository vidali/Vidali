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

include("core_main.class.php");
	include("vdl-core/core_profile.class.php");
	include("vdl-core/core_security.class.php");
	//	$message=htmlspecialchars($_POST['update']);
	//conectar a base de datos
	$core= new CORE_PROFILE();
	//AQUI SE COMPROBARÁ SI EL ESTADO CONTIENE ALGUN @REPLY, #HASTAG, !RED, @>MENSAJE, #> MENSAJE, SE SEPARARÁ LOS LINKS DEL MENSAJE Y
	// SE PODRÁ FILTRAR 1 LINK, 1 VIDEO Y/O 1 IMAGEN
	$SEC = new CORE_SECURITY();
	$message = $SEC->clear_text($_POST['update']);
	$core->update($_GET['sender'],$message,$_POST["session_id"]);
?>