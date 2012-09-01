<?php


	class mysql extends dao {
	
		static private $md5query = '';
		static private $numquerys = 0;
		
		
		public function getNumQuery(){
			return self::$numquerys;
		}
		
		public function __construct(){
		
		
			if( parent::$conexion = mysql_connect( lw::gi('config')->get('mysql','host') ,
									  			    lw::gi('config')->get('mysql','user') , 
												    lw::gi('config')->get('mysql','pass') )){
							   
				if( mysql_select_db( lw::gi('config')->get('mysql','bdda') , parent::$conexion ))
					return true;
				else
					echo false;
			
			}else
				echo 'Error conexion MySQL';
		
		
		}
		
		public function query_rows( $query ){
			return mysql_num_rows( $this->query( $query ) );
		}
		
		public function rows( $query ){
			return self::query_rows( $query );
		}
		
		public function lastId(){
			return mysql_insert_id( parent::$conexion );
		}
	
		
	
		public function query( $param , $print = false ){
			
			
			
			self::$numquerys++;
			if( md5( $param ) != self::$md5query /*|| (( self::$numquerys-( self::$numquerys-1 )) > 1 )*/ ){
				self::$md5query = md5( $param );

				$value = mysql_query( $param , parent::$conexion );
				if( $print )
					return $param;
				else
					return $value;
				
				//lw::gi('utils')->backtrace()."\n".$param."\n\n";
			}

		}
		
		public function query_exe( $query , $param = '' ){
			

			if( $ret = mysql_fetch_assoc( self::query( $query )))
				
				if( $param != '' )
					return $ret[$param];
				else
					return $ret;
			
			else
			
				return null;
				
			
			
		}
		
		  public function query_array( $q ){

			 $consulta = self::query( $q );
			 
				//if( !$consulta )
				//	LeafWork::Init()->error('Error en query: <strong>'.$q.'</strong> ( '.mysql_error().' )');
			$retornar = array();
			while( $sql = mysql_fetch_array( $consulta )) array_push( $retornar , $sql );
			return $retornar;
			 
		  }	

		public function __destruct(){
			@mysql_close( parent::$conexion );
		}
	
	}

?>
