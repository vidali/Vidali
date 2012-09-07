<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: leafwork.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El archivo leafwork.php es el núcleo de la funcionalidad del Framework, se compone
 * de una clase llamada "lw" 
 * ---------------------------------------------------------------------
 * 05/12/11 - Reprogramación del LeafWork para evitar doble Singleton
 * 09/01/12 - Función "preload" ajustada para poder cambiar el archivo de preload
 * 07/02/12 - Se ha añadido el class alias para una compatibilidad con la versión 1.0
 * 07/02/12 - Al núcleo se ha añadido la opción de alias
 * 13/07/12 - Se ha modificado la estructura de alias
 **********************************************************************/


class lw {
	
   private static $singleton = array();
   private static $lwconfig = array();
   private function __construct(){}


	public function getConfig( $field ){ if( isset( self::$lwconfig[$field] )){ return @self::$lwconfig[$field]; }}
	public function setConfig( $field , $value ){ self::$lwconfig[$field] = $value; }
	
		
	public static function gi( $modulo = '' , $constructor = '' ){
		
		if( count( self::$singleton ) == 0 ){

			array_push( self::$singleton , new self );
			return self::$singleton[0]->gi( $modulo , $constructor );
			
        }else{
		
			if( $modulo == '' )
				return self::$singleton[0];
			
			else{

				foreach( self::$singleton as $pos => $valor ){
				
					if( get_class( $valor ) == $modulo )
						
						if( lw()->getConfig( $modulo ) == null || lw()->getConfig( $modulo ) == md5( $constructor )){
							return self::$singleton[$pos];
							break;
						}else{
							self::$singleton[$pos] = new $modulo( $constructor );
							return $singleton[$pos];
						}
				
				} // foreach
				
				$mod = 'leaf/modules/mod_'.$modulo.'/class_'.$modulo.'.php';
				if( is_file( $mod ) ){
					
					$a = include_once( $mod );
					if( class_exists( $modulo )){
						
						$aux = new $modulo;
						array_push( self::$singleton , $aux );
						return self::$singleton[count(self::$singleton)-1];
					
					}else{
				
						lw('error')->SystemError( 1 );
					
					} 

				}elseif( is_file( 'leaf/core/lib/lib_'.$modulo.'.php' ) and !lw()->moduleExists( $modulo )){
					
					$lib = include_once( 'leaf/core/lib/lib_'.$modulo.'.php' );
					if( class_exists( $modulo )){
						
						$aux = new $modulo;
						array_push( self::$singleton , $aux );
						return self::$singleton[count(self::$singleton)-1];
					
					}else{
				
						exit('ERROR_FATAL2');
					
					}
					
				}else{
				
					lw('error')->show( 'Error, no se encuentra el m&oacute;dulo "'.$modulo.'"' , true );
				
				}
			
			} // else del if( modulo == '' )
		}
	
	}


	public function moduleExists( $modulo , $incluir = false ){
	
		$exists = false;
		for( $i = 0 ; $i < count( self::$singleton ) ; $i++ )
			if( get_class( self::$singleton[$i] ) == $modulo ){
				$exists = true;
				break;
			}
		
		if( $exists == false && $incluir && is_file( 'leaf/modules/mod_'.$modulo.'/class_'.$modulo.'.php' ) ){

			self::gi( $modulo );
			for( $i = 0 ; $i < count( self::$singleton ) ; $i++ )
				if( get_class( self::$singleton[$i] ) == $modulo ){
					$exists = true;
					break;
				}

		}		
		
		return $exists;
			
	}
   public function mod_exists( $modulo ){ return lw()->moduleExists( $modulo ); }

	public function pageExists( $page ){

		$existe = false;
		$extensions = explode( ',' , lw::gi('config')->get('page_extensions'));

		foreach( $extensions as $ext )
			if( is_file( 'leaf/paginas/'.$page.'.'.$ext ))
				$existe = $ext;
			
		return $existe;
			
	}

	public function includePage( $name  , $php = false ){
					
		if( $php ){
				
			ob_start();
			include( 'leaf/paginas/'.$name.'.php' );
			$cont = ob_get_contents();
			ob_end_clean();
			return $cont;				
							
		}else{	
			$html = file_get_contents( 'leaf/paginas/'.$name.'.php' );			
			return $html;			
		}
	
	}

    public function __clone(){
        trigger_error('No se permite la clonación.' , E_USER_ERROR );
    }

    public function __wakeup(){
        trigger_error( 'No se permite deserializar.' , E_USER_ERROR );
    }

}

class_alias( 'lw' , 'leafwork' );

//----------------------------------------------------------------------
// Funciones

function lw( $param = null , $constructor_class = null ){
		
	if( $param == null )
		return lw::gi();
		
	else
		if( $constructor_class == null )
			return lw::gi( $param );
		else
			return lw::gi( $param , $constructor_class );

} 

function preload( $file = null ){ 
   
   if( is_null( $file ) || empty( $file ))
      include( 'leaf/core/pages/preload.php' ); 
   else
      if( is_file( $file ))
         include( $file );
      else
         exit('ERROR: El archivo '.$file.' no existe');
}

//-----------------------------------------------------------------------------------

function needs( $module ){ 
   
   if( !lw()->moduleExists( $module , true ) ) 
      lw('error')->show('No se encuentra el modulo '.$module , true ); 

} 

//----------------------------------------------------------------------
// Código

	//-- [ AUTOLOAD ]----------------------------------------------------
	foreach( glob( 'leaf/core/autoload/*.php' ) as $AU )
		include( $AU );

   function gestor_unserialize ($errno , $errstr ){
       echo $errstr.'<br>';
   }

/*$seriado = 'foo';
set_error_handler('gestor_unserialize');
$original = unserialize( $seriado );
restore_error_handler();*/

//-- [ ALIAS ]-------------------------------------------------------
   
include( 'leaf/config/alias.php' );
foreach( $alias as $funcion => $opt ){
@list( $mod , $fun ) = explode( '.' , $opt );
$code = <<<CODE

   function $funcion() {
      
      \$arg_list = func_get_args();
      \$num_args = func_num_args();
      
      switch( \$num_args ){
         case 0: return @lw('$mod')->$fun(); break;
         case 1: return @lw('$mod')->$fun( \$arg_list[0] ); break;
         case 2: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] ); break;
         case 3: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] ); break;
         case 4: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] , \$arg_list[3] ); break;
         case 5: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] , \$arg_list[3] , \$arg_list[4] ); break;
         case 6: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] , \$arg_list[3] , \$arg_list[4] , \$arg_list[5] ); break;
         case 7: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] , \$arg_list[3] , \$arg_list[4] , \$arg_list[5] , \$arg_list[6] ); break;
         case 8: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] , \$arg_list[3] , \$arg_list[4] , \$arg_list[5] , \$arg_list[6] , \$arg_list[7] ); break;
         case 8: return @lw('$mod')->$fun( \$arg_list[0] , \$arg_list[1] , \$arg_list[2] , \$arg_list[3] , \$arg_list[4] , \$arg_list[5] , \$arg_list[6] , \$arg_list[7] , \$arg_list[8] ); break;
      }
         
   }

CODE;
@eval($code.';');
   
   
} // foreach
   
//----------------------------------------------------------------------   

?>
