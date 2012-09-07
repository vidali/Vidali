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
	private $_id;
	private $_nickname;
	private $_name;
	private $_location;
	private $_sex;
	private $_bday;
	private $_age;
	private $_email;
	private $_site;
	private $_bio;
	private $_img_prof;
	private $_prof_visits;
	private $_prof_friends;
	private $_prof_nets;
	private $_session_id;
		
	/*Public*/

	public function __construct ($_USER){
		parent::__construct();
		$connection = parent::connect();
		$user = htmlspecialchars(trim($_USER));
		$query = sprintf("SELECT
									vdl_user.id,
									vdl_user.nick,
									vdl_user.name,
									vdl_user.location,
									vdl_user.sex,
									vdl_user.age,
									vdl_user.birthdate,
									vdl_user.description,
									vdl_user.email,
									vdl_user.website,
									vdl_user.avatar_id,
									vdl_user.n_views,
									vdl_user.n_groups,
									vdl_user.n_contacts
						FROM vdl_user WHERE vdl_user.nick='%s'", $user);
		$result=mysql_query($query,$connection);
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
			return false;
		}
		while ($row = mysql_fetch_assoc($result)){
			$this->_id = $row["id"];
			$this->_nickname = $row["nick"];
			$this->_name = $row["name"];
			$this->_location = $row["location"];
			$this->_sex = $row["sex"];
			$this->_age = $row["age"];
			$this->_bday = $row["birthdate"];
			$this->_bio = $row["description"];
			$this->_email = $row["email"];
			$this->_site = $row["website"];
			$this->_img_prof = $row["avatar_id"];
			$this->_prof_nets = $row["n_groups"];
			$this->_prof_friends = $row["n_contacts"];
		}
		
		return true;

	}

	public function id(){
		return $this->_id;
	}

	public function nickname(){
		return $this->_nickname;
	}
	
	public function name(){
		return $this->_name;
	}
	
	public function location(){
		return $this->_location;
	}

	public function sex(){
		return $this->_sex;
	}

	public function bday(){
		return $this->_bday;
	}
	
	
	public function age(){
		return $this->_age;
	}
	
	public function email(){
		return $this->_email;
	}
	
	public function site(){
		return $this->_site;
	}
	
	public function bio(){
		return $this->_bio;
	}
	
	public function img_prof(){
		return $this->_img_prof;
	}
	
	public function prof_visits(){
		return $this->_prof_visits;
	}
	
	public function prof_friends(){
		return $this->_prof_friends;
	}
	
	public function prof_nets(){
		return $this->_prof_nets;
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

	public function get_card($_user){
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
			$this->_nickname = $row["nick"];
			$this->_img_prof = $row["avatar_id"];
			$this->_prof_visits = $row["n_views"];
			$this->_prof_friends = $row["n_contacts"];
			$this->_prof_nets = $row["n_groups"];
		}
		return true;
	}
	
	public function add_user($_email,$_nick,$_password,$_name,$_bday,$_sex,$_location,$_bio){
		$connection = parent::connect();
		$_passwd = mysql_real_escape_string(sha1(md5(trim($_password))));
		$query = ("INSERT INTO `vdl_user`(`email`,`nick`,`password`,`name`,`birthdate`,`sex`,`location`,`website`,`description`,
										  `avatar_id`,`n_views`,`n_contacts`,`n_groups`,`session_key`,`session_id`,
										  `privacy_level`,`mail_notify`,`color_theme`)
				   VALUES('$_email','$_nick','$_passwd','$_name','$_bday','$_sex','$_location',' ','$_bio',
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
		$query = sprintf("SELECT status FROM  vdl_friend_of WHERE  user1 ='%s' AND  user2 ='%s'",$_user1,$_user2);
		$result=mysql_query($query,$connection);
		$rescount = mysql_num_rows($result);
		if($rescount == 0){
			$query = sprintf("SELECT status FROM  vdl_friend_of WHERE  user1 ='%s' AND  user2 ='%s'",$_user2,$_user1);
			$result=mysql_query($query,$connection);
			$rescount = mysql_num_rows($result);
			if($rescount == 0)
				$rg = 6;
			else{
				$ra = mysql_fetch_assoc($result);
				$rg = $ra["status"];
			}
		}
		else{
			$ra = mysql_fetch_assoc($result);
			$rg = $ra["status"];
		}
		return $rg;
	}
	
}

?>
