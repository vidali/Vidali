<?php
require_once 'core_user.class.php';

class CORE_PROFILE extends CORE_USER{
	//===>Private vars & functions

	//===>Public functions

	//===>Constructor
	public function __construct (){
		parent::__construct();
	}

	//===>Modify user data


	public function create($_user_id,$_passwd,$_nickname,$_name,$_location,$_genre,$_bday,$_email,$_bio){
		$query = ("INSERT INTO vdl_users (user_id,passwd,nickname,name,location,genre,bday,email,bio,img_prof) VALUES
					 ('$_user_id','$_passwd','$_nickname','$_name','$_location','$_genre','$_bday','$_email','$_bio','prof_def')");
		$result = mysql_query($query,$connection);
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message = 'Whole query: ' . $query;
			die($message);
		}
	}
	
	public function get_profile($_user,$_refer){
		$connection = parent::connect();
		
		$a_result1 = parent::get_user($_user, $_refer);
		
		
		//necesitamos la idnet del user
		$query = sprintf("SELECT vdl_users.id FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
		$result=mysql_query($query,$connection);
		$id = mysql_fetch_assoc($result);
		
		//falta primero coger las redes de vdl_users_net y luego buscarlas en vdl_nets, pero eso se lo dejo al cristo del
		//futuro...chocala!!
		$a_result2 = array();
		$query = ("SELECT id,net_name,net_sdesc,net_desc,net_img FROM vdl_net WHERE vdl_net.id='$_idnet'");
		$result = mysql_query($query,$connection);
		while ($row = mysql_fetch_assoc($result)){
			array_push($a_result2,$row);
		}
		
		// 		$a_result3 = array();
		// 		$query = ("SELECT id,net_name,net_sdesc,net_desc,net_img FROM vdl_net WHERE vdl_net.id='$_idnet'");
		// 		$result = mysql_query($query,$connection);
		// 		while ($row = mysql_fetch_assoc($result)){
		// 			array_push($a_result2,$row);
		// 		}
		
		///===>mostrar resultado

		//Calculamos la edad y la fecha del cumpleaños siguiente
		if ($client){
			if(substr($a_result[0]['bday'], 5, 2) > date("n")){
				$a_result[0]['age']= date("Y")-substr($a_result[0]['bday'], 0, 4)-1;
				$a_result[0]['bday'] = substr($a_result[0]['bday'], 8, 2).'/'.substr($a_result[0]['bday'], 5, 2).'/'.(substr($a_result[0]['bday'], 0, 4)+$a_result[0]['age']+1);
			}else{
				if(date("n")==substr($a_result[0]['bday'], 5, 2) AND substr($a_result[0]['bday'], 8, 2)>date("j")){
					$a_result[0]['age']= date("Y")-substr($a_result[0]['bday'], 0, 4)-1;
					$a_result[0]['bday'] = substr($a_result[0]['bday'], 8, 2).'/'.substr($a_result[0]['bday'], 5, 2).'/'.(substr($a_result[0]['bday'], 0, 4)+$a_result[0]['age']+1);
				}else{
					$a_result[0]['age']= date("Y")-substr($a_result[0]['bday'], 0, 4);
					$a_result[0]['bday'] = substr($a_result[0]['bday'], 8, 2).'/'.substr($a_result[0]['bday'], 5, 2).'/'.(substr($a_result[0]['bday'], 0, 4)+$a_result[0]['age']+1);
				}
			}
		}
		
		$result = array();
		array_push($result,a_result1);
		array_push($result,a_result2);
		return $result;
	}
	
	public function delete(){
		
	}

	public function login($_user,$_password){
		return parent::__construct($_user, $_password);
	}
	
	
	public function modify(){
	
	}
	
	public function set_privacy(){
	
	}
	
	public function update(){
	
	}
	
	public function join_network(){
	
	}
	
	public function add_friend(){
	
	}
	
	public function delete_friend(){
	
	}
	
	public function add_note(){
	
	}
	
	public function add_file(){
	
	}
	
}

?>