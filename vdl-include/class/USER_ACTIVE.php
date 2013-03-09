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

	public function get_basic_data(){
		$result = [ "n_friends" => $this->_prof_friends,
					"n_groups" => $this->_prof_groups,
					"n_views" => $this->_prof_visits,
				  ];
		return $result;
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
} // end of USER_ACTIVE
?>
