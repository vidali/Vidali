<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_get.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El módulo GET pretende sustituir el clásico $_GET añadiendo funcionalidades
 * dinámicas para manejar la variable en cualquier entorno pues funciona
 * bien por índices ó por nombres de variable. De éste modo puede ser exportado
 * con más facilidad en caso de que se quiera cambiar el método del get normal
 * por una URL amigable.
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 * Se recomienda encarecidamente el uso de un anti XSS para evitar inyecciones
 * de código HTML por la URL.
 * ---------------------------------------------------------------------
 * 08/12/11 - La clase get ha sido reprogramada
 * 15/07/12 - Se modificó el código en getParamById
 **********************************************************************/

	class get {
	
		private static $params = array();
		
		public function __construct(){
		
			self::$params = $_GET;
		
		}
	
		public function getParams(){
		
			return self::$params;
		
		}
	
		public function setParams( $params ){
		
			self::$params = $params;
		
		}
	
		public function getParamById( $id ){
         
         if( is_null( $id ))
            return self::getParams();
         
			$count = 0;
			
			if( count( self::$params ) < $id )
				return null;
			
			foreach( self::$params as $param )
		
				if( $id == $count )
					return $param;
				else
					$count++;
		
		}

		// --[ Alias ]--------------------------------------------------
		public function param( $id = null ){ return self::getParamById( $id );	} 
		public function url( $id = null ){ return self::getParamById( $id ); }
		public function get( $id = null ){ return self::getParamById( $id ); }
		public function set( $pa = null ){ return self::setParams( $pa ); }
	
	
	}
	
?>
