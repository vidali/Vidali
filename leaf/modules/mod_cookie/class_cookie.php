<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_cookie.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * DESC
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 **********************************************************************/

	class cookie {
      
      static private $cookie;
	
      public function __construct(){
         self::$cookie = $_COOKIE;
      }	

      public function get(){
      
         if( func_num_args() == 0 )
            return self::$cookie;
         else
            return ( isset( self::$cookie[ func_get_arg(1) ] )?( self::$cookie[ func_get_arg(1) ] ):( null ));
      
      
      }
      
      public function set(){
      
         if( func_num_args() == 1 ){
            self::$cookie = func_get_arg(0);
            $_COOKIE = self::$cookie;
         }elseif( func_num_args == 2 )
            self::$cookie[func_get_arg(0)] = func_get_arg(1);
         
      }
   
   
	}
	
?>
