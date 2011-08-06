<?php
include_once 'vdl-core/core_db.class.php';

class CORE_MAIN extends CORE_DB{
	/*Private*/
	private $_conection;
	private function gbversion(){
		$Name="";
		$Version="";
		$browsers = array("firefox", "msie", "opera", "chrome", "safari",
						  "mozilla");
		$Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		foreach($browsers as $browser)
		{
			if (preg_match("#($browser)[/ ]?([0-9.]*)#", $Agent, $match))
			{
				$Name = $match[1] ;
				$Version = $match[2] ;
				break ;
			}
		}
		return $Version;
	}
	
	private function get_user_browser(){
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$ub = '';
		if(preg_match('/MSIE/i',$u_agent)){
			$ub = "ie";
		}
		elseif(preg_match('/Firefox/i',$u_agent)){
			$ub = "firefox";
		}
		elseif(preg_match('/Chrome/i',$u_agent)){
			$ub = "chrome";
		}
		elseif(preg_match('/Safari/i',$u_agent)){
			$ub = "safari";
		}
		elseif(preg_match('/Opera/i',$u_agent)){
			$ub = "opera";
		}
		return $ub;
	}

	/*Public*/
	public function __construct (){
		parent::__construct();
	}

	public function __destruct(){
		parent::close();
		unset($this->_connection);
	}
	
	public function load (){
		$this->_connection = parent::connect();
		$query = "SELECT * FROM vdl_config ORDER BY config_id";
		$result = mysql_query($query,$this->_connection);
		while($row = mysql_fetch_assoc($result)){
			define ($row["config_name"],$row["config_value"]);
		}
		if(!$result)
			return false;
		else
			return true;
	}
	
	public function load_lang(){
		include ("vdl-lang/lang_" . LANG . ".conf.php");
	}
	
	public function get_interface(){
		if(($this->get_user_browser()=="ie" && $this->gbversion() >= "9.0") || ($this->get_user_browser()=="firefox" && $this->gbversion() >= "4.0") ||
		($this->get_user_browser()=="opera" && $this->gbversion() >= "9.80") || ($this->get_user_browser()=="chrome" && $this->gbversion() >= "5.0") ||
		($this->get_user_browser()=="safari" && $this->gbversion() >= "5.0")){
			return "html5";
		}
		else{
			return "html4";
		}
	}
}
?>