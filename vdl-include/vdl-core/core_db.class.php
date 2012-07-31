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
		mysql_close($_con);
	}
	
	
	/**
	 * 
	 * We start the connection to MySQL server. Return the connection value and also saves in $_connection.
	 */
	public function connect (){
		$connection = mysql_connect(DBDIR, DBUSR , DBPSW) 
					  or die ('DB Error: connection/user/password doesn\'t match. Please review your config');
		$database = DBASE;
		mysql_select_db($database, $connection)
					  or die ("DB Error: Missing database $database, Check your db.ini");
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
