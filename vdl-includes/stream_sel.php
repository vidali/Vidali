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

if(!isset($_SESSION["net_active"]))
		$stream = "all";
	else
		$stream = $_SESSION["net_active"];
	//echo "Red actual: $stream";
	//1º Obtener listado de redes
	$event = new CORE_PROFILE();
	$streams = $event->get_networks($_SESSION["user_id"]);
	//2º Obtener listado de grupos segun red
	//3º Realizar cambios según formulario
?>
<form action="vdl-includes/change_stream.php" method="POST">
	<SELECT name="network">
		<OPTION VALUE="all">Todo</OPTION>
		<?php 
		foreach ($streams as $net){		
			echo '<OPTION VALUE="'.$net["net_name"].'">'.$net["net_name"].'</OPTION>';
		}
		?>
	</SELECT>
	<SELECT name="Group" <?php if($stream=="all") echo 'disabled="disabled"';?> >
		<OPTION VALUE="all">Todo</OPTION>
		<OPTION VALUE="estudiante">Estudiante</OPTION>
		<OPTION VALUE="ingeniero">Ingeniero</OPTION>
		<OPTION VALUE="jubilado">Jubilado</OPTION>
		<OPTION VALUE="otro">Otro</OPTION>
	</SELECT>
	<INPUT type="submit" value="Cambiar">
</form>