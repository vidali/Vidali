<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_post.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El módulo POST pretende sustituir el clásico $_POST añadiendo funcionalidades
 * dinámicas para manejar la variable en cualquier entorno pues funciona
 * bien por índices ó por nombres de variable.
 * ---------------------------------------------------------------------
 * Dependencias: Módulo Session.
 * ---------------------------------------------------------------------
 * Se recomienda encarecidamente el uso de un anti Sql Injection para evitar
 * inyecciones de código SQL por formularios.
 * ---------------------------------------------------------------------
 * 08/12/11 - La clase post ha sido reprogramada
 * 16/07/12 - Se ha modificado la clase post eliminando métodos viejos
 * 16/07/12 - Se ha añadido dos funciones. safe y unsafe. 
 **********************************************************************/
	
	needs( 'session' );
	
   class post {
		
		static private $post;
		
		public function __construct(){

			if( isset( $_POST ) && !empty( $_POST ))
				self::$post = $_POST;
			else
				self::$post = null;
				
		}
		
		public function getPost( $field = null ){
		
			if( is_null( $field ))
				return self::$post;
			elseif( isset( self::$post[ $field ] ))
				return self::$post[ $field ];
			else
				return null;
		}
		
		public function get( $field = null ){
		
			return self::getPost( $field );
		
		} // Alias
		
		public function setPost( $post , $value = null ){
		
			if( is_null( $value ))
				self::$post = $post;
			else
				self::$post[ $post ] = $value;
				
		}

		public function set( $post , $value = null ){
		
			self::setPost( $post , $value );
			
		} // Alias

		public function getPostById( $id ){
		
			if( count( self::$post ) < $id )
				return null;
			
			if( gettype( $id ) == 'string' && isset( self::$post[ $id ] ))
				return self::$post[ $id ];
			
			for( $i = 0 ; $i < (int)$id ; $i++ )
				next( self::$post );
			
			return current( self::$post );
		
		}
		
		public function exists(){
			
			if( is_null( self::$post ))
				return false;
			else
				return true;

		}
	
	}
	
?>
