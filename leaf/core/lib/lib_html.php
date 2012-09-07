<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: lib_html.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El módulo html pretende servir de herramienta para no tener que estar
 * mezclando la capa de código HTML con la capa de código en PHP en un
 * documento haciendo que así pueda utilizarse a modo de sistema de 
 * templates HTML.
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 * 09/12/11 - La clase html ( antes llamada parser ) ha sido reprogramada
 * 09/01/12 - Se ha separado el concepto de "página" del de parser por
 * módulo.
 * 09/01/12 - Se ha implementado la función "get" que devuelve un archivo
 * de template ( .tpl ) si no se le especifica una extensión ó un archivo
 * con extensión de la carpeta leaf/pages. Si es PHP se parsea.
 **********************************************************************/


class html {
	
		public function __construct(){
      
			header ('Pragma: no-cache');
			header ('Content-Type: text/html'); 
			
         if( trim(lw('config')->get( 'template' )) != '' )
            $content = file_get_contents( lw('config')->get('template') );	
         else
            $content = '';
         

         if( lw('config')->get('dynamic_template') == true && isset( $_SERVER['REDIRECT_URL'] )){
         
            $base = substr( $_SERVER['REDIRECT_URL'] , 0 , strlen( lw('config')->get('base_url')) );
            if( lw('config')->get('base_url') == $base )
               $base = substr( $_SERVER['REDIRECT_URL'] , strlen( lw('config')->get('base_url')) , ((strlen( $_SERVER['REDIRECT_URL'] ) - strlen( $base ))-1) ); // -1 para eliminar la última barra
            
            
            if( is_file( lw('config')->get('template_path').$base.'.tpl' ))
               $content = file_get_contents( lw('config')->get('template_path').$base.'.tpl' );
            elseif( is_file( lw('config')->get('template_path').$base.'.html' ))
               $content = file_get_contents( lw('config')->get('template_path').$base.'.html' );
            elseif( is_file( lw('config')->get('template_path').$base.'.htm' ))
               $content = file_get_contents( lw('config')->get('template_path').$base.'.htm' );
               
            else{
            
               $path = explode( '/' , $base );
               
            
               do {
                  
                  array_pop( $path );
                  
                  if( count( $path ) > 0 ){
                     
                     if( is_file( lw('config')->get('template_path').join( '/' , $path ).'.tpl' )){
                        $content = file_get_contents( lw('config')->get('template_path').join( '/' , $path ).'.tpl' );
                        break;
                     }elseif( is_file( lw('config')->get('template_path').join( '/' , $path ).'.html' )){
                        $content = file_get_contents( lw('config')->get('template_path').join( '/' , $path ).'.html' );
                        break;
                     }elseif( is_file( lw('config')->get('template_path').join( '/' , $path ).'.htm' )){
                        $content = file_get_contents( lw('config')->get('template_path').join( '/' , $path ).'.htm' );
                        break;
                     }
                     
                  }else{
                     
                     if( trim(lw('config')->get( 'template' )) != '' )
                        $content = file_get_contents( lw('config')->get('template') );	
                     else
                        $content = '';
                        
                     break;
                  
                  }
                  
               } while ( true );
            
            }
         
         }
         
         
         $content = preg_replace_callback( '/\$CFG\{(.*)\}/' , function ( $match ) {

               $match[1] = trim( $match[1] );
               $partes = explode( ',' , $match[1] );
               
               if( count( $partes ) == 1 ){
                  
                  if( lw('config')->get( $partes[1] ) != '' )
                     return lw('config')->get( $partes[1] );
                  else
                     return 'NULL';
                     
               }else
                  return lw('config')->get( implode( ',' , $partes ));
                  
               

            
         }, $content );
         
			preg_match_all( '/{{([A-Z_a-z0-9-]*)}}/', $content , $get_all_parts );
			
			$validas = explode( ',' , lw('config')->get( 'page_extensions' ));
			$f = scandir( 'leaf/pages/' );
			
			foreach( $get_all_parts[0] as $seccion ){
				
				$pa = strtolower( substr( $seccion , 2 , strlen( $seccion )-4 ));
				if( is_file( 'leaf/parser/'.$pa.'.php' )){
				
					ob_start();
					include( 'leaf/parser/'.$pa.'.php' );
					$cont = ob_get_contents();
					ob_end_clean();
					$content = preg_replace( '/{{'.strtoupper( $pa ).'}}/' , $cont , $content );
               ob_clean();
               
				}else{
					
               foreach( $validas as $ext ){
                  
                  if( is_file( 'leaf/pages/'.strtolower( $pa ).'.'.trim( $ext )) ){
                     
                     if( strtolower( trim( $ext )) == 'php' ){
                     
                        ob_start();
                        include( 'leaf/parser/'.strtolower( $pa ).'.php' );
                        $cont = ob_get_contents();
                        ob_end_clean();
                        $content = preg_replace( '/{{'.strtoupper( $pa ).'}}/' , $cont , $content );
                     
                     }else
                        $content = preg_replace( '/{{'.strtoupper( $pa ).'}}/' , file_get_contents( 'leaf/pages/'.strtolower( $pa ).'.'.trim( $ext )) , $content );
                     
                     break;
                     
                  }
               
               } // foreach
               
				} // else
				
			} // foreach

            if( lw('config')->get('allocate_path') ){
               $b = lw('config')->get('url').lw('config')->get('base_url').lw('config')->get('template_path');
               if( preg_match( '/\<\/head>/i' , $content ))
                  $content = preg_replace( '/\<\/head>/i' , '<base href="'.$b.'" />'."\n".'</head>' , $content );
            }


			
         echo $content;

		}
      
      public function init(){
         self::__construct();
      }
      
      public function get( $name ){
      
         $name = trim( $name );
         $cont = '';
         
         if( strpos( $name , '.' ) == '' )
            $ext = 'tpl';
            
         else{

            $ext = explode( '.' , $name );
            $ext = $ext[count($ext)-1];
            $name = substr( $name , 0 , strpos( $name , '.' ));
            
         }
            
         if( is_file( 'leaf/pages/'.$name.'.'.$ext ))
            
            if( $ext == 'php' ){
            
               ob_start();
               include( 'leaf/pages/'.$name.'.php' );
               $cont = ob_get_contents();
               ob_end_clean();
            
            }else            
               $cont = file_get_contents( 'leaf/pages/'.$name.'.'.$ext );
         
         else
            $cont = 'Error, no existe el archivo '.$name.'.'.$ext;
         
         
         return $cont;
      
      }
		
	}
	
?>
