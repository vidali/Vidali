<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: alias.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * El archivo de configuración del alias provee una funcionalidad que convierte
 * funcionalidades de módulos en funciones propias del mismo PHP. Esto se realiza
 * mediante la evaluación del contenido de las funciones abajo especificadas.
 * 
 * Modo de uso:
 * Para usar los alias ( automáticamente ) se debe seguir el patrón siguiente:
 * 
 * 1 - Poner una variable llamada $alias donde el primer argumento será la función que
 * deseamos poder llamar, por ejemplo "publicar" ( para luego llamarla como una
 * función nativa más → publicar( argumento1 , argumento 2 , ... ); El primer parámetro
 * debe llamarse siempre igual dentro de la misma función ( en este caso, como ejemplo
 * se considerará "publicar" ).
 * 
 * 2 - Una vez creada la variable $alias['funcion'] la igualaremos a lo siguiente:
 * CLASE(punto)FUNCIÓN_ORINGINAl. Es decir, si queremos hacer el alias de la clase
 * "utils" y de la función "retarr" y queremos llamarla como "printr" debemos hacer
 * lo siguiente: $alias['printr'] = 'utils.retarr';
 * 
 * Una vez implementemos eso, si hacemos la llamada desde algún lado de nuestro PHP
 * podremos llamar a printr( $vble ) sin tener que hacer lw('utils')->retarr( $vble )
 * 
 * ---------------------------------------------------------------------
 * Dependencias: Ninguna.
 * ---------------------------------------------------------------------
 * 07/02/2012 - Creación del archivo
 * 13/07/2012 - Se ha modificado el mecanismo de alias
 **********************************************************************/
 
   $alias['printr'] = 'utils.retarr';
   $alias['publicar'] = 'twitter.publicar';
   $alias['getIP'] = 'utils.getRealIP';
   

?>
