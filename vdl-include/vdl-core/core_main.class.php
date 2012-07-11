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

include_once 'core_db.class.php';

class CORE_MAIN extends CORE_DB{
	/*Private*/
	private $_connection;
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
		date_default_timezone_set("Europe/London");
	}

	public function __destruct(){
		unset($this->_conection);
	}
	
	public function load (){
		$this->_connection = parent::connect();
		$query = "SELECT * FROM vdl_config ORDER BY config_id";
		$result = mysql_query($query,$this->_connection);
		parent::close($this->_connection);
		if(!$result)
			return false;
		else{
			while($row = mysql_fetch_assoc($result)){
				define ($row["config_name"],$row["config_value"]);
			}
			return true;
		}
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