<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_debug.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * Desc
 * ---------------------------------------------------------------------
 * Dependencias:
 *    - Clases: IOFile
 *    - Archivos: config/debug.php
 * ---------------------------------------------------------------------
 **********************************************************************/
 
 needs( 'iofile' );
 
 
   class debug {
   
      public function __construct(){}
      
      
      public function getlog( $ruta = '' ){
      
         if( $ruta == '' )
            $ruta = './logs/php_error.log';
         
      
        // $ar = fopen( $ruta , 'r' );
        // $ar = fread( $ar , 10024 );
         $ar = file_get_contents( $ruta );
         
         
         return $ar;

      }

      private function getline( $file , $line ){
      
         preg_match( '/leaf\/(.*)/' , $file , $f );
         $file = $f[0];

         if( is_file( $file )){
         
            $f = file_get_contents( $file );
            $f = explode( "\n" , $f );
            
            $dev = '*Archivo '.basename($file).' en la actualidad<br />';
            @$dev .= ($line-3).' - '.htmlentities(trim($f[$line-3])).'<br />';
            @$dev .= ($line-2).' - '.htmlentities(trim($f[$line-2])).'<br />';
            @$dev .= ($line-1).' - '.htmlentities(trim($f[$line-1])).'<br />';
            @$dev .= ($line-0).' - '.htmlentities(trim($f[$line]  )).'<br />';
            @$dev .= ($line+1).' - '.htmlentities(trim($f[$line+1])).'<br />';

            return $dev;

         }else
            return '--';
      
      }
      
      
      public function zebra( $value , $num = null ){
      
         $odd = false;
         $html = '';
         $a = explode( "\n" , $value );
         $a = array_reverse( $a );
         $count = 0;
         
         foreach( $a as $id => $valor ){
      
            if( $num != null ){
               $count++;
               if( $count >= $num )
                  break;
            }
         
            preg_match( '/\[(.*)\]\sPHP\s(.*?)\sin(.*?)\son line\s([0-9]*)/' , $valor , $p );
            
            if( count( $p ) == 5 ){
               
               $datos['odd'] = $odd;
               $datos['archivo'] = basename($p[3]);
               $datos['codigo'] = self::getline( $p[3] , $p[4] );
               $datos['error'] = $p[2];
               $datos['linea'] = $p[4];
               $datos['hora'] = (( preg_match( '/'.date('d-M-Y').'\s([0-9]+\:[0-9]+)/' , $p[1] , $j ) )?( 'Hoy, '.$j[1] ):( $p[1] ));
               $odd = !$odd;
               $html .= lw('tpl')->parse( 'admin:codtable' , $datos );
            
            }
         
         
         }
         
         return $html;
         
      
      }
   
   
   
   }
 

 ?>
