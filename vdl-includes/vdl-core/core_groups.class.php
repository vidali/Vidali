<?php
class CORE_GROUP extends CORE_MAIN{

	public function __construct (){
		parent::__construct();
	}

	public function get_group($_name){
		$connection = parent::connect();
		$query = "SELECT * FROM vdl_updates WHERE vdl_updates.upd_msg LIKE '%".$_name."%'";
		$data=mysql_query($query,$connection);
		$arresult=array();
		while ($row = mysql_fetch_array($data)) {
			array_push($arresult,$row);
		}
		return $arresult;
	}
}

?>
