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
	private $_user_prof_visits;
	private $_user_prof_friends;
	private $_user_prof_nets;
	private $_user_session_id;
	
	//===>Protected
	protected function s_password($_value){
		$this->_user_password = $_value;
	} 

	protected function s_nickname($_value){
		$this->_user_nickname = $_value;
	}
	
	protected function s_name($_value){
		$this->_user_name = $_value;
	}
	
	protected function s_location($_value){
		$this->_user_location = $_value;
	}
	
	protected function s_sex($_value){
		$this->_user_sex = $_value;
	}
	protected function s_bday($_value){
		$this->_user_bday = $_value;
	}
	
	protected function s_age($_value){
		$this->_user_age = $_value;
	}
	
	protected function s_email($_value){
		$this->_user_email = $_value;
	}
	
	protected function s_site($_value){
		$this->_user_site = $_value;
	}

	protected function s_bio($_value){
		$this->_user_bio = $_value;
	}
	
	protected function s_img_prof($_value){
		$this->_user_img_prof = $_value;
	}

	protected function s_prof_visits($_value){
		$this->_user_prof_visits = $_value;
	}
	
	protected function s_prof_friends($_value){
		$this->_user_prof_friends = $_value;
	}
	
	protected function s_prof_nets($_value){
		$this->_user_prof_nets = $_value;
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

	public function nickname(){
		return $this->_user_nickname;
	}
	
	public function name(){
		return $this->_user_name;
	}
	
	public function location(){
		return $this->_user_location;
	}

	public function sex(){
		return $this->_user_sex;
	}

	public function bday(){
		return $this->_user_bday;
	}
	
	
	public function age(){
		return $this->_user_age;
	}
	
	public function email(){
		return $this->_user_email;
	}
	
	public function site(){
		return $this->_user_site;
	}
	
	public function bio(){
		return $this->_user_bio;
	}
	
	public function img_prof(){
		return $this->_user_img_prof;
	}
	
	public function prof_visits(){
		return $this->_user_prof_visits;
	}
	
	public function prof_friends(){
		return $this->_user_prof_friends;
	}
	
	public function prof_nets(){
		return $this->_user_prof_nets;
	}
	
	//===>Modify user data

	public function set_user(){
		
	}

	public function get_home($_user){
		$connection = parent::connect();
		$user = htmlspecialchars(trim($_user));
		$query = sprintf("SELECT
							vdl_users.nickname,
							vdl_users.img_prof,
							vdl_users.prof_visits,
							vdl_users.prof_friends,
							vdl_users.prof_nets
		FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
		$result=mysql_query($query,$connection);
		$a_result = array();
		while ($row = mysql_fetch_assoc($result)){
			array_push($a_result,$row);
		}
		return $a_result;
	}
	
	public function get_user($_user1,$_refer){
		$connection = parent::connect();
			///===>Comprobar que es amigo
		$client = htmlspecialchars(trim($_refer));
		$user = htmlspecialchars(trim($_user1));
// 		if (!$client){
			//===>extraer informacion limitada si no lo es
// 			$query = sprintf("SELECT
// 										vdl_users.nickname,
// 										vdl_users.genre,
// 										vdl_users.bio,
// 										vdl_users.website,
// 										vdl_users.prof_nets
// 										FROM vdl_users WHERE vdl_users.user_id='%s'", $user);
// 			$result=mysql_query($query,$connection);
// 		}
// 		else{
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
// 		}
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		while ($row = mysql_fetch_assoc($result)){
			$this->s_nickname($row["nickname"]);
			$this->s_name($row["name"]);
			$this->s_location($row["location"]);
			$this->s_sex($row["genre"]);
			$this->s_bday($row["bday"]);
			$this->s_bio($row["bio"]);
			$this->s_email($row["email"]);
			$this->s_site($row["website"]);
			$this->s_img_prof($row["img_prof"]);
			$this->s_prof_nets($row["prof_nets"]);
		}
		
		return true;
	}
	
	public function add_user($_user_id,$_passwd,$_nickname,$_name,$_location,$_genre,$_bday,$_email,$_bio){
		$connection= $this->bd_connect();
		$query = ("INSERT INTO vdl_users (user_id,passwd,nickname,name,location,genre,bday,email,bio,img_prof) VALUES
					 ('$_user_id','$_passwd','$_nickname','$_name','$_location','$_genre','$_bday','$_email','$_bio','prof_def')");
		$result = mysql_query($query,$connection);
		if (!$result) {
// 			$message  = 'Invalid query: ' . mysql_error() . "\n";
// 			$message = 'Whole query: ' . $query;
// 			die($message);
			return false;
		}
		else
			return true;
	}
}

?>
