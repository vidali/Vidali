<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: run.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El run.php es el motor básico que se encarga de lanzar compactamente
 * el framework utilizando simples comprobaciones de los archivos necesarios
 * para el buen funcionamiento del mismo.
 * ---------------------------------------------------------------------
 * 07/02/12 - Se ha añadido un control de versión para el uso del framework.
 **********************************************************************/
 	
   ini_set( 'log_errors' , 1 );
   ini_set( 'error_log' , './logs/php_error.log' );
   
   if( phpversion() >= 5.3 ){
   
      if( is_file('leaf/core/leafwork.php') ){
         
         require('leaf/core/leafwork.php');
         
         if( lw('config')->get('preload') )
            preload( lw('config')->get( 'preload_page' ) );

         if( lw('config')->get( 'load_template' ) )
            
            if( is_file( lw('config')->get( 'template' )) || trim(lw('config')->get( 'template' )) == '' )
               lw('html');
            else
               lw('error')->show( 'Error, no se ha cargado el template "'.lw('config')->get( 'template' ).'"' , true );

      }else
      
         exit( 'Error: Can\'t load "leafwork.php" in '.__FILE__.' on line '.__LINE__ );
   
   }else{
      
      echo 'LeafWork necesita de una versión de PHP al menos 5.3 para correr sin problemas';
      
   }

?>
