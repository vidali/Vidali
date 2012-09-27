<?php 
class CORE_DB{
	/*Private*/

	/*Public*/

	/**
	 * 
	 * We start to parse "db.ini" that stores the main info to connect to MySQL server. 
	 */
	public function __construct (){
		if( !defined('DBDIR')){
		$config=parse_ini_file("db.ini",true);
		define ("DBDIR",$config["DB"]["DBDIR"]);
		define ("DBUSR",$config["DB"]["DBUSR"]);
		define ("DBPSW",$config["DB"]["DBPSW"]);
		define ("DBASE",$config["DB"]["DBASE"]);
		}
	}

	/**
	 * 
	 * Destruct.
	 */
	public function __destruct(){
		
	}

	
	/**
	*
	* We close mysql connection here.
	*/
	public function close($_con){
		$_con->close();
	}
	
	
	/**
	 * 
	 * We start the connection to MySQL server. Return the connection value and also saves in $_connection.
	 */
	public function connect (){
		$connection = new mysqli(DBDIR, DBUSR, DBPSW, DBASE);
		/* check connection */
		if ($connection->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		return $connection;
	}

	/**
	*
	* We modify db.ini with the new values given.
	* @param $_dbdir: Store new MySQL dir.
	* @param $_dbusr: Store new MySQL username.
	* @param $_dbpsw: Store new MySQL password.
	* @param $_dbase: Store new MySQL database.
	*/
	public function set($_dbdir,$_dbusr,$_dbpsw,$_dbase){
		$file = fopen("../vdl-include/vdl-core/db.ini","w");
		$string="[DB]\n
				 DBDIR=$_dbdir\n
				 DBUSR=$_dbusr\n
				 DBPSW=$_dbpsw\n
				 DBASE=$_dbase";
		fputs($file,$string);
		fclose($file);
	}
}
?>
