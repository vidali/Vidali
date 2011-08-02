<?php
require_once 'core_user.class.php';

class CORE_PROFILE extends CORE_USER{
	//===>Private vars & functions

	//===>Public functions

	//===>Constructor
	public function __construct (){

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
	
	public function delete(){
		
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