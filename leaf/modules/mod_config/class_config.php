<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_config.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * La clase config permite trabajar más cómodamente con las variables de los
 * archivos de configuración. Éstos deben estar en la carpeta leaf/config/NOMBRE.php
 * donde, obviamente, nombre será la configuración. Dentro de dicho archivo debe haber
 * una variable llamada igual que el archivo ( si el archivo se llama por ejemplo
 * mysql, la variable debe ser $mysql. Esta debe tener en su primer parámetro el
 * nombre de configuración y debe estar establecida a su valor.
 * 
 * Ejemplo: $mysql['host'] = 'localhost';
 * Luego se podrá llamar con lw('config')->get('mysql','host') ó si prefieres
 * tener toda la configuración en una variable puedes omitir el segundo campo
 * ó el que proceda.
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna
 * ---------------------------------------------------------------------
 * 16/07/12 - La clase ha sido reescrita
 **********************************************************************/

	class config {
	
      private static $cfg;
   
      public function __construct(){
         
         include( 'leaf/config/leafwork.php' );
         self::$cfg['basic'] = $config['basic'];
         unset( $config );
         
         
         
      }
      
      public function getar( $config ){
      
         if( isset( self::$cfg[$config] ))
            return self::$cfg[$config];
         else
            return array();
      
      }
      
      public function get(){

         $num = func_num_args();
         $arg = func_get_args();
      
         if( func_num_args() == 0 )
            return self::$cfg;
      
         if( func_num_args() == 1 &&  strpos( $arg[0] , ',' ) == 0 ){

            return self::$cfg['basic'][$arg[0]];
            
         }else{
         
            if( strpos( $arg[0] , ',' ) > 0 )
               $arg = explode( ',' , $arg[0] );

            
            if( isset( self::$cfg[$arg[0]] ) )
            
               switch( $num ){
                  
                  //case 1 : $v = self::$cfg[$arg[0]]; return $cfg[$arg[0]];
                  case 2 : $v = self::$cfg[$arg[0]][$arg[1]]; return ( isset( $v ))?( $v ):( 'ERROR1' ); break;
                  case 3 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]]; return ( isset( $v ))?( $v ):( 'ERROR2' ); break;
                  case 4 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]]; return ( isset( $v ))?( $v ):( 'ERROR3' ); break;
                  case 5 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]]; return ( isset( $v ))?( $v ):( 'ERROR4' ); break;
                  case 6 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]]; return ( isset( $v ))?( $v ):( 'ERROR5' ); break;
                  case 7 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]]; return ( isset( $v ))?( $v ):( 'ERROR6' ); break;
                  case 8 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]][$arg[7]]; return ( isset( $v ))?( $v ):( 'ERROR7' ); break;
                  case 9 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]][$arg[7]][$arg[8]]; return ( isset( $v ))?( $v ):( 'ERROR8' ); break;

               }            
            
            else{
               
               if( !isset( self::$cfg[$arg[0]] ) && is_file( 'leaf/config/'.$arg[0].'.php' ) && include( 'leaf/config/'.$arg[0].'.php' )){
                  
                  if( is_array( ${$arg[0]} ))
                     self::$cfg[$arg[0]] = ${$arg[0]};
                  else
                     return null;
            
                  $num = count( $arg );
            
                  switch( $num ){
                  
                     //case 1 : $v = self::$cfg[$arg[0]]; return ( isset( $v ))?( $v ):( 'ERROR1' ); break;
                     case 2 : $v = self::$cfg[$arg[0]][$arg[1]]; return ( isset( $v ))?( $v ):( 'ERROR2' ); break;
                     case 3 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]]; return ( isset( $v ))?( $v ):( 'ERROR3' ); break;
                     case 4 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]]; return ( isset( $v ))?( $v ):( 'ERROR4' ); break;
                     case 5 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]]; return ( isset( $v ))?( $v ):( 'ERROR5' ); break;
                     case 6 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]]; return ( isset( $v ))?( $v ):( 'ERROR6' ); break;
                     case 7 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]]; return ( isset( $v ))?( $v ):( 'ERROR7' ); break;
                     case 8 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]][$arg[7]]; return ( isset( $v ))?( $v ):( 'ERROR8' ); break;
                     case 9 : $v = self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]][$arg[7]][$arg[8]]; return ( isset( $v ))?( $v ):( 'ERROR9' ); break;

                  
                  }
            
               }else
                  return 'ERROR No se encuentra el archivo de configuración "'.$arg[0].'"';
            
            }

         }

      }
      
	
      public function set(){
      
         if( func_num_args() == 0 )
         
            return false;
         
         else{
         
            $num = func_num_args();
            $arg = func_get_args();

            switch( $num ){
                  
               case 2 : self::$cfg['basic'][$arg[0]] = $arg[1]; break;
               case 3 : self::$cfg[$arg[0]][$arg[1]] = $arg[2]; break;
               case 4 : self::$cfg[$arg[0]][$arg[1]][$arg[2]] = $arg[3]; break;
               case 5 : self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]] = $arg[4]; break;
               case 6 : self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]] = $arg[5]; break;
               case 7 : self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]] = $arg[6]; break;
               case 8 : self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]] = $arg[7]; break;
               case 9 : self::$cfg[$arg[0]][$arg[1]][$arg[2]][$arg[3]][$arg[4]][$arg[5]][$arg[6]][$arg[7]] = $arg[8]; break;

            }            
            
            return true;
            
         }

      }   
   
   
   
   
	}

?>
