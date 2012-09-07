<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_tpl.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * La clase TPL es la encargada de la gestión de templates dinámicos.
 * Carga un archivo ".php" ó ".tpl" que se encuentre dentro de la carpeta
 * /template/pages/ o si se está usando un template basado en la URL de preferencia
 * primero. Cada una tendrá una estructura similar a la siguiente:
 * 
 * --[ inicio de página ( esto no estará presente en el template )]---
 * 
 * --COMENTARIO--
 *    <div class="test">
 *       <img src="template/avatar.jpg" /> Hola mi nombre es ${usuario}<br />
 *       ${comentario} - $PHP{date('d/m/y')}
 *    </div>
 * --!COMENTARIO--
 * 
 * --[ fin de página ]------------------------------------------------
 * 
 * Como pueden apreciar en el corto, pero ilustrativo ejemplo se pueden definir
 * bloques de diseño simplemente encerrando el contenido a utilizar entre:
 * "--PARTE--" y "--!PARTE--" donde, obviamente, parte será un bloque a llamar, en
 * caso de nuestro ejemplo, "comentario" para simular un bloque div de comentarios.
 * También se puede hacer uso de código PHP embebido poniendo antes del bloque "{}"
 * la palabra PHP en mayúsculas tal y como indica el ejemplo para mostrar la fecha.
 * 
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 * 20/07/12 - Modificado para que le de primero preferencia a los templates
 * globales y luego, si no existen, a los locales.
 **********************************************************************/

class tpl {

   private $ruta;
   private $ext;
   

   public function get( $name , $dynamic = true ){
      
      
      if( $dynamic == true && lw('config')->get('dynamic_template') ){
         
         $num = count( lw('get')->getParams() );
         
         for( $i = $num ; $i >= 0 ; $i-- ){
         
            $f = '';
            
            for( $j = 0; $j < $i ; $j++ )
               $f .= lw('get')->param($j).'/';
         
            $f.= 'pages/';
            
            if( is_file( 'template/'.$f.$name.'.php' )){
               $this->ext = 'php';
               $this->ruta = 'template/'.$f;
               break;
            }elseif( is_file( 'template/'.$f.$name.'.tpl' )){
               $this->ext = 'tpl';
               $this->ruta = 'template/'.$f;
               break;         
            }elseif( is_file( 'template/'.$f.$name.'.html' )){
               $this->ext = 'html';
               $this->ruta = 'template/'.$f;
               break;         
            }
         }
      }else{
         
         if( is_file( './template/pages/'.$name.'.php' ))
            $this->ext = 'php';
         elseif( is_file( './template/pages/'.$name.'.tpl' ))
            $this->ext = 'tpl';
         elseif( is_file( './template/pages/'.$name.'.html' ))
            $this->ext = 'html';
         else
            return 'ERROR'; 
            
         $this->ruta = './template/pages/'; 
                 
      }
	  $this->ruta = lw('config')->get( 'template_path' );
	  $this->ext = "php";

      $file = fopen( $this->ruta.$name.'.'.$this->ext , 'r' );
      $tmp  = fread( $file , 10000024 );
      fclose( $file );
      
      return $tmp;
   
   }


   public function getPath(){
   
         $base = substr( $_SERVER['REDIRECT_URL'] , 0 , strlen( lw('config')->get('base_url')) );

               $path = explode( '/' , $base );
               
            
               do {
                  
                  array_pop( $path );
                  
                  if( count( $path ) > 0 ){
                     
                     if( is_file( 'template/'.join( '/' , $path ).'.tpl' )){
                        $content = 'template/'.join( '/' , $path );
                        break;
                     }
                     
                  }else{
                     $content = lw('config')->get('template');	
                     break;
                  }
                  
               } while ( true );
         
         return $content;   
   
   }
   
   public function parse( $template , $fields = null ){
      list( $archivo , $seccion ) = explode( ':' , $template );
      
      $html = self::get( $archivo );
      
      if( $html == 'ERROR' )
         return 'No existe el template '.htmlentities( $archivo );
      else{
      
         $html = preg_replace( '/\n/' , '' , $html );
      
         if( preg_match( '/--'.strtoupper( $seccion ).'(.*)--!'.strtoupper( $seccion ).'/' , $html , $html )){

            $html = $html[1];
            
            if( $fields != null ) foreach( $fields as $f => $v )
               $html = preg_replace( '/\${'.strtoupper($f).'}/is' , $v , $html );
            
            $html = preg_replace_callback( '/\$PHP{(.*)}\;/' , function ( $match ) {

               $match[1] = trim( $match[1] );

               if( substr( $match[1] , -1 , 1 ) == ';' )
                  return eval( $match[1] );
               else
                  return eval( $match[1].';' );
            
            }, $html );
         
            $self = __CLASS__;
            
            $html = preg_replace_callback( '/\$TMP{(.*)}/' , function ( $match ) use ( &$archivo , &$seccion , &$self , &$fields ){
               
//-----------------------------------------------------------

               $html = $self::get( $archivo );
               
               
               if( $html == 'ERROR' )
                  return 'No existe el template '.htmlentities( $archivo );
               
               else{

                  $html = preg_replace( '/\n/' , '' , $html );

                  if( preg_match( '/--'.strtoupper( trim($match[1]) ).'(?:\s*?)(.*)(?:\s*?)--!'.strtoupper( trim($match[1]) ).'/' , $html , $html )){

                     $html = trim($html[1]);
                     
                     if( $fields != null ) foreach( $fields as $f => $v )
                        $html = preg_replace( '/\${'.strtoupper($f).'}/is' , $v , $html );
                  
                  }else
                     exit('caca');
                  
                  return $html;
                  
               }
      
//-----------------------------------------------------------               
               
            }, $html );
            
            unset( $self );
            //echo $html;
            return $html;
                     
         }else
            return 'No existe la secci&oacute;n '.strtoupper( $seccion ).' dentro del template '.$archivo;
      
      }
   
   
   
   }
   


}
