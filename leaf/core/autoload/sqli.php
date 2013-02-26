<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: sqli.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3 - http://www.gnu.org/licenses/gpl.txt
 * ---------------------------------------------------------------------
 * El archivo sqli.php requiere del módulo POST ( leaf/modules/mod_post )
 * para evitar la inclusión de consultas SQL por los parámetros del POST
 * quedando así la variable $_POST limpia de toda intrusión maligna que
 * pueda darse en la base de datos.
 * ---------------------------------------------------------------------
 * 15/07/12 - Archivo sqli.php reescrito para mejorar seguridad.
 * 16/07/12 - Archivo sqli.php modificado para hacer una política de seguridad
 * por niveles.
 * 19/07/12 - Agregada más seguridad para arreglar algunos bypasses
 * ---------------------------------------------------------------------
 * Dependencias:
 *    - Módulos: Get , Cookie y Server
 *    - Archivos: config/agents.php
 **********************************************************************/
 
   needs( 'get'     ); // Filtrado
   needs( 'cookie'  ); // Filtrado
   needs( 'server'  ); // Filtradas variables HTTP

   /* FILTRO 0 : Escanear agentes conocidos de vulnerabilidaes */

   foreach( lw('config')->getar('agents') as $key => $filter )
      if( $filter and preg_match( '/('.$key.')/' , lw('server')->agent() ))
        header( 'Status: 404' , true , 404 );   


   /* FILTRO 1 : Analizar variables URL , COOKIES y SERVER (HTTP) */

   $filter = array( 'get' , 'cookie' , 'server' );
   foreach( $filter as $analize ){
   
      $p = lw( $analize )->get();
      
      foreach( $p as $campo => $valor ){
         
         if( $analize == 'server' )
            if( substr( $campo , 0 , 4 ) != 'HTTP' ) 
               break;
         
         if( preg_match( '%\/\*(.*?)\*\/|--%i' , $valor ) ) do { // para evitar filtros del estilo //*bline/*/**/ que al eliminar quedarían como /**/
            $p[$campo] = preg_replace( '%\/\*(.*?)\*\/|--%i' , '' , $p[$campo] );
         } while( preg_match( '%\/\*(.*?)\*\/|--%i' , $p[$campo] ) );

         if( preg_match( '/\'|\"|%22|%27|;|%3B/i' , $valor )) // Filtra comillas, comillas dobles y fines de query
            $p[$campo] = addslashes( $valor );
         
         if( preg_match( '/(\+|%2B|\s|%20|)*(AND|OR|NOT|UNION|SELECT|ORDER|GROUP|BY|WHERE|HAVING|RLIKE|LIKE)(\+|%2B|\s|%20)*/i' , $valor )) // Filtros SQLi de consulta   
           $p[$campo] = preg_replace( '/(\+|%2B|\s|%20)+/' , '_' , $p[$campo] );

         if( preg_match( '/(CHAR|ASCII|HEX|CONCAT|CAST|CONVERT|NULL|SLEEP|BENCHMARK)(\s*?)\((.*)\)/i' , $valor ) ) // Filtros ByPass
            $p[$campo] = preg_replace( '/(CHAR|ASCII|HEX|CONCAT|CAST|CONVERT|NULL|SLEEP|BENCHMARK)/i' , '' , $p[$campo] );

      }

      lw( $analize )->set( $p );
      unset( $p );
      
   }

?>
