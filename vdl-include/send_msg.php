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
	//	$message=htmlspecialchars($_POST['update']);
	
	$send=$_POST['remitte'];
	$text=$_POST['texto'];
	$ID=$_POST['conver'];
	// $send = "test3";
	// $text="por fiiin!";
	// $ID=1;
	
	// echo $send.' '.$text.' - count:'.strlen($send).' - ID:'.$ID;
	
	$checkusers = array();
	$difuser = "";
	$numusers = 0;
	for($i = 0; $i < strlen($send); $i++){
		if ($send[$i] != " "){
			if ($send[$i] != ';'){
				$difuser = $difuser . $send[$i];
			}
			else{
				$checkusers[$numusers] = $difuser;
				$numusers++;
				$difuser = "";
			}
		}
	}
	if ($difuser != ""){
		$checkusers[$numusers] = $difuser;
	}
	
	$c_conver = new CORE_CONVER();
	$c_user = new CORE_USER();
	$c_msg = new CORE_MSG_CONVER();
	$convers = $c_conver->get_convers($ID);
	
	$numusers = 0;
	$idconver;
	// print_r($checkusers);
	foreach ($convers as $conv){
		$cont = 1;
		$notconver = false;
		$numusers = 0;
		while ($conv[$cont] != null){
			$enc = false;
			if ($ID != $conv[$cont]) {
				$userprueba = $c_user->get_nick($conv[$cont]);
				echo $conv[$cont]." - userp: ".$userprueba[0]."// ";
				$comp = 0;
				while (($comp < count($checkusers)) and (!$enc)){
					echo "check: ".$checkusers[$comp]."&& ";
					if ($userprueba[0] == $checkusers[$comp]) {
						$enc = true;
						$numusers++;
						echo "encontrado: ". $userprueba[0]."<BR>";
						break;
					}
					else{
						$comp++;
					}
				}
				if (!$enc) {
					$notconver = true;
					break;
				}
				// $img = $c_user->get_img($conv[$cont]);
				// echo '<img src="'.BASEDIR."/vdl-files/".$img[0].'.jpg" width="60" height="60" >';
				
			}
			// if ($notconver){
				// break;
			// }
			$cont++;
		}
		echo "num users: ".$numusers;
		if (($numusers == count($checkusers)) and (!$notconver)){
			$idconver = $conv[0];
			break;
		}
	}
	
	if (!empty($idconver)){
		$c_msg->set_messages($idconver, $ID, date("Y-m-d H:i:s"), $text);
	}
	else{
		$idusers = array();
		$count = 0;
		print_r($checkusers);
		while ($count < count($checkusers)){
			$idusers[] = "'".$c_user->get_id($checkusers[$count])."'";
			$count++;
		}
		$idusers[] = $ID;
		$count++;
		while ($count < 12){
			array_push($idusers, "NULL");
			$count++;
		}
		print_r($idusers);
		$idconver = $c_conver->get_max_id() + 1;
		$c_conver->set_convers($idconver, $idusers);
		$c_msg->set_messages($idconver, $ID, date("Y-m-d H:i:s"), $text);
	}
	
	header("Location:".$_SERVER['HTTP_REFERER']."m/");
	// //conectar a base de datos
	// $core= new CORE_PROFILE($_POST["nick_s"],$_SESSION["nick"]);
	// //AQUI SE COMPROBARÁ SI EL ESTADO CONTIENE ALGUN @REPLY, #HASTAG, !RED, @>MENSAJE, #> MENSAJE, SE SEPARARÁ LOS LINKS DEL MENSAJE Y
	// // SE PODRÁ FILTRAR 1 LINK, 1 VIDEO Y/O 1 IMAGEN
	// $SEC = new CORE_SECURITY();
	// $message = $SEC->clear_text($_POST['update']);
	// $message =  nl2br ($message);
	// if(strlen($message)==0){
		// header("Location:".$_SERVER['HTTP_REFERER']."?alert=false");
	// }
	// else{
		// $core->update($_SESSION['nick'],$message,session_id());
		// header("Location:".$_SERVER['HTTP_REFERER']."?alert=true");
	// }
?>
