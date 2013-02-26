<?php


/**
 * class CORE_DB
 * 
 */
class CORE_DB
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * 
   *
   * @return void
   * @access public
   */
    public function __construct (){
    if( !defined('DBDIR')){
        $config=parse_ini_file("db.ini",true);
        define ("DBDIR",$config["DB"]["DBDIR"]);
        define ("DBUSR",$config["DB"]["DBUSR"]);
        define ("DBPSW",$config["DB"]["DBPSW"]);
        define ("DBASE",$config["DB"]["DBASE"]);
        }
    } // end of member function __construct

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function __destruct( ) {
  } // end of member function __destruct

  /**
   * 
   *
   * @param mixed __con 

   * @return void
   * @access public
   */
    public function close($_con){
        $_con->close();
    } // end of member function close

  /**
   * 
   *
   * @return void
   * @access public
   */
    public function connect (){
        $connection = new mysqli(DBDIR, DBUSR, DBPSW, DBASE);
        /* check connection */
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        return $connection;
    } // end of member function connect

  /**
   * 
   *
   * @param mixed __dbdir 

   * @param mixed __dbusr 

   * @param mixed __dbpsw 

   * @param mixed __dbase 

   * @return void
   * @access public
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
    }// end of member function set





} // end of CORE_DB
?>
