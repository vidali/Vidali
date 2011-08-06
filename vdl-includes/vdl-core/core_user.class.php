<?php
class CORE_USER extends CORE_MAIN{
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
	protected function s_password($_value){
		$this->_user_password;
	} 

	protected function s_nickname($_value){
		$this->_user_nickname;
	}
	
	protected function s_location($_value){
		$this->_user_location;
	}
	
	protected function s_age($_value){
		$this->_user_age;
	}
	
	protected function s_email($_value){
		$this->_user_email;
	}
	
	protected function s_site($_value){
		$this->_user_site;
	}

	protected function s_bio($_value){
		$this->_user_bio;
	}
	
	protected function s_img_prof($_value){
		$this->_user_img_prof;
	}

	protected function is_friend($_user1,$_user2){
		$connection = parent::connect();
		$query = sprintf("SELECT vdl_users.id FROM vdl_users WHERE vdl_users.user_id='%s'", $_user1);
		$result=mysql_query($query,$connection);
		$id1 = mysql_fetch_assoc($result);
		$query = sprintf("SELECT vdl_users.id FROM vdl_users WHERE vdl_users.user_id='%s'", $_user2);
		$result=mysql_query($query,$connection);
		$id2 = mysql_fetch_assoc($result);
		$query = sprintf("SELECT rg FROM  `vdl_friends` WHERE  `id_main` ='%s' AND  `id_friend` ='%s'",$user1,$_user2);
		$result=mysql_query($query,$connection);
		$rg = mysql_fetch_assoc($result);
		return $rg;
	}
	//===>Public functions

	//===>Constructor
	public function __construct (){
		parent::__construct();
	}

	//===>Modify user data

	public function set_user(){
		
	}

	public function get_user(){
	
	}
	
}

?>
