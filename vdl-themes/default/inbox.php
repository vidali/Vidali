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

echo "Hola que tal?" . '<br>';
foreach ($convers as $conv){
	echo "Conver: " . $conv[0] . '<br>';
	$cont = 1;
	while ($conv[$cont] != null){
		$userprueba = $c_user->get_nick($conv[$cont]);
		echo $userprueba[0] . '<br>';
		$cont++;
	}
	$messages = $c_msg->get_messages($conv[0]);
	foreach ($messages as $mess){
		$usermsg = $c_user->get_nick($mess[1]);
		echo $usermsg[0].": ".$mess[3].'<br>'.$mess[2].'<br>';
	}
}

?>