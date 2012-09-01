<?php


	class dao {
	
		public $instance = null;
		static protected $conexion = null;
	
		public function __construct(){
			
			$tipo = lw::gi('config')->get('dao','type');
			//echo 'DAO_CON';
			$this->instance = lw::gi( $tipo );
			
		}
		
		public function getConexion(){
			$memory_id = self::$conexion;
			return $memory_id;
		}
		
		
		public function query( $params , $print = false ){
			
			if( $print )
				return $this->instance->query( $params , true );
			else
				return $this->instance->query( $params );
		}
		
		public function q( $params ){
			return self::query( $params );
		}
		
		public function query_rows( $query ){
			return $this->instance->query_rows( $query );
		}
		
		public function num( $query ){
			return self::query_rows( $query );
		}
		
		public function qr( $query ){
			return self::query_rows( $query );
		}

		public function rows( $query ){
			return self::query_rows( $query );
		}
		
		public function lastId(){
			return $this->instance->lastId();
		}
		
		public function query_exe( $query , $param = '' ){
			return $this->instance->query_exe( $query , $param );
		}
		
		public function qe( $query , $param = '' ){
			return self::query_exe( $query , $param );
		}
		
		public function query_array( $query ){
			return $this->instance->query_array( $query );
		}
		
		public function qa( $query ){
			return self::query_array( $query );
		}
		
		public function __destruct(){
		//	lw::gi('utils')->print_array( lw::gi()->getSingleton() );
			return $this->instance->__destruct();
		}
	
	
	
	}


?>
