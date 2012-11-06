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

require_once 'core_db.class.php';

class CORE_MAIN extends CORE_DB{

	private $_connection;

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
		if(!$result = $this->_connection->query($query)){
			printf("Error: %s\n", $this->_connection->error);
			parent::close($this->_connection);
            return false;
        }
		else{
			while($row = $result->fetch_assoc()){
				define ($row["config_name"],$row["config_value"]);
			}
			return true;
		}
	}
	
	public function load_lang(){
		include ("vdl-lang/lang_" . LANG . ".conf.php");
	}
}
?>
