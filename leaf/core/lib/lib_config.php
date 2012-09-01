<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: lib_config.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3 - http://www.gnu.org/licenses/gpl.txt
 * ---------------------------------------------------------------------
 * El archivo lib_config se encarga de la gestión de la configuración
 * del framework principal así como de gestionar los errores del sistema
 * una vez es creada la instancia en el FW.
 **********************************************************************/

	class config {
	
		private $configuracion;
		
		public function __construct(){
			
			if( !@include_once('leaf/config/leafwork.php') )
				lw('error')->show('No existe el archivo de configuracion basica',true);
			else
				$this->configuracion[0] = $config['basic'];
			
			if( !$config['basic']['display_error'] )
				error_reporting( 0 );
			else
				error_reporting( $config['basic']['error_level'] );
		}
	
		public function load_config( $file ){
			
			if( is_file('leaf/config/'.$file.'.php') ){
				include_once('leaf/config/'.$file.'.php');
				$this->configuracion[$file] = ${$file};
			}else
				return false;

		}
	
		public function set( $field , $field2 , $field3 = '' ){
			
			if( $field3 == '' )
				$this->configuracion[0][$field] = $field2;
			else
				$this->configuracion[$field][$field2] = $field3;
				
		}
	
		public function get( $field , $field2 = '' ){
			
			if( $field2 == '' )
				if( isset( $this->configuracion[0][$field] ))
					return $this->configuracion[0][$field];
				else
					return false;
			else
				if( isset( $this->configuracion[$field][$field2] ))
					return $this->configuracion[$field][$field2];
				else
					if( self::load_config( $field ) !== false )
						return self::get( $field , $field2 );
					else
						return false;
		}
	
	}

?>
