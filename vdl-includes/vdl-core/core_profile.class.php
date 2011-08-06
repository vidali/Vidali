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
		///===>Comprobar que es amigo
		$client = htmlspecialchars(trim($_refer));
		$user = htmlspecialchars(trim($_user));
		if (!$client){
			///===>extraer informacion limitada si no lo es
			$query = sprintf("SELECT
										vdl_users.nickname,
										vdl_users.genre,
										vdl_users.bio,
										vdl_users.website,
										vdl_users.prof_nets
										FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
			$result=mysql_query($query,$connection);
		}
		else{
			///===>extraer informacion completa si es amigo
			$query = sprintf("SELECT
										vdl_users.nickname,
										vdl_users.name,
										vdl_users.location,
										vdl_users.genre,
										vdl_users.bday,
										vdl_users.bio,
										vdl_users.email,
										vdl_users.website,
										vdl_users.img_prof,
										vdl_users.prof_nets
										FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
			$result=mysql_query($query,$connection);
		}
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
	
		///===>mostrar resultado
		$a_result = array();
		while ($row = mysql_fetch_assoc($result)){
			array_push($a_result,$row);
		}
	
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
	
		return $a_result;
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