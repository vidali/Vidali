<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: class_utils.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3
 * ---------------------------------------------------------------------
 * Es una clase que provee LW que contiene funciones de utilidad, debug
 * y desarrollo que hacen más cómoda la vida del programador.
 * ---------------------------------------------------------------------
 **********************************************************************/

	class utils {
	
		public function retarr( $array , $load_css = true ){
			
			$ret = '';
			if( is_array( $array )){
								
				if( $load_css )
					$ret .=  '<style type="text/css">.print_array table{background:#D3E4E5;border:1px solid gray;border-collapse:collapse;color:#fff;font:normal 12px verdana, arial, helvetica, sans-serif;}.print_array td,th{color:#363636;padding:.4em;}.print_array tr{border:1px dotted gray;}.print_array thead th,tfoot th{background:#5C443A;color:#FFF;text-align:left;text-transform:uppercase;padding:3px 10px;}.print_array tbody td a{color:#363636;text-decoration:none;}.print_array tbody td a:visited{color:gray;text-decoration:line-through;}.print_array tbody td a:hover{text-decoration:underline;}.print_array tbody th a{color:#363636;font-weight:400;text-decoration:none;}.print_array tbody th a:hover{color:#363636;}.print_array tbody td+td+td+td a{color:#03476F;padding-left:15px;}.print_array tbody th,tbody td{text-align:left;vertical-align:top;}.print_array tfoot td{background:#5C443A;color:#FFF;padding-top:3px;}.print_array .odd{background:#fff;}.print_array tbody tr:hover{background:#99BCBF;border:1px solid #03476F;color:#000;}</style>';
				
				$ret .=  '<div class="print_array">';
				$ret .=  '<table>';		
				$ret .=  '<thead><tr><th scope="col">Campo</th>';
				$ret .=  '<th scope="col" colspan="5">Valor</th></tr>';
				$ret .=  '</thead><tfoot><tr><td colspan="5">&nbsp;</td></tr></tfoot>';
				$ret .=  '<tbody>';
				
					foreach( $array as $campo => $valor ){

						$ret .=  '<tr>';
						$ret .=  '<th scope="row">'.$campo.'</th>';
						
						if( is_array( $valor )){
							$ret .= '<td>';
							$ret .= self::retarr( $valor , false );
							$ret .= '</td>';
						}else
							$ret .=  '<td>[ '.gettype($valor).' ] '.$valor.'</td>';
							
						$ret .=  '</tr>';
					}
				
				$ret .=  '</tbody>';
				$ret .=  '</table>';
				$ret .=  '</div>';

			}else
				$ret = self::retarr( (array)$array , $load_css );
				//$ret .=  'No es un array';
		
			return $ret;
		
		}
	
	
   
   // Obtenida de http://www.eslomas.com/2005/04/obtencion-ip-real-php/
   
   function getRealIP(){
    
      if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' ) {
         
         $client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
    
         // los proxys van añadiendo al final de esta cabecera
         // las direcciones ip que van "ocultando". Para localizar la ip real
         // del usuario se comienza a mirar por el principio hasta encontrar 
         // una dirección ip que no sea del rango privado. En caso de no 
         // encontrarse ninguna se toma como valor el REMOTE_ADDR
    
         $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
         reset($entries);
         
         while( list( , $entry ) = each( $entries )){
            
            $entry = trim($entry);
            if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) ){
               
               // http://www.faqs.org/rfcs/rfc1918.html
               $private_ip = array(
                     '/^0\./', 
                     '/^127\.0\.0\.1/', 
                     '/^192\.168\..*/', 
                     '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
                     '/^10\..*/');
    
               $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
    
               if ($client_ip != $found_ip)
               {
                  $client_ip = $found_ip;
                  break;
               }
            }
         }
      
      }else{
         
         $client_ip = 
            ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
               $_SERVER['REMOTE_ADDR'] 
               : 
               ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
                  $_ENV['REMOTE_ADDR'] 
                  : 
                  "unknown" );
      }
    
      return $client_ip;
    
   }
	
	
	
	
	
}




?>
