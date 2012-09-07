<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_session.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El módulo SESSION pretende hacer más ameno el uso de sesiones en PHP
 * aportando getters y setters entre otras utilidades.
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 **********************************************************************/


class session {

	public static $session;

	public function __construct(){
	
		session_start();
		$session = $_SESSION;
	
	}
	
	public function set( $name , $value ){
		
		$_SESSION[ $name ] = $value;
		
	}
	
	public function get( $name ){
	
		if( isset( $_SESSION[ $name ] ))
			return $_SESSION[ $name ];
		else
			return null;
		
	}

	public function exists( $name ){
	
		if( !is_null( self::get( $name )))
			return true;
		else
			return false;
			
	}
	
	// --[ Alias ]--
	public function setSession( $name , $value ){ self::set( $name , $value ); }
	
	
	
}

?>
