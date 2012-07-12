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

class CORE_USER extends CORE_MAIN{
	/*Private*/
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
	
	/*Protected*/
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
	
	/*Public*/
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
	
	public function set_user(){
		
	}
	
	public function exist_user($user){
		$connection = parent::connect();
//		$user = htmlspecialchars($user);
		$query = sprintf("SELECT * FROM vdl_user WHERE vdl_user.nick='%s'", $user);
		$result=mysql_query($query,$connection);
		$exist = mysql_num_rows($result);
		if($exist == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function exist_email($email){
		$connection = parent::connect();
		$email = htmlspecialchars($email);
		$query = sprintf("SELECT * FROM vdl_user WHERE vdl_user.email='%s'", $email);
		$result=mysql_query($query,$connection);
		$exist = mysql_num_rows($result);
		if($exist == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function get_home($_user){
		$connection = parent::connect();
		$user = htmlspecialchars(trim($_user));
		$query = sprintf("SELECT
							vdl_user.nick,
							vdl_user.avatar_id,
							vdl_user.n_views,
							vdl_user.n_contacts,
							vdl_user.n_groups
		FROM vdl_user WHERE vdl_user.nick='%s'", $user);
		$result=mysql_query($query,$connection);
		while ($row = mysql_fetch_assoc($result)){
			$this->s_nickname($row["nick"]);
			$this->s_img_prof($row["avatar_id"]);
			$this->s_prof_visits($row["n_views"]);
			$this->s_prof_friends($row["n_contacts"]);
			$this->s_prof_nets($row["n_groups"]);
		}
		return true;
	}
	
	public function get_user($_user1,$_refer){
		$connection = parent::connect();
		$client = htmlspecialchars(trim($_refer));
		$user = htmlspecialchars(trim($_user1));
		$query = sprintf("SELECT
									vdl_user.nick,
									vdl_user.name,
									vdl_user.location,
									vdl_user.sex,
									vdl_user.birthdate,
									vdl_user.description,
									vdl_user.email,
									vdl_user.website,
									vdl_user.avatar_id,
									vdl_user.n_groups,
									vdl_user.n_contacts
						FROM vdl_user WHERE vdl_user.nick='%s'", $user);
		$result=mysql_query($query,$connection);
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		while ($row = mysql_fetch_assoc($result)){
			$this->s_nickname($row["nick"]);
			$this->s_name($row["name"]);
			$this->s_location($row["location"]);
			$this->s_sex($row["sex"]);
			$this->s_bday($row["birthdate"]);
			$this->s_bio($row["description"]);
			$this->s_email($row["email"]);
			$this->s_site($row["website"]);
			$this->s_img_prof($row["avatar_id"]);
			$this->s_prof_nets($row["n_groups"]);
			$this->s_prof_friends($row["n_contacts"]);
		}
		
		return true;
	}
	
	public function add_user($_email,$_nick,$_password,$_name,$_bday,$_sex,$_location,$_bio){
		$connection = parent::connect();
		$_passwd = mysql_real_escape_string(sha1(md5(trim($_password))));
		$query = ("INSERT INTO `vdl_user`(`email`,`nick`,`password`,`name`,`birthdate`,`sex`,`location`,`website`,`description`,
										  `avatar_id`,`n_views`,`n_contacts`,`n_groups`,`session_key`,`session_id`,
										  `privacy_level`,`mail_notify`,`color_theme`)
				   VALUES('$_email','$_nick','$_password','$_name','$_bday','$_sex','$_location',' ','$_bio',
						  'prof_def','0','0','0','0','0',
						  'low', UNHEX(  '0' ) ,'white')");
		$result = mysql_query($query,$connection);
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message = $message . ' Whole query: ' . $query;
			die($message);
			return false;
		}
		else
			$id = mysql_insert_id($connection);			
			$query = ("UPDATE `vdl_user` set `age` = (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(birthdate,5))");
			$result = mysql_query($query,$connection);
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message = $message . ' Whole query: ' . $query;
				die($message);
				return false;
			}
			return true;
	}
	
	public function is_friend($_user1,$_user2){
		$connection = parent::connect();
		$rg = 6;
		$query = sprintf("SELECT rg FROM  vdl_friends WHERE  id_main ='%s' AND  id_friend ='%s'",$_user1,$_user2);
		$result=mysql_query($query,$connection);
		$rescount = mysql_num_rows($result);
		if($rescount == 0){
			$query = sprintf("SELECT rg FROM  vdl_friends WHERE  id_main ='%s' AND  id_friend ='%s'",$_user2,$_user1);
			$result=mysql_query($query,$connection);
			$rescount = mysql_num_rows($result);
			if($rescount == 0)
				$rg = 6;
			else{
				$ra = mysql_fetch_assoc($result);
				$rg = $ra["rg"];
			}
		}
		else{
			$ra = mysql_fetch_assoc($result);
			$rg = $ra["rg"];
		}
		return $rg;
	}
	
}

?>
