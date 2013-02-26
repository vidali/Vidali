<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_server.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * DESC
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 **********************************************************************/

	class server {
		
      static private $server;
	
      public function __construct(){
         self::$server = $_SERVER;
      }

      public function agent(){
         return self::$server['HTTP_USER_AGENT'];
      
      }

      public function get(){
      
         if( func_num_args() == 0 )
            return self::$server;
         else
            return ( isset( self::$server[ func_get_arg(0) ] )?( self::$server[ func_get_arg(0) ] ):( null ));
      
      
      }

      public function set(){
      
         if( func_num_args() == 1 )
            self::$server = func_get_arg(0);
         elseif( func_num_args == 2 )
            self::$server[func_get_arg(0)] = func_get_arg(1);
         
      }   
	
	}
	
?>
