<?php
require_once "CORE_DB.php";
/**
 * class CORE_MAIN
 * 
 */
class CORE_MAIN extends CORE_DB
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $__connection;


  /**
   * 
   *
   * @return void
   * @access public
   */
	public function __construct (){
		parent::__construct();
		date_default_timezone_set("Europe/London");
	} // end of member function __construct

  /**
   * 
   *
   * @return void
   * @access public
   */
	public function __destruct(){
		unset($this->_conection);
	} // end of member function __destruct

  /**
   * 
   *
   * @return void
   * @access public
   */
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
	} // end of member function load

  /**
   * 
   *
   * @return void
   * @access public
   */
	public function load_lang(){
		include ("vdl-lang/lang_" . LANG . ".conf.php");
	} // end of member function load_lang





} // end of CORE_MAIN
?>
