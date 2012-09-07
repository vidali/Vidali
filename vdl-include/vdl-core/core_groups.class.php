<?php
class CORE_GROUP extends CORE_MAIN{

	public function __construct (){
		parent::__construct();
	}

	public function get_group($_name){
		$connection = parent::connect();
		$query = "SELECT id, nick, b.avatar_id,email,date_published,text
						  FROM vdl_publish a
						  JOIN vdl_user b ON b.id = id_user
						  JOIN vdl_group ON vdl_group.group_name = id_group
						  JOIN vdl_msg ON vdl_msg.id_msg = a.id_msg
						  WHERE vdl_msg.text  REGEXP  '(.)*".$_name."([:space:](.))*'
						  LIMIT 0 , 30";
		$data=mysql_query($query,$connection);
		$arresult=array();
		while ($row = mysql_fetch_array($data)) {
			array_push($arresult,$row);
		}
		return $arresult;
	}
	
	public function get_trends(){
		$connection = parent::connect();
		$query = "SELECT * 
					FROM  `vdl_trending` 
					ORDER BY  `vdl_trending`.`count` DESC 
					LIMIT 0 , 15";
		$data=mysql_query($query,$connection);
		$arresult=array();
		while ($row = mysql_fetch_array($data)) {
			array_push($arresult,$row);
		}
		return $arresult;
	}

	public function get_groups(){
		$connection = parent::connect();
		$query = "SELECT * 
					FROM  `vdl_group` 
					ORDER BY  `vdl_group`.`n_members` DESC 
					LIMIT 0 , 10";
		$data=mysql_query($query,$connection);
		$arresult=array();
		while ($row = mysql_fetch_array($data)) {
			array_push($arresult,$row);
		}
		return $arresult;
	}

}

?>
