<?php
class CORE_USER{
	//===>Private vars & functions
	private $_user_user_id;
	private $_user_password;
	private $_user_nickname;
	private $_user_name;
	private $_user_location;
	private $_user_sex;
	private $_user_bday;
	private $_user_age;
	private $_user_email;
	private $_user_site;
	private $_user_bio;
	private $_user_img_prof;

	//===>Protected
	protected function s_password(){
		
	} 

	protected function s_nickname(){
	
	}
	
	protected function s_name(){
	
	}
	
	protected function s_location(){
	
	}
	
	protected function s_sex(){
	
	}
	
	protected function s_birthday(){
	
	}
	
	protected function s_age(){
	
	}
	
	protected function s_email(){
	
	}
	
	protected function s_site(){
	
	}

	protected function s_bio(){
	
	}
	
	protected function s_img_prof(){
	
	}
	
	//===>Public functions

	//===>Constructor
	public function __construct (){
		//Buscamos el usuario y seleccionamos la informacion basica de este...
		$query = sprintf("SELECT
								vdl_users.id,
								vdl_users.user_id,
								vdl_users.nickname,
								vdl_users.name,
								vdl_users.email
								FROM vdl_users WHERE vdl_users.user_id='%s' && vdl_users.passwd = '%s'", $usr,$pwd);
		$result=mysql_query($query,$connection);
		/*DEPURACION
		 if (!$result) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
		}*/
		if(mysql_num_rows($result)){
			// nos devuelve 1 si encontro el usuario y el password
			$array=mysql_fetch_array($result);
			//generamos id de la sesion
			$s_id = session_id();
			$query = sprintf("UPDATE  `vidali`.`vdl_users` SET  `session_id` =  '%s' WHERE  `vdl_users`.`id` =%s;",$s_id,$array["id"]);
			$result=mysql_query($query,$connection);
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
			}
		}
	}

	//===>Modify user data

	public function set(){
		
	}

	public function get(){
	
	}
	
}

?>
