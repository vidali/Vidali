<?php
require_once 'USER.php';


/**
 * class USER_ACTIVE
 * 
 */
class USER_ACTIVE extends USER
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   *
   * @param string __USER 
   * @return void
   * @access public
   */
	public function __construct ($_USER){
		parent::__construct($_USER);

	} // end of member function __construct

	public function get_profile(){
		$result=array();
		$connection = parent::connect();
		$query = "SELECT id,nick,name,age,sex,website,description,avatar_id,email,location from vdl_user WHERE id = '$this->_id'";
		$result= $connection->query($query);
		if (!$result) {
			$message  = 'Invalid query: ' . $connection->error . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		$result = $result->fetch_array();
		$result = json_encode($result);
		echo $result;
	}
	/**
	 * 
	 * 
	 * 
	 * 
	 */
	public function get_home_wall($_user){
		$connection = parent::connect();
		$query = "SELECT id from vdl_user WHERE nick = '$_user'";
		$result= $connection->query($query);
		$id = $result->fetch_assoc();
		$query = "SELECT id, nick, b.avatar_id,email, a.date_published, text
					FROM vdl_msg a
					JOIN vdl_user b ON b.id = id_user
					JOIN vdl_group ON vdl_group.group_name = id_group
					WHERE b.id
					IN ( SELECT a.id
						 FROM vdl_user a
						 INNER JOIN vdl_friend_of b
						 WHERE (a.id = b.user1 OR a.id = b.user2)
						 AND ( b.user1 ='".$id["id"]."' OR b.user2 ='".$id["id"]."')
						 AND ( b.status != 0)
					)
					ORDER BY  a.date_published DESC 
					LIMIT 0 , 30";
		$result = $connection->query($query);
		if (!$result) {
			$message  = 'Invalid query: ' . $connection->error . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		//mostrar resultado
		$arresult=array();
		while ($row = $result->fetch_array()) {
			//array_push($arresult,$row);
			array_push($arresult,$row);
		}
		$arresult = json_encode($arresult);
		return $arresult;
	}

	public function update($_user,$_message,$_s_id){
		$connection = parent::connect();
		date_default_timezone_set('Europe/London');
		$date = date("Y-m-d G:i:s");
		$text = $_message;
//		$text = htmlentities($_message,ENT_QUOTES,"UTF-8");
		$query = ("SELECT id,nick FROM  `vdl_user` WHERE  `session_id` =  '".$_s_id."'");
		$result = $connection->query($query);
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
			return false;
		}
		//CORE_ACTIONS::add_trend($text);
		preg_match_all('/[#]+([A-Za-z0-9-_]+)/',$text,$hash);
		$hashtag = $hash[1];
		foreach($hashtag  as $key => $hash){ 
			//Aqui podemos hacer que lo agrege a la database 
			$find = '#'.$hash;
			$replace = '#'.ucwords(strtolower($hash)); 
			$text = str_replace($find, $replace, $text); 
		}
		$user = $result->fetch_assoc();
		if( $user["nick"] == $_user){
			$user = $user["id"];
		}
		$query = ("INSERT INTO vdl_msg (id_user,id_group,date_published,text) VALUES ('$user','Vidali','$date', '$text')");
		$result = $connection->query($query) or die(mysql_error('Ups, algo falla a la hora de postear...prueba luego.'));	
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
			return false;
		}
		return true;
	}
} // end of USER_ACTIVE
?>
