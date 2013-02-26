<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: lib_error.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3 - http://www.gnu.org/licenses/gpl.txt
 * ---------------------------------------------------------------------
 * El archivo lib_error se encargará de la gestión de errores del PHP
 * y del usuario. 
 **********************************************************************/


class error {

	public function SystemError( $id ){
	}

	public function show( $num_error , $critical = false ){
	
		echo $num_error;
		if( $critical ) exit;
		
	}

   // Sin implementar aún
	public function getError( $id ){
	
		exit;
	
	}


}




?>
