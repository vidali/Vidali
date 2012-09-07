<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: xss.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3 - http://www.gnu.org/licenses/gpl.txt
 * ---------------------------------------------------------------------
 * El archivo xss.php requiere del módulo GET ( leaf/modules/mod_get )
 * para evitar intrusiones mediante ataques XSS en la web. También evita
 * el uso de comas, comillas y otros símbolos relacionados con el 
 * SQLinjection.
 * ---------------------------------------------------------------------
 * 15/07/12 - Archivo xss.php reescrito para mejorar seguridad.
 **********************************************************************/

   needs( 'post'   );
   needs( 'get'    );
   needs( 'cookie' );
   needs( 'server' );
   needs( 'session');
	
   /*
	$params = lw('get')->getParams();
	foreach( $params as $key => $value )
		if( preg_match( '/(.*)?(\'|\"|%3C|%3E|<|>)(.*)?/' , $value ))
			$params[$key] = htmlentities( $value );
	
	lw('get')->setParams( $params );
	*/

?>
